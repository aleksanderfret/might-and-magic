<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Session;
use AppBundle\Event\Events;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\ContactFormType;

/**
 * Description of InstructionController
 *
 * @author Olek
 */
class ContactController extends Controller
{
    
    /**
     * @Route("/kontakt/sendMail", name="send_message")
     * @Method("POST")
     */
    public function contactAction(Request $request)
    {   
        
        $contactResponse;
        
        $form = $this->createContactForm();
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            
            $session = $request->getSession();            

            $result = $this->sendEmail($session, $data, $data['sendtome']);                
                
            if ($result == 0) {
                $contactResponse = $this->redirectToRoute('contact_failure');
            } else {
                $contactResponse = $this->redirectToRoute(
                    'contact_success',
                    ['status' => $result]
                );
            }            
        } else {
            $contactResponse = $this->render(
                'AppBundle:Contact:contact_form_error.html.twig', [
                    'form' => $form->createView(),
                ]
            );
        }        
        return $contactResponse;
    }
    
    private function sendEmail($session, $data, $copyToSender = false)
    {
        $toRecipientMail = 0;
        $toSenderMail = 0;
        
        if ($copyToSender == false) {
            $toRecipientMail = $this->get('mailer')->send($this->prepareEmail($session, $data));
            $result = 2;
        } else {
            $toRecipientMail = $this->get('mailer')->send($this->prepareEmail($session, $data));
            if ($toRecipientMail != 0) {
                $toSenderMail = $this->get('mailer')->send($this->prepareEmail($session, $data, true));                
            }
            if($toRecipientMail && $toSenderMail) {
                $result=2;            
            }elseif ($toRecipientMail && !$toSenderMail) {
                $result=1;
            } else{
                $result=0;
            }
        }
        
        return $result;
    }    
    
    private function prepareEmail($session, array $data, $copyToSender = false)
    {
        $message = \Swift_Message::newInstance($data['subject']);
        
        if($copyToSender == false) {
            $message
                ->setTo([$this->getParameter('site_contact') => $this->getParameter('site_owner')])
                ->setFrom([$data['email'] => $data['name']])
                ->setSender([$data['email'] => $data['name']])
                ->setReplyTo([$data['email']])
                ->setBody($this->renderView(
                    'AppBundle:Contact:contact_message.html.twig', [
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'message' => $data['message']
                        ]
                    ),
                    'text/html');
        } else {
            $message
                ->setTo([$data['email'] => $data['name']])
                ->setFrom($this->getParameter('site_contact'))
                ->setBody($this->renderView('AppBundle:Contact:contact_confirm_message.html.twig',
                    ['name' => $data['name'], 'message' => $data['message']]),'text/html');
        }
        
        $session->set('contact_message', $data['message']);
        
        $event = new GenericEvent($message);
        $this->get('event_dispatcher')->dispatch(Events::MESSAGE_CREATED, $event);
        
        return $message;
    }


    /**
     * @Route("/kontakt", name="contact")
     * @Method("GET")
     * @Cache(smaxage="15")
     */
    public function contactFormAction()
    {
        $form = $this->createContactForm();        
        return $this->render('AppBundle:Contact:contact.html.twig', [
            'form' => $form->createView(),
            ]
        );
    }
    
    private function createContactForm()
    {
        return $this->createForm(ContactFormType::class);
    }

    /**
     * @Route("/kontakt/wiadomosc-wyslana/{status}", name="contact_success", requirements={"status": "\d+"})
     * @Method("GET")
     * @Cache(smaxage="15")
     */
    public function successAction($status = 2)
    {
        if  ($status == 2) {
            $successRespone = $this->render('AppBundle:Contact:contact_success.html.twig');
        } else {
            $successRespone = $this->render('AppBundle:Contact:contact_success_copyless.html.twig');
        }
        return $successRespone;
    }
    
    /**
     * @Route("/kontakt/nie-wyslano-wiadomosci", name="contact_failure")
     * @Method("GET")
     * @Cache(smaxage="15")
     */
    public function failureAction(Request $request)
    {
        
        $session = $request->getSession();
        $message = $session->get('contact_message') !== null ? $session->get('contact_message') : null;
        return $this->render('AppBundle:Contact:contact_failure.html.twig', ['message' => $message]);
    }
}
