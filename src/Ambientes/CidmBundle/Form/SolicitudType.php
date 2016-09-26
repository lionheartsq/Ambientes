<?php

namespace Ambientes\CidmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SolicitudType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaSolicitud')
            /*->add('fechaRespuesta')*/
            ->add('fechaInicio')
            ->add('fechaFin')
            ->add('horaInicio')
            ->add('horaFin')
            /*->add('estado', 'choice', array('choices'   => array('Respondida' => 'Respondida', 'Espera' => 'Espera'),'required'  => false,))    
            */
            ->add('numeroPersonas')
            /*->add('idAmbiente', 'entity', array('class' => 'AmbientesCidmBundle:Ambiente','property' => 'Descripcion'))                 
             */
            ->add('idUsuario')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ambientes\CidmBundle\Entity\Solicitud'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ambientes_cidmbundle_solicitud';
    }
}
