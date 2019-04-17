<?php

namespace App\Form;

use App\Entity\RendezVous;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('datetimeAt', null, [
                'widget' => 'single_text',
                'html5' => true
            ])
            ->add('dateAt', null, [
                'widget' => 'single_text',
                'html5' => true
            ])
            ->add('timeAt', null, [
                'widget' => 'single_text',
                'html5' => true
            ])
            ->add('yearAt', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy',
                'years' => range(1000, 2019),
                'help' => "Veuillez saisir une date. Exemple : 1998",
                'invalid_message' => "Veuillez saisir une date. Exemple : 1998"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
        ]);
    }
}
