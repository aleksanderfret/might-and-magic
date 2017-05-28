<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of InstructionController
 *
 * @author Olek
 */
class ContactController extends Controller
{
     /**
     * @Route("/kontakt", name="contact")
     * @Method("GET")
     * @Cache(smaxage="15")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Contact:contact.html.twig', [
            'info' => 'Tu będzie kiedyś formularz kontaktowy.']);
    }
}
