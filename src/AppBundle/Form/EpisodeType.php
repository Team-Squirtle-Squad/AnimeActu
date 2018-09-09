<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 16/08/2018
 * Time: 13:39
 */

namespace AppBundle\Form;


use AppBundle\Entity;


use AppBundle\Entity\Saison;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EpisodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('saisons', EntityType::class, array(
                'class' => Saison::class,
                'choice_label' => 'nbSaison',
                'multiple' => false,
                'expanded' => true))
            ->add('numEpisode', IntegerType::class, [
                'label' => 'numEpisode',])
            ->add('TitreEpisode', TextType::class, array(
                'label' => 'TitreEpisode',));

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_episode_type';
    }

}