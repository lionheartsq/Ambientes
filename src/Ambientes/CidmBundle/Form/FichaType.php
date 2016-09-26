<?php

namespace Ambientes\CidmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FichaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('programa')
            ->add('instructorLider')
            ->add('fechaInicioLectiva')
            ->add('fechaFinLectiva')
            ->add('fechaCierreFicha')
            ->add('idNivel', 'entity', array('class' => 'AmbientesCidmBundle:NivelFormacion','property' => 'Descripcion'))    
 ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ambientes\CidmBundle\Entity\Ficha'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ambientes_cidmbundle_ficha';
    }
}
