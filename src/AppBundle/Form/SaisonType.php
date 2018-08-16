<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 14/08/2018
 * Time: 14:46
 */

namespace AppBundle\Form;

use AppBundle\Entity\Anime;


use Doctrine\DBAL\Types\BooleanType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SaisonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('animes', EntityType::class, array(
                'class' => Anime::class,
                'choice_label' => 'titre',
                'multiple' => false,
                'expanded' => true))
            ->add('nbSaison', TextType::class, [
                'label' => 'nbSaison'])
            ->add('isSortie', ChoiceType::class, array(
                'choices' => array(
                    'Oui' => true,
                    'Non' => false,),
            ))
            ->add('DateSortie', DateType::class, [
                'label' => 'DateSortie'])
            ->add('DateFini', DateType::class, [
                'label' => 'DateFini']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_saison_type';
    }

}