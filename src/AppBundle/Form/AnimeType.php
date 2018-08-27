<?php

namespace AppBundle\Form;

use AppBundle\Entity\Genre;
use AppBundle\Entity\Saison;
use AppBundle\Entity\Theme;
use AppBundle\Entity\TypeAnime;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('synopsis', TextType::class, [
                'label' => 'Synopsis'])
            ->add('couverture', FileType::class,[
                'label' => 'Couverture',
                'required' => false,])
            ->add('genres', EntityType::class, array(
                'class'=>Genre::class,
                'choice_label'=>'libelle_genre',
                'multiple'=>true,
                'expanded'=>true))
            ->add('typeAnime', EntityType::class, array(
                'class'=>TypeAnime::class,
                'choice_label'=>'libelle_type_anime',
                'multiple'=>false,
                'expanded'=>false))
            ->add('themes', EntityType::class, array(
                'class'=>Theme::class,
                'choice_label'=>'libelle_theme',
                'multiple'=>true,
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
