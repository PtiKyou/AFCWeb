<?php

namespace AFC\RunningPlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use AppBundle\Entity\Utilisateur;
use AppBundle\Form\AmisType;
use AppBundle\Entity\Groupe;
use AppBundle\Form\GroupesType;
use AppBundle\Form\GroupeCreateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilderInterface;

class SocialController extends Controller
{

    /**********************************/
    /* Affichage de la partie sociale */
    /**********************************/
    public function indexAction()
    {
      $user = $this->getUser();

      $em = $this->getDoctrine()->getManager();
      $connection = $em->getConnection();
      $statement = $connection->prepare("
        SELECT faitE.id, u2.username, u2.nomUtilisateur, u2.nomEstVisible, u2.prenomUtilisateur, u2.prenomEstVisible , faitE.IDEntrainement, Entrainement.nomEntrainement, Entrainement.dateDebutEntrainement, Entrainement.dateFinEntrainement, Entrainement.descriptionEntrainement, Entrainement.estVisible
        FROM Utilisateur u1
        JOIN amis on amis.id = u1.id
        JOIN faitE on faitE.id = amis.id_Utilisateur
        JOIN Entrainement on Entrainement.IDEntrainement = faitE.IDEntrainement
        JOIN Utilisateur as u2 on u2.id = faitE.id
        where u1.id = ".$user->getId()."
        ORDER BY Entrainement.dateFinEntrainement DESC
        ;");
      $statement->execute();
      $listeEntrainements = $statement->fetchAll();

      return $this->render('AFCRunningPlatformBundle:Social:social.html.twig', array(
        'user' => $user, 'listeEntrainements' => $listeEntrainements
      ));
    }



    /**********************************/
    /********** Partie amis  **********/
    /**********************************/

    public function amisAction(Request $request)
    {
      /** partie liste d'amis **/

      $user = $this->getUser();
      $em = $this->getDoctrine()->getManager();
      $connection = $em->getConnection();
      $statement = $connection->prepare("
        SELECT amis.id_Utilisateur from amis
        where amis.id = ".$user->getId()."
        ;");
      $statement->execute();
      $query = $statement->fetchAll();

      //on recupere l'id des amis
      $listeAmis = array();
      for ($i = 0; $i < sizeof($query); $i++) {
        $listeAmis[$i] = $query[$i]['id_Utilisateur'];
      }
      //echo print_r($listeAmis);

      //on recupere les infos des amis
      $amisInfos = array();
      for($i = 0; $i < sizeof($listeAmis); $i++){
        //echo $listeAmis[$i];
        $connection = $em->getConnection();
        $statement = $connection->prepare("
          SELECT Utilisateur.id, Utilisateur.nomUtilisateur, Utilisateur.nomEstVisible, Utilisateur.prenomUtilisateur, Utilisateur.prenomEstVisible, Utilisateur.username
          from Utilisateur
          where Utilisateur.id = ".$listeAmis[$i]."
          ;");
        $statement->execute();
        $query = $statement->fetchAll();
        $amisInfos[$i] = $query[0];
      }


      /** partie ajout amis **/
      /*la page pourrait peut-être être diviser en 2 et cette partie
       *pourrait être mise dans une autre fonction
       *en utilisant {{ render(controller("bundle:controller:action")) }}
       */

      $listSearch = array();
      $userSearch = new Utilisateur;

      //create form
      $form = $this->createForm(AmisType::class, $userSearch);
      $form->handleRequest($request);

      //handle form
      if ($form->isSubmitted() && $form->isValid()) {

        //on recupere les infos du form
        $username = $form->getData()->getUsername();
        $nom = $form->getData()->getNomutilisateur();
        $prenom = $form->getData()->getPrenomutilisateur();

        //on crée la query
        if( $username != "" or $nom != "" or $prenom != ""){
          $query = "
            SELECT Utilisateur.id, Utilisateur.nomUtilisateur, Utilisateur.nomEstVisible, Utilisateur.prenomUtilisateur, Utilisateur.prenomEstVisible, Utilisateur.username
            from Utilisateur
            where 1";

          if($username != "")
            $query .= " and Utilisateur.username like '%".$username."%'";
          if($nom != "")
            $query .= " and Utilisateur.nomUtilisateur like '%".$nom."%'";
          if($prenom != "")
            $query .= " and Utilisateur.prenomUtilisateur like '%".$prenom."%'";

          $query .= ";";

          $connection = $em->getConnection();
          $statement = $connection->prepare($query);
          $statement->execute();
          $response = $statement->fetchAll();
          for($i=0; $i < sizeof($response); $i++){
            $listSearch[$i] = $response[$i];
          }
        }
        return $this->render('AFCRunningPlatformBundle:Social:amis.html.twig', array(
          'amis' => $amisInfos, 'form' => $form->createView(), 'listSearch' => $listSearch, 'user' => $user
        ));
      }


      return $this->render('AFCRunningPlatformBundle:Social:amis.html.twig', array(
        'amis' => $amisInfos, 'form' => $form->createView(), 'listSearch' => $listSearch, 'user' => $user
      ));
    }



    /*envoie une invitation*/
    public function askAmisAction($id){
      $idCurrentUser = $this->getUser()->getId();

      $em = $this->getDoctrine()->getManager();
      $connection = $em->getConnection();
      $statement = $connection->prepare("INSERT INTO `demandeAmis` (`id`, `id_Utilisateur`) VALUES ('".$idCurrentUser."', '".$id."');");
      $statement->execute();

      return $this->redirectToRoute('social_amis');
    }
    /*refuse une invitation reçue*/
    public function denyAmisAction($id){
      $idCurrentUser = $this->getUser()->getId();

      $em = $this->getDoctrine()->getManager();
      $connection = $em->getConnection();
      $statement = $connection->prepare("DELETE FROM `demandeAmis` WHERE `demandeAmis`.`id` = ".$id." AND `demandeAmis`.`id_Utilisateur` = ".$idCurrentUser.";");
      $statement->execute();

      return $this->redirectToRoute('social_amis');
    }

    /*annule une invitation envoyée*/
    public function cancelAmisAction($id){
      $idCurrentUser = $this->getUser()->getId();

      $em = $this->getDoctrine()->getManager();
      $connection = $em->getConnection();
      $statement = $connection->prepare("DELETE FROM `demandeAmis` WHERE `demandeAmis`.`id` = ".$idCurrentUser." AND `demandeAmis`.`id_Utilisateur` = ".$id.";");
      $statement->execute();

      return $this->redirectToRoute('social_amis');
    }

    /*ajoute un ami (et est ajouté en tant qu'ami)*/
    public function addAmisAction($id){
      $idCurrentUser = $this->getUser()->getId();

      $em = $this->getDoctrine()->getManager();
      $connection = $em->getConnection();
      $statement = $connection->prepare("INSERT INTO `amis` (`id`, `id_Utilisateur`) VALUES ('".$idCurrentUser."', '".$id."');");
      $statement->execute();
      $statement = $connection->prepare("INSERT INTO `amis` (`id`, `id_Utilisateur`) VALUES ('".$id."', '".$idCurrentUser."');");
      $statement->execute();

      //retire l'invitation une fois celle ci acceptée
      $statement = $connection->prepare("DELETE FROM `demandeAmis` WHERE `demandeAmis`.`id` = ".$id." AND `demandeAmis`.`id_Utilisateur` = ".$idCurrentUser.";");
      $statement->execute();

      return $this->redirectToRoute('social_amis');
    }

    /*retire un amis (et est retiré en tant qu'ami)*/
    public function removeAmisAction($id){
      $idCurrentUser = $this->getUser()->getId();

      $em = $this->getDoctrine()->getManager();
      $connection = $em->getConnection();
      $statement = $connection->prepare("DELETE FROM `amis` WHERE `amis`.`id` = ".$idCurrentUser." AND `amis`.`id_Utilisateur` = ".$id.";");
      $statement->execute();
      $statement = $connection->prepare("DELETE FROM `amis` WHERE `amis`.`id` = ".$id." AND `amis`.`id_Utilisateur` = ".$idCurrentUser.";");
      $statement->execute();

      return $this->redirectToRoute('social_amis');
    }


    public function showDemandesAmisAction(){
      $user = $this->getUser();

      $em = $this->getDoctrine()->getManager();
      $connection = $em->getConnection();

      //recherche des demandes envoyées
      $statement = $connection->prepare("
        SELECT Utilisateur.id, Utilisateur.nomUtilisateur, Utilisateur.nomEstVisible, Utilisateur.prenomUtilisateur, Utilisateur.prenomEstVisible, Utilisateur.username FROM demandeAmis
        JOIN Utilisateur on Utilisateur.id = demandeAmis.id_Utilisateur
        where demandeAmis.id = ".$user->getId()."
        ;");
      $statement->execute();
      $demandesEnvoyeur = $statement->fetchAll();

      //recherche des demandes recues
      $statement = $connection->prepare("
        SELECT Utilisateur.id, Utilisateur.nomUtilisateur, Utilisateur.nomEstVisible, Utilisateur.prenomUtilisateur, Utilisateur.prenomEstVisible, Utilisateur.username FROM demandeAmis
        JOIN Utilisateur on Utilisateur.id = demandeAmis.id
        where demandeAmis.id_Utilisateur = ".$user->getId()."
        ;");
      $statement->execute();
      $demandesRecepteur = $statement->fetchAll();

      return $this->render('AFCRunningPlatformBundle:Social:demandesAmis.html.twig', array(
        'demandesEnvoyeur' => $demandesEnvoyeur, 'demandesRecepteur' => $demandesRecepteur
      ));
    }



    /**********************************/
    /********* Partie groupe  *********/
    /**********************************/

    public function groupesAction(Request $request){
      $user = $this->getUser();
      $em = $this->getDoctrine()->getManager();
      $connection = $em->getConnection();




      /**
       * Partie "Liste des groupes"
       */

      //recherche des groupes rejoints
      $statement = $connection->prepare("
        SELECT Groupe.IDGroupe, Groupe.nomGroupe,
        (SELECT COUNT(*) from appartientG WHERE appartientG.IDGroupe = Groupe.IDGroupe) as nbMembres
        from Groupe
        JOIN appartientG on appartientG.IDGroupe = Groupe.IDGroupe
        WHERE appartientG.id = ".$user->getId()."
        ;");
      $statement->execute();
      $groupesRejoints = $statement->fetchAll();




      /**
       * Partie "Rejoindre un groupe"
       */

      //on cherche tout els groupes contenant l'utilisateur
      $connection = $em->getConnection();
      $statement = $connection->prepare("
        SELECT appartientG.id, appartientG.IDGroupe from appartientG
        where appartientG.id = ".$user->getId()."
        ;");
      $statement->execute();
      $query = $statement->fetchAll();

      //on recupere l'id de ces groupes
      $listeGroupes = array();
      for ($i = 0; $i < sizeof($query); $i++) {
        $listeGroupes[$i] = $query[$i]['IDGroupe'];
      }
      //echo print_r($listeGroupes);

      //on recupere les infos de ces groupes
      $groupesInfos = array();
      for($i = 0; $i < sizeof($listeGroupes); $i++){
        //echo $listeGroupes[$i];
        $connection = $em->getConnection();
        $statement = $connection->prepare("
          SELECT Groupe.IDGroupe, Groupe.nomGroupe
          from Groupe
          where Groupe.IDGroupe = ".$listeGroupes[$i]."
          ;");
        $statement->execute();
        $query = $statement->fetchAll();
        $groupesInfos[$i] = $query[0];
      }


      $listSearch = array();
      $groupesSearch = new Groupe;

      //create form
      $form = $this->createForm(GroupesType::class, $groupesSearch);
      $form->handleRequest($request);

      //handle form
      if ($form->isSubmitted() && $form->isValid()) {

        //on recupere les infos du form
        $nom = $form->getData()->getNomGroupe();

        //on crée la query
        $query = "
          SELECT Groupe.IDGroupe, Groupe.nomGroupe
          from Groupe
          where Groupe.nomGroupe like '%".$nom."%';
          ";

        $connection = $em->getConnection();
        $statement = $connection->prepare($query);
        $statement->execute();
        $response = $statement->fetchAll();
        for($i=0; $i < sizeof($response); $i++){
          $listSearch[$i] = $response[$i];
        }

        return $this->render('AFCRunningPlatformBundle:Social:groupe.html.twig', array(
          'form' => $form->createView(), 'listSearch' => $listSearch, 'user' => $user, 'groupes' => $groupesInfos, 'groupesRejoints' => $groupesRejoints
        ));
      }


      return $this->render('AFCRunningPlatformBundle:Social:groupe.html.twig', array(
        'form' => $form->createView(), 'listSearch' => $listSearch, 'user' => $user, 'groupes' => $groupesInfos, 'groupesRejoints' => $groupesRejoints
      ));
    }


    //créer un groupe
    public function groupeCreateAction(Request $request){
      $user = $this->getUser();
      $em = $this->getDoctrine()->getManager();


      $groupe = new Groupe;
      $form = $this->createForm(GroupeCreateType::class, $groupe);
      $form->handleRequest($request);

      //handle form
      if ($form->isSubmitted() && $form->isValid()) {
        //on recupere les infos du form
        $nom = $form->getData()->getNomGroupe();

        //on crée un nouveau groupe
        $newGroupe = new Groupe();
        $newGroupe->setNomGroupe($nom);

        //on crée ce nouveau groupe en base de données
        $em->persist($newGroupe);
        $em->flush();

        //on recupere les infos du form
        $nom = $form->getData()->getNomGroupe();

        $connection = $em->getConnection();
        $statement = $connection->prepare("
          INSERT INTO `appartientG` (`id`, `IDGroupe`) VALUES ('".$user->getId()."', '".$newGroupe->getIdGroupe()."')
          ;");
        $statement->execute();

        $this->render('AFCRunningPlatformBundle:Social:groupeCreate.html.twig', array(
          'form' => $form->createView()
        ));
        return $this->redirectToRoute('social_groupes');
      }

      return $this->render('AFCRunningPlatformBundle:Social:groupeCreate.html.twig', array(
        'form' => $form->createView()
      ));
    }


    public function showGroupeAction($id){
      $user = $this->getUser();
      $em = $this->getDoctrine()->getManager();

      //on recupere les infos du groupe
      $connection = $em->getConnection();
      $statement = $connection->prepare("
        SELECT * FROM Groupe
        WHERE Groupe.IDGroupe = ".$id."
        ;");
      $statement->execute();
      $groupe = $statement->fetchAll();
      $groupe = $groupe[0];

      //on recupere la liste des membres
      $connection = $em->getConnection();
      $statement = $connection->prepare("
        SELECT * FROM appartientG
        JOIN Utilisateur on Utilisateur.id = appartientG.id
        WHERE appartientG.IDGroupe = ".$id."
        ;");
      $statement->execute();
      $listeMembres = $statement->fetchAll();

      //on recupere la liste des defis
      $connection = $em->getConnection();
      $statement = $connection->prepare("
        SELECT Defis.IDDefis,Defis.distance, Defis.temps, Utilisateur.username
        FROM creerDefis
        JOIN Defis on Defis.IDDefis = creerDefis.IDDefis
        JOIN Groupe on Groupe.IDGroupe = creerDefis.IDGroupe
        JOIN Utilisateur on Utilisateur.id = creerDefis.id
        WHERE Groupe.IDGroupe = ".$id."
        ;");
      $statement->execute();
      $listeDefis = $statement->fetchAll();

      return $this->render('AFCRunningPlatformBundle:Social:showGroupe.html.twig', array(
        'groupe' => $groupe, 'listeMembres' => $listeMembres, 'listeDefis' => $listeDefis
      ));
    }

    /*rejoins un groupe*/
    public function joinGroupeAction($id){
      $userId = $this->getUser()->getId();

      $em = $this->getDoctrine()->getManager();
      $connection = $em->getConnection();
      $statement = $connection->prepare("INSERT INTO `appartientG` (`id`, `IDGroupe`) VALUES ('".$userId."', '".$id."')");
      $statement->execute();

      return $this->redirectToRoute('social_groupes');
    }

    /*quitte un groupe*/
    public function quitGroupeAction($id){
      $userId = $this->getUser()->getId();

      $em = $this->getDoctrine()->getManager();
      $connection = $em->getConnection();
      $statement = $connection->prepare("DELETE FROM `appartientG` WHERE `appartientG`.`id` = ".$userId." AND `appartientG`.`IDGroupe` = ".$id.";");
      $statement->execute();

      return $this->redirectToRoute('social_groupes');
    }


}
