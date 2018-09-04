<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 30/08/2018
 * Time: 16:10
 */

namespace AppBundle\Form;


use AppBundle\Entity\Anime;
use AppBundle\Entity\Favoris;
use AppBundle\Entity\Note;
use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentaireType extends AbstractType
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
            ->add('message', TextType::class, [
                'label' => 'Messages : ']);
//            ->add('note', ChoiceType::class, [
//                'label' => 'Note',
//                'choices' => array ('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10)])
//            ->add('favoris', ChoiceType::class, [
//                'label' => 'favoris',
//                'choices' => array ('Oui' => 'Oui', 'Non' => 'Non')]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_commentaire_type';
    }
}