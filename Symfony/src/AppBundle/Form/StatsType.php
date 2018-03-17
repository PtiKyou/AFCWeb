<?php

namespace AppBundle\Form;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class StatsType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('tempsMoyenStatEstVisible', ChoiceType::class, array(
        'label'    => 'tempsMoyenStatEstVisible',
        'choices'  => array(
                'Privé' => 0,
                'Amis' => 1,
                'Public' => 2,
        )))
        ->add('vitesseMoyennneStatEstVisible', ChoiceType::class, array(
        'label'    => 'vitesseMoyennneStatEstVisible',
        'choices'  => array(
                'Privé' => 0,
                'Amis' => 1,
                'Public' => 2,
        )))
        ->add('VitesseMaxStatEstVisible', ChoiceType::class, array(
        'label'    => 'VitesseMaxStatEstVisible',
        'choices'  => array(
                'Privé' => 0,
                'Amis' => 1,
                'Public' => 2,
        )))
        ->add('distanceTotaleParcourueEstVisible', ChoiceType::class, array(
        'label'    => 'distanceTotaleParcourueEstVisible',
        'choices'  => array(
                'Privé' => 0,
                'Amis' => 1,
                'Public' => 2,
        )))
        ->add('distanceMoyenneParcourueEstVisible', ChoiceType::class, array(
        'label'    => 'distanceMoyenneParcourueEstVisible',
        'choices'  => array(
                'Privé' => 0,
                'Amis' => 1,
                'Public' => 2,
        )))
        ;
    }



    public function getBlockPrefix()
    {
        return 'appbundle_stats';
    }



}
