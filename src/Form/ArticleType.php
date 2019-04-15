<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => "Titre de l'article",
                'attr' => [
                    'minLength' => '4',
                    'pattern' => false
                ]
            ])
            ->add('imageSrc', FileType::class, [
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
