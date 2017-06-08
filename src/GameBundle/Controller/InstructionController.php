<?php

namespace GameBundle\Controller;

use GameBundle\Entity\Game;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of InstructionController
 *
 * @author Olek
 */
class InstructionController extends Controller
{
     /**
     * @Route("/instrukcja", name="show_table_of_contents")
     * @Method("GET")
     * @Cache(smaxage="15")
     */
    public function listAction()
    {
        return $this->render('GameBundle:Game:instruction.html.twig', [
            'info' => 'Tu będzie kiedyś instrukcja']);
    }
    
    /**
     * @Route("/instrukcja/{slug}", name="show_chapter")
     * @Method("GET")
     * @Cache(smaxage="15")
     */
    public function showAction()
    {
    
    }
    
    /**
     * @Route("/instrukcja/{helpers}/{slug}")
     */
    public function showHelper()
    {
        
    }
}
