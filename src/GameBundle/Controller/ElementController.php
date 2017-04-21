<?php

namespace GameBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ElementController extends Controller
{
     /**
     * @Route("wyposażenie/{element}", name="show_elements")     *
     */
    public function showElementAction($element = "allElements")
    {
        $em = $this->get('doctrine')->getManager();
        
        if ($element == "allElements") {
            $games = $em->getRepository('GameBundle:Type')->findAll();
            $template = 'GameBundle:Game:types.html.twig';
        } else {
            $games = $em->getRepository('GameBundle:Game')->findOneBy(array('title' => $title));
            $template = 'GameBundle:Game:elements.html.twig';
        }
        
        return $this->render($template, array(
                        'game' => $games));
    }
}
