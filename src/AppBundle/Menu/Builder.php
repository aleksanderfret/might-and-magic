<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
/**
 * Description of Builder
 *
 * @author Olek
 */
class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;
    
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->addChild('start', ['route' => 'homepage']);
        $menu->addChild('gry', ['route' => 'game_list']);
        
        $em = $this->container->get('doctrine')->getManager();
        
        $games = $em->getRepository('GameBundle:Game')->findAll();
        
        foreach ($games as $game) {
            $menu['gry']->addChild($game->getTitle(), [
                'route'=> 'show_game',
                'routeParameters'=> ['slug'=> $game->getSlug()]
            ]); 
        }
        
        $menu->addChild('instrukcja', ['route'=> 'show_instruction']);
        $menu->addChild('kontakt',['route' => 'contact']);
        return $menu;
    }
}
