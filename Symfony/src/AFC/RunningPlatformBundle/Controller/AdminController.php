<?php

namespace AFC\RunningPlatformBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\DefisType;
use AppBundle\Entity\Defis;
use AppBundle\Entity\Entrainement;
use AppBundle\Form\EntrainementType;
use AppBundle\Entity\Constante;
use AppBundle\Form\ConstanteType;
use AppBundle\Entity\Sport;
use AppBundle\Form\SportType;
use AppBundle\Entity\Programme;
use AppBundle\Form\ProgrammeType;
use AppBundle\Entity\Statistiques;
use AppBundle\Form\StatistiquesType;
use AppBundle\Entity\Parcours;
use AppBundle\Form\ParcoursType;
use AppBundle\Entity\Utilisateur;
use AppBundle\Form\UtilisateurType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdminController extends Controller
{

  public $listMenus = array(
        array('url' => 'admin/gdefi', 'title' => 'Gestion des défis'),
        array('url' => 'admin/gentrainement', 'title' => 'Gestion des entrainements'),
        array('url' => 'admin/gconstante', 'title' => 'Gestion des constantes'),
        array('url' => 'admin/gsport', 'title' => 'Gestion des sports'),
        array('url' => 'admin/gprogramme', 'title' => 'Gestion des programmes'),
        array('url' => 'admin/gstatistique', 'title' => 'Gestion des statistiques'),
        array('url' => 'admin/gparcours', 'title' => 'Gestion des parcours'),
        array('url' => 'admin/gmember', 'title' => 'Gestion des membres')
      );


  public function indexAction()
  {
    $names = array('nom' => "Administration");

    if( $this->isGranted('ROLE_ADMIN') ){
      return $this->render('AFCRunningPlatformBundle:Admin:indexAdmin.html.twig', array(
     'name' => $names,
     'listMenus' => $this->listMenus));
    }
    return $this->render('AFCRunningPlatformBundle:Default:index.html.twig');
  }

  public function gdefiAction($action)
  {
      //récupération de l'action
      $action = $action;
      //Création de la request
      $em = $this->getDoctrine()->getManager();
      $request = $em->getRepository(Defis::class)->findAll();
      //definition du nom
      $names = array('nom' => "Gestion des défis");
      //création du formulaire d'ajout
      $task = new Defis();
      $tr= new Defis();
      $form = $this->createFormBuilder($task)
      ->add('temps', TextType::class)
      ->add('distance', TextType::class)
      ->add('save', SubmitType::class, array('label' => 'Créer'))
      ->getForm();
      //return de la vue
      return $this->render('AFCRunningPlatformBundle:Admin:DefisAdmin.html.twig', array(
        'listMenus' => $this->listMenus,
        'form' => $form->createView(),
        'name' => $names,
        'defis' => $request,
        'action' => $action,
      ));
  }

  public function gentrainementAction($action)
  {
      //récupération de l'action
      $action = $action;
      //Création de la request
      $em = $this->getDoctrine()->getManager();
      $request = $em->getRepository(Entrainement::class)->findAll();
      //definition du nom
      $names = array('nom' => "Gestion des entrainements");
      //création du formulaire d'ajout
      $task = new Entrainement();
      $tr= new Entrainement();
      $form = $this->createFormBuilder($task)
      ->add('nomEntrainement', TextType::class, array('label' => 'Nom Entrainement'))
      ->add('dateDebutEntrainement', DateType::class, array('label' => 'Date Début'))
      ->add('dateFinEntrainement', DateType::class, array('label' => 'Date Fin'))
      ->add('descriptionEntrainement', TextType::class, array('label' => 'Description Entrainement'))
      ->add('save', SubmitType::class, array('label' => 'Créer'))
      ->getForm();
      //return de la vue
      return $this->render('AFCRunningPlatformBundle:Admin:EntrainementsAdmin.html.twig', array(
        'form' => $form->createView(),
        'name' => $names,
        'entrainements' => $request,
        'action' => $action,
      ));
  }

  public function gconstanteAction($action)
  {
      //récupération de l'action
      $action = $action;
      //Création de la request
      $em = $this->getDoctrine()->getManager();
      $request = $em->getRepository(Constante::class)->findAll();
      //definition du nom
      $names = array('nom' => "Gestion des constantes");
      //création du formulaire d'ajout
      $task = new Constante();
      $tr= new Constante();
      $form = $this->createFormBuilder($task)
      ->add('CaloriesTerrainPlat', TextType::class, array('label' => 'Calories Terrain Plat'))
      ->add('IDSport', TextType::class, array('label' => 'Id du sport'))
      ->add('save', SubmitType::class, array('label' => 'Créer'))
      ->getForm();
      //return de la vue
      return $this->render('AFCRunningPlatformBundle:Admin:ConstanteAdmin.html.twig', array(
        'listMenus' => $this->listMenus,
        'form' => $form->createView(),
        'name' => $names,
        'constantes' => $request,
        'action' => $action,
      ));
  }


  public function gsportAction($action)
  {
      //récupération de l'action
      $action = $action;
      //Création de la request
      $em = $this->getDoctrine()->getManager();
      $request = $em->getRepository(Sport::class)->findAll();
      //definition du nom
      $names = array('nom' => "Gestion des Sports");
      //création du formulaire d'ajout
      $task = new Sport();
      $tr= new Sport();
      $form = $this->createFormBuilder($task)
      ->add('nomSport', TextType::class, array('label' => 'Nom du sport'))
      ->add('save', SubmitType::class, array('label' => 'Créer'))
      ->getForm();
      //return de la vue
      return $this->render('AFCRunningPlatformBundle:Admin:SportAdmin.html.twig', array(
        'listMenus' => $this->listMenus,
        'form' => $form->createView(),
        'name' => $names,
        'sports' => $request,
        'action' => $action,
      ));
  }

  public function gprogrammeAction($action)
  {
      //récupération de l'action
      $action = $action;
      //Création de la request
      $em = $this->getDoctrine()->getManager();
      $request = $em->getRepository(Programme::class)->findAll();
      //definition du nom
      $names = array('nom' => "Gestion des programmes");
      //création du formulaire d'ajout
      $task = new Programme();
      $tr= new Programme();
      $form = $this->createFormBuilder($task)
      ->add('nomProgramme', TextType::class, array('label' => 'Nom du Programme'))
      ->add('dureeTotaleProgramme', TextType::class, array('label' => 'Durée du Programme'))
      ->add('typeProgramme', TextType::class, array('label' => 'Type du programme'))
      //->add('IdSport', TextType::class, array('label' => 'Id du sport'))                                                       !  !!! !! !! TODO
      ->add('save', SubmitType::class, array('label' => 'Créer'))
      ->getForm();
      //return de la vue
      return $this->render('AFCRunningPlatformBundle:Admin:ProgrammeAdmin.html.twig', array(
        'listMenus' => $this->listMenus,
        'form' => $form->createView(),
        'name' => $names,
        'programmes' => $request,
        'action' => $action,
      ));
  }

  public function gstatistiqueAction($action)
  {
      //récupération de l'action
      $action = $action;
      //Création de la request
      $em = $this->getDoctrine()->getManager();
      $request = $em->getRepository(Statistiques::class)->findAll();
      //definition du nom
      $names = array('nom' => "Gestion des statistiques");
      //création du formulaire d'ajout
      $task = new Statistiques();
      $tr= new Statistiques();
      $form = $this->createFormBuilder($task)
      ->add('tempsMoyenStat', TextType::class, array('label' => 'Temps Moyen'))
      ->add('tempsMoyenStatEstVisible', ChoiceType::class, array(
      'label'    => 'Visibilité du temps moyen',
      'choices'  => array(
              'Privé' => 0,
              'Amis' => 1,
              'Public' => 2,
      )))
      ->add('vitesseMoyennneStat', TextType::class, array('label' => 'Vitesse moyenne'))
      ->add('vitesseMoyennneStatEstVisible', ChoiceType::class, array(
      'label'    => 'Visibilité du temps moyen',
      'choices'  => array(
              'Privé' => 0,
              'Amis' => 1,
              'Public' => 2,
      )))
      ->add('VitesseMaxStat', TextType::class, array('label' => 'Vitesse Max'))
      ->add('VitesseMaxStatEstVisible', ChoiceType::class, array(
      'label'    => 'Visibilité du temps moyen',
      'choices'  => array(
              'Privé' => 0,
              'Amis' => 1,
              'Public' => 2,
      )))
      ->add('distanceTotaleParcourue', TextType::class, array('label' => 'Distance totale parcourue'))
      ->add('distanceTotaleParcourueEstVisible', ChoiceType::class, array(
      'label'    => 'Visibilité du temps moyen',
      'choices'  => array(
              'Privé' => 0,
              'Amis' => 1,
              'Public' => 2,
      )))
      ->add('distanceMoyenneParcourue', TextType::class, array('label' => 'Distance Moyenne parcourue'))
      ->add('distanceMoyenneParcourueEstVisible', ChoiceType::class, array(
      'label'    => 'Visibilité du temps moyen',
      'choices'  => array(
              'Privé' => 0,
              'Amis' => 1,
              'Public' => 2,
      )))
      ->add('id', TextType::class, array('label' => 'Id'))
      ->add('save', SubmitType::class, array('label' => 'Créer'))
      ->getForm();
      //return de la vue
      return $this->render('AFCRunningPlatformBundle:Admin:StatistiqueAdmin.html.twig', array(
        'listMenus' => $this->listMenus,
        'form' => $form->createView(),
        'name' => $names,
        'statistiques' => $request,
        'action' => $action,
      ));
  }



  public function gmemberAction($action)
  {
      //récupération de l'action
      $action = $action;
      //Création de la request
      $em = $this->getDoctrine()->getManager();
      $request = $em->getRepository(Utilisateur::class)->findAll();
      //definition du nom
      $names = array('nom' => "Gestion des membres");
      //création du formulaire d'ajout
      $task = new Utilisateur();
      $tr= new Utilisateur();
      $form = $this->createFormBuilder($task)
      ->add('username', TextType::class, array(
      'label'    => 'Pseudo'))
      ->add('emailEstVisible', ChoiceType::class, array(
      'label'    => 'Visibilité du mail',
      'choices'  => array(
              'Privé' => 0,
              'Amis' => 1,
              'Public' => 2,
      )))
      ->add('prenomUtilisateur', TextType::class, array(
      'label'    => 'Prénom'))
      ->add('prenomEstVisible', ChoiceType::class, array(
      'label'    => 'Visibilité du Prénom',
      'choices'  => array(
              'Privé' => 0,
              'Amis' => 1,
              'Public' => 2,
      )))
      ->add('nomUtilisateur', TextType::class, array(
      'label'    => 'Nom'))
      ->add('nomEstVisible', ChoiceType::class, array(
      'label'    => 'Visibilité du nom',
      'choices'  => array(
              'Privé' => 0,
              'Amis' => 1,
              'Public' => 2,
      )))
      ->add('ageUtilisateur', TextType::class, array(
      'label'    => 'Âge'))
      ->add('ageEstVisible', ChoiceType::class, array(
      'label'    => 'Visibilité de l\'âge',
      'choices'  => array(
              'Privé' => 0,
              'Amis' => 1,
              'Public' => 2,
      )))
      ->add('sexeUtilisateur', ChoiceType::class, array(
      'label'    => 'Sexe',
      'choices'  => array(
              'Homme' => 0,
              'Femme' => 1,
              'Neutre' => 2,
      )))
      ->add('sexeEstVisible', ChoiceType::class, array(
      'label'    => 'Visibilité du Sexe',
      'choices'  => array(
              'Privé' => 0,
              'Amis' => 1,
              'Public' => 2,
      )))
      ->add('tailleUtilisateur', TextType::class, array(
      'label'    => 'Taille'))
      ->add('tailleEstVisible', ChoiceType::class, array(
      'label'    => 'Visibilité de la Taille',
      'choices'  => array(
              'Privé' => 0,
              'Amis' => 1,
              'Public' => 2,
      )))
      ->add('poidsUtilisateur', TextType::class, array(
      'label'    => 'Poids'))
      ->add('poidsEstVisible', ChoiceType::class, array(
      'label'    => 'Visibilité du Poid',
      'choices'  => array(
              'Privé' => 0,
              'Amis' => 1,
              'Public' => 2,
      )))
      ->getForm();
      //return de la vue
      return $this->render('AFCRunningPlatformBundle:Admin:UserAdmin.html.twig', array(
        'listMenus' => $this->listMenus,
        'form' => $form->createView(),
        'name' => $names,
        'users' => $request,
        'action' => $action,
      ));
}

public function gparcoursAction($action)
{
    //récupération de l'action
    $action = $action;
    //Création de la request
    $em = $this->getDoctrine()->getManager();
    $request = $em->getRepository(Parcours::class)->findAll();
    //definition du nom
    $names = array('nom' => "Gestion des parcours");
    //création du formulaire d'ajout
    $task = new Parcours();
    $tr= new Parcours();
    $form = $this->createFormBuilder($task)
    ->add('nomParcours', TextType::class, array('label' => 'Nom du Parcours'))
    ->add('denivelePosParcours', TextType::class, array('label' => 'Durée du Programme'))
    ->add('deniveleNegParcours', TextType::class, array('label' => 'Type du programme'))
    ->add('IDEntrainement', TextType::class, array('label' => 'Type du programme'))
    //->add('IdSport', TextType::class, array('label' => 'Id du sport'))
    ->add('save', SubmitType::class, array('label' => 'Créer'))
    ->getForm();
    //return de la vue
    return $this->render('AFCRunningPlatformBundle:Admin:ParcoursAdmin.html.twig', array(
      'listMenus' => $this->listMenus,
      'form' => $form->createView(),
      'name' => $names,
      'parcours' => $request,
      'action' => $action,
    ));
}

}
