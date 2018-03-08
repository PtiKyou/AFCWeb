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
      ->add('emailEstVisible', CheckboxType::class, array(
    'label'    => 'Rendre votre Email Visible par les autres utilisateurs ?',
    'required' => false))
    ->add('prenomUtilisateur', TextType::class, array(
    'label'    => 'Prénom'))
    ->add('prenomEstVisible', CheckboxType::class, array(
    'label'    => 'Rendre votre Prénom Visible par les autres utilisateurs * ?',
    'required' => false))
    ->add('nomUtilisateur', TextType::class, array(
    'label'    => 'Nom'))
    ->add('nomEstVisible', CheckboxType::class, array(
    'label'    => 'Rendre votre Prénom Visible par les autres utilisateurs ?',
    'required' => false))
    ->add('ageUtilisateur', TextType::class, array(
    'label'    => 'Âge'))
    ->add('ageEstVisible', CheckboxType::class, array(
    'label'    => 'Rendre votre Âge Visible par les autres utilisateurs ?',
    'required' => false))
    ->add('sexeUtilisateur', ChoiceType::class, array(
    'label'    => 'Sexe',
    'choices'  => array(
            'Homme' => 0,
            'Femme' => 1,
    )))
    ->add('sexeEstVisible', CheckboxType::class, array(
    'label'    => 'Rendre votre Sexe Visible par les autres utilisateurs ?',
    'required' => false))
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
