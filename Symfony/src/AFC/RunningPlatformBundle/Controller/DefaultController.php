<?php

namespace AFC\RunningPlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use AppBundle\Entity\Statistiques;
use AppBundle\Entity\Utilisateur;
use AppBundle\Entity\Nutrition;
use AppBundle\Form\StatsType;
use Symfony\Component\HttpFoundation\Request;

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
      $em = $this->getDoctrine()->getManager();
      $conseils = $em->getRepository(Nutrition::class)->findAll();
      $choice = rand(0, sizeof($conseils)-1);

      $conseilToShow = $conseils[$choice];

      $content = array('title' => "Conseils", 'text' => $conseilToShow->getConseil());

      return $this->render('AFCRunningPlatformBundle:Default:rightPanel.html.twig', array(
        'content' => $content
      ));
    }

    /**
    ** function pour afficher les vues à tester pour /test
    **/
    public function testViewAction()
    {
      $user = $this->getUser();
      return $this->render('AFCRunningPlatformBundle:Default:social.html.twig', array(
        'user' => $user
      ));
    }
}
