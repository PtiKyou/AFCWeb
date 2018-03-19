<?php

namespace AFC\RunningPlatformBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\DefisType;
use AppBundle\Entity\Defis;

class AdminController extends Controller
{

  public $listMenus = array(
        array('url' => 'gdefi', 'title' => 'Gestion des défis'),
        array('url' => 'gentrainement', 'title' => 'Gestion des entrainements'),
        array('url' => 'gconstante', 'title' => 'Gestion des constantes'),
        array('url' => 'gsport', 'title' => 'Gestion des Sports'),
        array('url' => 'gprogramme', 'title' => 'Gestion des programmes'),
        array('url' => 'gstatistique', 'title' => 'Gestion des statistiques'),
        array('url' => 'gparcours', 'title' => 'Gestion des parcours'),
        array('url' => 'gconseil', 'title' => 'Gestion des conseils'),
        array('url' => 'gmembre', 'title' => 'Gestion des membres')
      );


  public function indexAction()
  {
    if( $this->isGranted('ROLE_ADMIN') ){
      return $this->render('AFCRunningPlatformBundle:Admin:index.html.twig', array(
     'listMenus' => $this->listMenus));
    }
    return $this->render('AFCRunningPlatformBundle:Default:index.html.twig');
  }

  public function gdefiAction()
  {

      $task = new Defis();
      $tr= new Defis();
      $form = $this->createFormBuilder($task)
          ->getForm();
      return $this->render('AFCRunningPlatformBundle:Admin:index.html.twig', array(
        'listMenus' => $this->listMenus,
        'form' => $form->createView(),
      ));
  }

}
