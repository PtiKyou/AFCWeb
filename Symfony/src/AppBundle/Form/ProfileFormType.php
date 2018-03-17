<?php


//namespace FOS\UserBundle\Form\Type;

namespace AppBundle\Form;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProfileFormType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('current_password', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'), array(
            'label' => 'form.current_password',
            'translation_domain' => 'FOSUserBundle',
            'mapped' => false,
            'constraints' => array(
                new NotBlank(),
            ),
        ))

        ->add('photo', TextType::class, array(
        'label'    => 'Lien de l\'image'))

        ->add('username', TextType::class, array(
        'label'    => 'Pseudo'))

        ->add('email', TextType::class, array(
        'label'    => 'Email'))
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
      ->add('ageUtilisateur', IntegerType::class, array(
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
      'expanded' => true,
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
      ->add('tailleUtilisateur', IntegerType::class, array(
      'label'    => 'Taille'))
      ->add('tailleEstVisible', ChoiceType::class, array(
      'label'    => 'Visibilité de la Taille',
      'choices'  => array(
              'Privé' => 0,
              'Amis' => 1,
              'Public' => 2,
      )))
      ->add('poidsUtilisateur', IntegerType::class, array(
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



    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }


}
