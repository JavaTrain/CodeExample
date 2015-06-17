<?php

namespace Test\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('role', 'choice', array(
                'choices' => array('student' => 'Student', 'couch' => 'Couch'),
                'multiple' => false,
                'expanded' => true,
                'required' => true,
            ))
            ->add('email')
            ->add('courses', 'entity' ,array(
                'class' => 'TestUserBundle:Course',
                'property' => 'name',
                'multiple' => true,
                'expanded' => true
            ))
            ->add('groups', 'entity' ,array(
                'class' => 'TestUserBundle:Group',
                'property' => 'room',
                'multiple' => true,
                'expanded' => true
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'test_userbundle_user';
    }
}
