<?php

namespace Ambientes\CidmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NotificacionesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idUsuarioGen')
            ->add('idUsuarioReem')
            ->add('estado')
            ->add('descripcion')
            ->add('fechaNotificacion')
            ->add('fechaRespuesta')
            ->add('fechaInicio')
            ->add('fechaFin')
            ->add('horaInicio')
            ->add('horaFin')
            ->add('idTipoNotificacion')
            ->add('idFicha')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ambientes\CidmBundle\Entity\Notificaciones'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ambientes_cidmbundle_notificaciones';
    }
}
