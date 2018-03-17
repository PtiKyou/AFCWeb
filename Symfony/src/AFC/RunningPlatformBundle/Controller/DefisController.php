<?php

// src/AFC/RunningPlatformBundle/Controller/DefisController.php

namespace AFC\RunningPlatformBundle\Controller;

use AppBundle\Entity\Creerdefis;
use AppBundle\Entity\Defis;
use AppBundle\Entity\Defisacceptes;
use AppBundle\Entity\Utilisateur;
use AppBundle\Form\DefisType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DefisController extends Controller
{
	public function indexAction()
	{
		$listMenusDefis = array(
		array('url' => 'creerdefis', 'title' => 'Créer des défis'),
		array('url' => 'afficherdefis', 'title' => 'Afficher les défis')
		);
		if( $this->isGranted('IS_AUTHENTICATED_FULLY') ){
        		// page pour un utilisateur authentifié
    			return $this->render('AFCRunningPlatformBundle:Defis:index.html.twig', array('listMenusDefis' => $listMenusDefis));
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

      		return $this->render('AFCRunningPlatformBundle:Defis:rightPanel.html.twig', array('content' => $content));
    	}
    	
    	public function creerDefisAction()
    	{
    		return $this->render('AFCRunningPlatformBundle:Defis:creerDefis.html.twig');
    	}
    	
    	public function afficherDefisAction()
    	{
    		return $this->render('AFCRunningPlatformBundle:Defis:afficherDefis.html.twig');
    	}
    	
    	public function addAction(Request $request)
    	{
    		//on crée un objet Defis
    		$defis = new Defis();
    		
    		//on crée le formbuilder grace au service form factory
    		$formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $defis);
    		
    		//on ajoute les champs de l'entité que l'on veut à notre formulaire
    		$formBuilder
    			->add('temps',		IntegerType::class)
    			->add('distance',	IntegerType::class)
    			->add('enregistrer',	SubmitType::class)
    		;
    		
    		//à partir du formBuilder, on génère le formulaire
    		$form = $formBuilder->getForm();
    		
    		// On enregistre notre objet $defis dans la base de données
		$em = $this->getDoctrine()->getManager();
		$em->persist($defis);
		$em->flush();

		$request->getSession()->getFlashBag()->add('défis', 'Défi bien enregistrée.');
    		
    		//on passe la méthode createView() du formulaire à la vue
    		//afin qu'elle puisse afficher le formulaire toute seule
    		return $this->render('AFCRunningPlatformBundle:Defis:add.html.twig', array('form' => $form->createView()));
    	}
}

?>
