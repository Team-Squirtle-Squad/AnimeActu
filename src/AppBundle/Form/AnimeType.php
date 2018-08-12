<?php

namespace AppBundle\Form;

use AppBundle\Entity\TypeAnime;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre',
                'attr' => array('style' => 'color: red')])
            ->add('typeAnime', EntityType::class, array(
                'class'=>TypeAnime::class,
                'choice_label'=>'mon type anime',
                'multiple'=>false,
                'expanded'=>true));
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_anime_type';
    }
}
