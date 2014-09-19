<?php

namespace FDevs\TeamBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('plain_password', 'password', ['required' => false])
            ->add('image', 'fdevs_image', ['filesystem' => 'team'])
            ->add('firstName', 'translatable')
            ->add('lastName', 'translatable')
            ->add('displayName', 'choice', ['choices' => array(1 => 'Full', 2 => 'First Name, Last Initial')])
            ->add('about', 'translatable', ['type' => 'textarea'])
            ->add('position', 'translatable');

        $builder->remove('current_password');
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'fdevs_user';
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(['validation_groups' => 'Profile']);
    }

    /**
     * {@inheritDoc}
     */
    public function getParent()
    {
        return 'fos_user_profile';
    }
}
