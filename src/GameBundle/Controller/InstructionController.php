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
     * @Route("/instrukcja", name="show_instruction")
     * @Method("GET")
     * @Cache(smaxage="15")
     */
    public function indexAction()
    {
        return $this->render('GameBundle:Game:instruction.html.twig', [
            'info' => 'Tu będzie kiedyś instrukcja']);
    }
}
