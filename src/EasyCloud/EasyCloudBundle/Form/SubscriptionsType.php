<?php

namespace EasyCloud\EasyCloudBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubscriptionsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
                ->add('startDate')
                ->add('monthDuration')
                ->add('sapContractNumber')
                ->add('client', 'entity', array( 'class' => 'EasyCloudBundle:Clients',
                                                'property' => 'name'
                                                )
                );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EasyCloud\EasyCloudBundle\Entity\Subscriptions'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'easycloud_easycloudbundle_subscriptions';
    }


}
