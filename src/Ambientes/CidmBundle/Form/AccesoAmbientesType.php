<?php

namespace Ambientes\CidmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccesoAmbientesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaCompleta')
            ->add('observaciones')
            ->add('idEstado')
            ->add('idEvento')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ambientes\CidmBundle\Entity\AccesoAmbientes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ambientes_cidmbundle_accesoambientes';
    }
}
