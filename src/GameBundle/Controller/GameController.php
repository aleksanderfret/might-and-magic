<?php

namespace GameBundle\Controller;

use GameBundle\Entity\Game;
use GameBundle\Entity\Comment;
use GameBundle\Form\CommentType;
use GameBundle\Form\RateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\EventDispatcher\GenericEvent;

class GameController extends Controller
{
    /**
     * @Route("/gry", name="game_list")
     * @Method("GET")
     * @Cache(smaxage="15")
     */
    public function listAction()
    {
        //TODO @ParamConverter("game", class="GameBundle:Game", options={"repository_method" = "getTitleCoverNoteRate"})
        $games = $this->get('doctrine')->getRepository('GameBundle:Game')->findAll();
        return $this->render('GameBundle:Game:games.html.twig', ['game' => $games]);
    }
    
    /**
     * @Route("gry/", defaults={"title": "Magia i Miecz"}, name="show_main_game")
     * @Route("gry/{title}", name="show_game")
     * @Method("GET")
     * @ParamConverter("game", class="GameBundle:Game")
     */
    public function showAction(Game $game)
    {
        return $this->render('GameBundle:Game:game.html.twig', ['game' => $game]);
    }
    
    /**
     * @Route("/comment/{title}/new", name="new_comment")
     * @Method("POST")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function commentNewAction(Request $request, Game $game)
    {
        $form = $this->createForm(CommentType::class);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            /* @var $comment Comment*/
            $comment = $form->getData();
            $comment->setAuthor($this->getUser());
            $comment->setAddDate(new \DateTime());
            $comment->setGame($game);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
            
            $event = new GenericEvent($comment);
            $this->get('event_dispatcher')->dispatch(Events::COMMENT_CREATED, $event);
            return $this->redirectToRoute('show_game', ['title' => $game->getTitle()]);
        }
    }
    
    /**
     * This controller is called directly via the render() function in the
     * game.html.twig template. That's why it's not needed to define
     * a route name for it.
     *
     * The "id" of the Game is passed in and then turned into a Game object
     * automatically by the ParamConverter.
     *
     * @param Game $game
     *
     * @return Response
     */
    public function commentFormAction(Game $game)
    {
        $form = $this->createForm(CommentType::class);

        return $this->render('GameBundle:Game:comment_form.html.twig', [
            'game' => $game,
            'form' => $form->createView(),
        ]);
    }
    
    
    /**
     * @Route("/rate/{title}/new", name="new_rate")
     * @Method("POST")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function rateNewAction()
    {
        return new Response("Gra " . $title . " ma ocenę 5.");
    }
    
    /**
     * @param Game $game
     *
     * @return Response
     */
    public function rateFormAction(Game $game)
    {
        $form = $this->createForm(RateType::class);

        return $this->render('GameBundle:Game:rate_form.html.twig', [
            'game' => $game,
            'form' => $form->createView(),
        ]);
    }
    

    
    /**
     * @Route("admin/gry/{title}/edycja", name="editGame")
     */
    public function editGameAction($title)
    {
        return new Response("Edycja gry: " . $title . ".");
    }
    
    
    /**
     * @Route("gry/dodaj/grę", name="addGame")
     */
    public function addGameAction()
    {
        return new Response("Dodawanie gry");
    }
    
    /**
     * @Route("gry/usuń/grę", name="deleteGame")
     * @Method({"PUT"})
     */
    public function deleteGameAction()
    {
        return new Response("Usuwanie gry");
    }
}
