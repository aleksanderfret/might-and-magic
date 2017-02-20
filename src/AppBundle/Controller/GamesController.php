<?php



namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GamesController extends Controller{
    
    /**
     * @Route("/gry/{gameTitle}")
     */    
    public function showAction($gameTitle){
        
        #$templating = $this->container->get('templating');
        
        return $this->render('gry/show.html.twig', ['name'=> $gameTitle]);
    }
    
    /**
     * @Route("/gry/{gameTitle}/notes", name="gry_show_notes")
     * @Method("GET")
     */
    public function getNotesAction($gameTitle){
         $notes = [
            ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Octopus asked me a riddle, outsmarted me', 'date' => 'Dec. 10, 2015'],
            ['id' => 2, 'username' => 'AquaWeaver', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'I counted 8 legs... as they wrapped around me', 'date' => 'Dec. 1, 2015'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Inked!', 'date' => 'Aug. 20, 2015'],];
        
        $data = ['notes' => $notes];
        
        #return new Response(json_encode($data));
        
        return new JsonResponse($data);
    }
}


//namespace AppBundle\Controller;
//
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Request;
//
//class DefaultController extends Controller
//{
//    /**
//     * @Route("/", name="homepage")
//     */
//    public function indexAction(Request $request)
//    {
//        // replace this example code with whatever you need
//        return $this->render('default/index.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
//        ]);
//    }
//}