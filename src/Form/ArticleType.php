<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => "Titre de l'article"
            ])
            ->add('imageSrc', null, [
                'label' => "Source de l'image (futur upload)"
            ])
            ->add('imageAlt', null, [
                'label' => "Description de l'image (SEO)"
            ])
            ->add('description')
            ->add('isPublished', null, [
                'label' => "L'article doit-il être publié ?"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
