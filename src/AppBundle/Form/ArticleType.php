<?php
/**
 * Created by PhpStorm.
 * User: Tomy
 * Date: 21/08/2018
 * Time: 14:07
 */

namespace AppBundle\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('titreArticle', TextType::class, [
                'label' => 'titreArticle',
                'attr' => array('style' => 'color: red')])
            ->add('description', TextType::class, [
                'label' => 'description'])
            ->add('DateArticle', DateType::class, [
                'label' => 'DateArticle'])
            ->add('image', TextType::class, [
                'label' => 'image'])
            ->add('video', TextType::class, [
                'label' => 'video']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_article_type';
    }
}