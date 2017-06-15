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
        $menu->addChild('menu.start', ['route' => 'homepage']);
        $menu->addChild('menu.games', ['route' => 'game_list']);
        
        $em = $this->container->get('doctrine')->getManager();
        
        $games = $em->getRepository('GameBundle:Game')->findAll();
        
        foreach ($games as $game) {
            $menuItem = 'menu.'.$game->getSlug();
            $menu['menu.games']->addChild($menuItem, [
                'route'=> 'show_game',
                'routeParameters'=> ['slug'=> $game->getSlug()]
            ]);
            #->setExtra('translation_domain', false);
        }
        
        $menu->addChild('menu.instruction', ['route'=> 'show_table_of_contents']);
        $menu->addChild('menu.contact',['route' => 'contact']);
        return $menu;
    }
}
