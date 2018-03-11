<?php

namespace AppBundle\Form;

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
      $builder
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
    ->add('ageUilisateur', TextType::class, array(
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
      ;
  }

  public function getParent()
  {
      return 'FOS\UserBundle\Form\Type\RegistrationFormType';
  }

  public function getBlockPrefix()
  {
      return 'app_user_registration';
  }


}
