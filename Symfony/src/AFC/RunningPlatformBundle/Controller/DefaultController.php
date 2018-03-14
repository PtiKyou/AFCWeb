<?php

namespace AFC\RunningPlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
      if( $this->isGranted('IS_AUTHENTICATED_FULLY') ){
        // page pour un utilisateur authentifié
        return $this->render('AFCRunningPlatformBundle:Default:indexAuth.html.twig');
      }
      //page d'accueil pour un visiteur
      return $this->render('AFCRunningPlatformBundle:Default:index.html.twig');
    }

    /**
    ** Barre de Navigation
    **/
    public function menuAction()
    {
      return $this->render('AFCRunningPlatformBundle:Default:menu.html.twig');
    }

    /**
    ** Panneau à droite de la page
    **/
    public function rightPanelAction()
    {
      $content = array('title' => "Titre du panel", 'text' => "5555555, TODO > AFCRunningPlatformBundle:Default:rightPanelAction()");

      return $this->render('AFCRunningPlatformBundle:Default:rightPanel.html.twig', array(
        'content' => $content
      ));
    }

    /**
    ** function pour afficher les vues à tester pour /test
    **/
    public function testViewAction()
    {
      return $this->render('AFCRunningPlatformBundle:Default:profilSettings.html.twig');
    }
}
