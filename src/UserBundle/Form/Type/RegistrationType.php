<?php

namespace UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

/**
 * Class RegistrationType
 */
class RegistrationType extends AbstractType
{

    /**
     * Build user registration form
     *
     * @param FormBuilderInterface $builder builder
     * @param array                $options options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array('label' => 'Email:'))
            ->add('plainPassword', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'first_options'  => array('label' => 'Choose Password:'),
                    'second_options' => array('label' => 'Confirm Password:'),
                )
            )
            ->add('save', SubmitType::class, array('label' => 'Register now!'));
    }


    /**
     * Config form
     *
     * @param OptionsResolver $resolver OptionsResolver object
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'UserBundle\Entity\User',
            )
        );
    }


    /**
     * Return type name
     *
     * @return string
     */
    public function getName()
    {
        return 'user_registration';
    }
}