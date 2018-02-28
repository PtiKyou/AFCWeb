<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('emailestvisible')->add('nomestvisible')->add('prenomutilisateur')->add('prenomestvisible')->add('ageuilisateur')->add('ageestvisible')->add('sexeutilisateur')->add('sexeestvisible')->add('tailleutilisateur')->add('tailleestvisible')->add('poidsutilisateur')->add('poidsestvisible')->add('emailutilisateur')->add('nomutilisateur')->add('pseudoutilisateur')->add('motdepasseutilisateur')->add('idstat')->add('idutilisateur1')->add('idgroupe')->add('identrainement')->add('idprogramme');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Utilisateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_utilisateur';
    }


}
