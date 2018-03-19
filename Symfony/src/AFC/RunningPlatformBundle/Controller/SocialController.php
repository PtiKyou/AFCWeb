<?php

namespace AFC\RunningPlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use AppBundle\Entity\Utilisateur;
use AppBundle\Form\AmisType;
use Symfony\Component\HttpFoundation\Request;

class SocialController extends Controller
{
    public function indexAction()
    {
      $user = $this->getUser();
      return $this->render('AFCRunningPlatformBundle:Social:social.html.twig', array(
        'user' => $user
      ));
    }


    public function amisAction(Request $request)
    {
      /* partie liste d'amis */

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



      /**
       *partie ajout amis
       *la page pourrait être diviser en 2 et cette partie
       *pourrait être mise dans une autre fonction
       *(même principe que pour l'encadré de droite qui affiche les conseils de nutrition)
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
            $query .= " and Utilisateur.username like '".$username."'";
          if($nom != "")
            $query .= " and Utilisateur.nomUtilisateur like '".$nom."'";
          if($prenom != "")
            $query .= " and Utilisateur.prenomUtilisateur like '".$prenom."'";

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


    public function addAmisAction($id){
      $idCurrentUser = $this->getUser()->getId();

      $em = $this->getDoctrine()->getManager();
      $connection = $em->getConnection();
      $statement = $connection->prepare("INSERT INTO `amis` (`id`, `id_Utilisateur`) VALUES ('".$idCurrentUser."', '".$id."');");
      $statement->execute();
      $statement = $connection->prepare("INSERT INTO `amis` (`id`, `id_Utilisateur`) VALUES ('".$id."', '".$idCurrentUser."');");
      $statement->execute();


      return $this->redirectToRoute('social_amis');
    }



}
