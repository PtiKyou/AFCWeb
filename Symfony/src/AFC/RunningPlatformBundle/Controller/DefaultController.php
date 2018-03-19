<?php

namespace AFC\RunningPlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use AppBundle\Entity\Statistiques;
use AppBundle\Entity\Utilisateur;
use AppBundle\Entity\Nutrition;
use AppBundle\Entity\Entrainement;
use AppBundle\Form\StatsType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
      if( $this->isGranted('IS_AUTHENTICATED_FULLY') ){
        // page pour un utilisateur authentifié
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("
          SELECT  Entrainement.IDEntrainement, Entrainement.dateFinEntrainement, Entrainement.nomEntrainement, Entrainement.descriptionEntrainement, Entrainement.estVisible
          from Entrainement
          INNER JOIN faitE ON faitE.IDEntrainement = Entrainement.IDEntrainement
          where faitE.id = ".$user->getId()."
          ORDER BY Entrainement.dateFinEntrainement DESC;
          ");
        $statement->execute();
        $entrainements = $statement->fetchAll();

        return $this->render('AFCRunningPlatformBundle:Default:indexAuth.html.twig', array(
          'user' => $user, 'entrainements' => $entrainements
        ));
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
      $em = $this->getDoctrine()->getManager(); // ...or getEntityManager() prior to Symfony 2.1
      $connection = $em->getConnection();
      $statement = $connection->prepare("
        SELECT  Entrainement.IDEntrainement, Entrainement.dateFinEntrainement, Entrainement.nomEntrainement, Entrainement.descriptionEntrainement, Entrainement.estVisible
        from Entrainement
        INNER JOIN faitE ON faitE.IDEntrainement = Entrainement.IDEntrainement
        where faitE.id = 3
        ");
      $statement->execute();
      $entrainements = $statement->fetchAll();


      $user = $this->getUser();
      return $this->render('AFCRunningPlatformBundle:Default:indexAuth.html.twig', array(
        'user' => $user, 'entrainements' => $entrainements
      ));
    }
}
