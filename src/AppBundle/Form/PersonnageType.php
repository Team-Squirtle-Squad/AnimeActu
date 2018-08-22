<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 22/08/2018
 * Time: 15:03
 */

namespace AppBundle\Form;


use AppBundle\Entity\Anime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class PersonnageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('animes', EntityType::class, array(
                'class'=>Anime::class,
                'choice_label'=>'titre',
                'multiple'=>false,
                'expanded'=>true))
            ->add('nomPersonnage', TextType::class, [
                'label' => 'Nom du Personnage',
                'attr' => array('style' => 'color: red')])
            ->add('typePersonnage', ChoiceType::class, [
                'label' => 'Type Personnage',
                'choices' => array('Principal' => 'Principal', 'Secondaire' => 'Secondaire', 'Supporter' => 'Secondaire')])
            ->add('imagePersonnage', TextType::class, [
                'label' => 'image']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_personnage_type';
    }

}