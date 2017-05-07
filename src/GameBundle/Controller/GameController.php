<?php

namespace GameBundle\Controller;

use GameBundle\Entity\Game;
use UserBundle\Entity\User;
use GameBundle\Entity\Comment;
use GameBundle\Entity\GameUserRate;
use GameBundle\Form\CommentType;
use GameBundle\Form\RateType;
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
     * @Route("gry/", defaults={"slug": "magia-i-miecz-edycja-kolosa"}, name="show_main_game")
     * @Route("gry/{slug}", name="show_game")
     * @Method("GET")
     * @ParamConverter("game", class="GameBundle:Game")
     */
    public function showAction(Request $request, Game $game)
    {
        $averageGameRate = $this->get('doctrine')->getRepository('GameBundle:Game')->getAverageGameRate($game->getId());        
        $gamesRates = $this->get('doctrine')->getRepository('GameBundle:Game')->getGamesRatesforAuthorsOfComments($game->getId());
        $user = $this->getUser();
        if (!isset($user) || !is_object($user) || !$user instanceof UserInterface) {
            $userRate = null; 
        } else {
            $userRate = $this->get('doctrine')->getRepository('GameBundle:Game')->getUserGameRate($game->getId(), $user->getId());
        }
        return $this->render('GameBundle:Game:game.html.twig', ['game' => $game, 'rate'=>$averageGameRate, 'userrate'=> $userRate, 'commentrate'=>$gamesRates]);
    }
    
    /**
     * @Route("/comment/{slug}/new", name="new_comment")
     * @Method("POST")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function commentNewAction(Request $request, Game $game)
    {
        $commentResponse;
        
        $form = $this->createCommentType();

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            /* @var $comment Comment*/
            $comment = $form->getData();
            $comment->setAuthor($this->getUser());
            $comment->setGame($game);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
            
            $event = new GenericEvent($comment);
            $this->get('event_dispatcher')->dispatch(Events::COMMENT_CREATED, $event);
            $commentResponse = $this->redirectToRoute('show_game', ['slug' => $game->getSlug()]);
        } else {
            $commentResponse = $this->render('GameBundle:Game:comment_form_error.html.twig', [
                'game' => $game,
                'form' => $form->createView(),
                ]
            );
        }        
        return $commentResponse;
    }
    
    /**
     * @param Game $game
     *
     * @return Response
     */
    public function commentFormAction(Game $game)
    {
        $form = $this->createCommentType();
        
        return $this->render('GameBundle:Game:comment_form.html.twig', [
            'game' => $game,
            'form' => $form->createView(),
        ]);
    }
    
    private function createCommentType()
    {
        return $this->createForm(CommentType::class);
    }
    
    /**
     * @Route("/rate/{slug}/new", name="new_rate")
     * @Method("POST")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function rateNewAction(Request $request, Game $game)
    {
        $rateResponse;
        $form = $this->createRateType();

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $formRate = $form->getData();
            /* @var $dbRate GameUserRate */
            $dbRate = $this->get('doctrine')->getRepository('GameBundle:GameUserRate')->findOneBy(["user"=>$this->getUser(), "game"=>$game ]);
            
            if (is_null($dbRate)) {
                $dbRate = $formRate;
                $dbRate->setGame($game);
                $dbRate->setUser($this->getUser());
            } else {
                $dbRate->setRate($formRate->getRate());
            }
                       
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dbRate);
            $entityManager->flush();
            
            $event = new GenericEvent($dbRate);
            $this->get('event_dispatcher')->dispatch(Events::RATE_ADDED, $event);
            $rateResponse = $this->redirectToRoute('show_game', ['slug' => $game->getSlug()]);
        }
        else {
            $rateResponse = $this->render('GameBundle:Game:rate_form_error.html.twig', [
                'game' => $game,
                'form' => $form->createView(),
            ]);
        }        
        return $rateResponse;
    }
    
    /**
     * @param Game $game
     *
     * @return Response
     */
    public function rateFormAction(Game $game)
    {
        $form = $this->createRateType();

        return $this->render('GameBundle:Game:rate_form.html.twig', [
            'game' => $game,
            'form' => $form->createView(),
        ]);
    }
    
    private function createRateType()
    {
        return $this->createForm(RateType::class);
    }
    
    
    
    
    
    
    /**
     * @Route("admin/gry/{slug}/edition", name="editGame")
     */
    public function editGameAction($slug)
    {
        return new Response("Edycja gry: " . $slug . ".");
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
