<?php

namespace GameBundle\Controller\Admin;

use GameBundle\Entity\Game;
use UserBundle\Entity\User;
use GameBundle\Entity\Comment;
use GameBundle\Entity\GameUserRate;
use GameBundle\Form\CommentFormType;
use GameBundle\Form\RateFormType;
use GameBundle\Event\Events;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\EventDispatcher\GenericEvent;
use FOS\UserBundle\Model\UserInterface;

/**
 * @Route("/admin")
 * @Security("has_role('ROLE_ADMIN')")
 */
class GameController extends Controller
{
    /**
     * @Route("/gry", name="admin_game_list")
     * @Method("GET")
     * @Cache(smaxage="15")
     */
    public function listAction()
    {
        $games = $this->get('doctrine')->getRepository('GameBundle:Game')->findAll();
        return $this->render('GameBundle:Admin:games.html.twig', ['games' => $games]);
    }
    
    /**

     * @Route("gry/{id}", name="admin_show_game")
     * @Method("GET")
     */
    public function showAction(Game $game)
    {
        $authors = $this->get('doctrine')->
            getRepository('GameBundle:Game')->
            getAuthors($game->getId());
        return $this->render('GameBundle:Admin:game.html.twig',
            ['game' => $game,             
             'authors'=>$authors]);
    }
    
    
    /**
     * @Route("/gry/new", name="admin_new_game")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        return new Response("Edycja gry: " . $slug . ".");
    }
    
    /**
     * @Route("/gry/{id}/edit", name="editGame")
     */
    public function editAction($slug)
    {
        return new Response("Edycja gry: " . $slug . ".");
    }
    
    /**
     * @Route("gry/{id}/delete", name="deleteGame")
     * @Method({"POST"})
     */
    public function deleteAction()
    {
        return new Response("Usuwanie gry");
    }
}
