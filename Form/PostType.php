<?php

namespace Dunglas\ChaplinDemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('body')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dunglas\ChaplinDemoBundle\Entity\Post',
            'csrf_protection' => false,
        ));
    }

    /**
     * Flat form
     * 
     * @return string
     */
    public function getName()
    {
        return '';
    }

}
