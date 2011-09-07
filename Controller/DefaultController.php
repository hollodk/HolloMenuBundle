<?php

namespace Hollo\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
  public function topMenuAction()
  {
    $menu = array();

    $event = new \Hollo\MenuBundle\Event\FilterMenuEvent($menu);
    $this->get('event_dispatcher')->dispatch(\Hollo\MenuBundle\Event\Events::onTopMenuRender, $event);
    $menu = $event->getMenu();

    return $this->render('HolloMenuBundle:Default:topMenu.html.twig', array(
      'menu' => $menu
    ));
  }

  public function leftMenuAction()
  {
    $menu = array();

    $event = new \Hollo\MenuBundle\Event\FilterMenuEvent($menu);
    $this->get('event_dispatcher')->dispatch(\Hollo\MenuBundle\Event\Events::onLeftMenuRender, $event);
    $menu = $event->getMenu();

    if (preg_match("/admin\/([^\/]+)?.*$/", $this->getRequest()->getRequestUri(),$rtn)) {
      if (isset($menu[$rtn[1]])) {
        $menu[$rtn[1]]['active'] = 1;
      }
    }

    return $this->render('HolloMenuBundle:Default:leftMenu.html.twig', array(
      'menu' => $menu
    ));
  }
}
