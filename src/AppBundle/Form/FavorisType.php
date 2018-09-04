<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 03/09/2018
 * Time: 14:16
 */

namespace AppBundle\Form;


use AppBundle\Entity\Anime;
use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FavorisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', EntityType::class, array(
                'class' => User::class,
                'choice_label' => 'id',
                'multiple' => false,
                'expanded' => true))
            ->add('anime', EntityType::class, array(
                'class' => Anime::class,
                'choice_label' => 'titre',
                'multiple' => false,
                'expanded' => false))
            ->add('favoris', ChoiceType::class, [
                'label' => 'favoris',
                'choices' => array('Oui' => '1', 'Non' => '2')]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_favoris_type';
    }

}