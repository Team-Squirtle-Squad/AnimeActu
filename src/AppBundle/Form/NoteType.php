<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 04/09/2018
 * Time: 14:05
 */

namespace AppBundle\Form;


use AppBundle\Entity\Anime;
use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class NoteType extends AbstractType
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
            ->add('note', ChoiceType::class, [
                'label' => 'Note',
                'choices' => array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10)]);
    }

}