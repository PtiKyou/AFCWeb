<?php

// src/AFC/RunningPlatformBundle/Controller/DefisController.php

namespace AFC\RunningPlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefisController extends Controller
{
	public function indexAction()
	{
		if( $this->isGranted('IS_AUTHENTICATED_FULLY') ){
        		// page pour un utilisateur authentifié
        		return $this->render('AFCRunningPlatformBundle:Defis:index.html.twig');
      		}
      		//page d'accueil pour un visiteur
      		return $this->render('AFCRunningPlatformBundle:Default:index.html.twig');
	}
	
	/**
    	** Barre de Navigation
    	**/
    	public function menuAction()
    	{
      		return $this->render('AFCRunningPlatformBundle:Defis:menu.html.twig');
    	}
    	
    	/**
    	** Panneau à droite de la page
    	**/
    	public function rightPanelAction()
    	{
      		$content = array('title' => "Titre du panel", 'text' => "5555555, TODO > AFCRunningPlatformBundle:Default:rightPanelAction()");

      		return $this->render('AFCRunningPlatformBundle:Default:rightPanel.html.twig', array('content' => $content));
    	}
}

?>
