<?php

namespace Hollo\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MenuController extends Controller
{
  public function topMenuAction()
  {
    $menu = array();

    $event = new \Hollo\MenuBundle\Event\FilterMenuEvent($menu);
    $this->get('event_dispatcher')->dispatch(\Hollo\MenuBundle\Event\Events::onTopMenuRender, $event);
    $menu = $event->getMenu();

    return $this->render('HolloMenuBundle:Menu:topMenu.html.twig', array(
      'menu' => $menu
    ));
  }

  public function topRightMenuAction()
  {
    $menu = array();

    $event = new \Hollo\MenuBundle\Event\FilterMenuEvent($menu);
    $this->get('event_dispatcher')->dispatch(\Hollo\MenuBundle\Event\Events::onTopRightMenuRender, $event);
    $menu = $event->getMenu();

    return $this->render('HolloMenuBundle:Menu:topRightMenu.html.twig', array(
      'menu' => $menu
    ));
  }

  public function leftMenuAction()
  {
    $menu = array();

    $event = new \Hollo\MenuBundle\Event\FilterMenuEvent($menu);
    $this->get('event_dispatcher')->dispatch(\Hollo\MenuBundle\Event\Events::onLeftMenuRender, $event);
    $menu = $event->getMenu();

    return $this->render('HolloMenuBundle:Menu:leftMenu.html.twig', array(
      'menu' => $menu
    ));
  }
}
