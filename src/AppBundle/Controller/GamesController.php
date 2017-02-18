<?php



namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GamesController extends Controller{
    
    /**
     * @Route("/gry/{gameTitle}")
     */    
    public function showAction($gameTitle){
        
        $templating = $this->container->get('templating');
        
        $html = $templating->render('gry/show.html.twig', ['name'=> $gameTitle]);
        
        return new Response($html);
        
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