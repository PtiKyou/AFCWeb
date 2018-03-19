<?php

namespace AFC\RunningPlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Utilisateur;
use AppBundle\Entity\Statistiques;
use AppBundle\Form\StatsType;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
  public function indexAction($id)
  {
    //fonction test

  }

  /**
   * affiche le profile d'un utilisateur
   */
  public function showUserAction($id)
  {
    $id = $id;

    $em = $this->getDoctrine()->getManager();
    $request = $em->getRepository(Utilisateur::class)->findById($id);
    $user = $request[0];

    return $this->render('AFCRunningPlatformBundle:Profile:profilUser.html.twig', array(
   'id' => $id, 'user' => $user));
  }

  /**
   * affiche le profile d'un utilisateur
   */
  public function showUserStatsAction($id)
  {
    //on recupere l'utilisateur et ses stats
    $em = $this->getDoctrine()->getManager();
    $user = $em->getRepository(Utilisateur::class)->findById($id);
    $user = $user[0];
    $stats = $em->getRepository(Statistiques::class)->findById($id);
    $stats = $stats[0];

    return $this->render('AFCRunningPlatformBundle:Profile:statsUser.html.twig',array(
        'user' => $user, 'userStats' => $stats
    ));
  }


  /**
   * affiche les stats personnelles de l'utilisateur
   */
  public function showStatsAction(Request $request)
  {
    //on recupere l'utilisateur actuel
    $user = $this->getUser();
    $em = $this->getDoctrine()->getManager();
    //on recupere les stats de cet utilisateur
    $stats = $em->getRepository(Statistiques::class)->findById($user->getId());
    $stats = $stats[0];
    //si erreur : "Notice: Undefined offset: 0" => pas de table Statistiques associé à cette utilisateur

    //create form
    $form = $this->createForm(StatsType::class, $stats);
    $form->handleRequest($request);

    //handle form
    if ($form->isSubmitted() && $form->isValid()) {
      //on recupere les données puis on les sauve dans la DB
      $stats = $form->getData();
      $em = $this->getDoctrine()->getManager();
      $em->persist($stats);
      $em->flush();

      //affiche un message de validation
      $request->getSession()
      ->getFlashBag()
      ->add('success', 'Modifications sauvegardées.');

      return $this->redirectToRoute('profil_stats');
    }

    return $this->render('AFCRunningPlatformBundle:Profile:stats.html.twig',array(
        'form' => $form->createView(), 'userStats' => $stats
    ));
  }

}
