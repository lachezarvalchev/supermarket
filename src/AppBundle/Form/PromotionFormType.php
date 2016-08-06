<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PromotionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('name')
        ->add('price')
        ->add('product', CollectionType::class, array(
          'entry_type' => ProductFormType::class,
          'allow_add' => true,
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults([
        'data_class' => 'AppBundle\Entity\Promotion',
      ]);
    }

    public function getName()
    {
        return 'app_bundle_promotion_form_type';
    }
}
