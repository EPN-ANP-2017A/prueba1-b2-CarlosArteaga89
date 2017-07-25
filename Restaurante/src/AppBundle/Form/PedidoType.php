<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PedidoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('cantidad')
                ->add('plato', EntityType::class,array(
                    'label'=>'Plato',
                    'class'=>'AppBundle:Plato',
                    'choice_label'=>'nombre',
                    'required'=>'true'
                ))
                ->add('cliente', EntityType::class,array(
                    'label'=>'Cliente',
                    'class'=>'AppBundle:Cliente',
                    'choice_label'=>'nombre',
                    'required'=>'true'
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Pedido'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_pedido';
    }


}
