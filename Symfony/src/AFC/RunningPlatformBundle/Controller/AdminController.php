<?php

namespace AFC\RunningPlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
  public function indexAction()
  {

    $listMenus = array(
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

    if( $this->isGranted('ROLE_ADMIN') ){
      // page pour un utilisateur admin
      return $this->render('AFCRunningPlatformBundle:Admin:index.html.twig', array(
     // Tout l'intérêt est ici : le contrôleur passe les variables nécessaires au template !
     'listMenus' => $listMenus));
    }
    //page d'accueil pour un visiteur
    return $this->render('AFCRunningPlatformBundle:Default:index.html.twig');
  }

}
