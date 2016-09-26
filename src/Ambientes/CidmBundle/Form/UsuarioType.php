<?php

namespace Ambientes\CidmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cedula')
            ->add('nombre')
            ->add('telefono')
            ->add('tag')
            ->add('email')
            ->add('foto')
            ->add('idEstadoUsuario', 'entity', array('class' => 'AmbientesCidmBundle:EstadoUsuario','property' => 'Descripcion'))    
            ->add('idTipoUsuario', 'entity', array('class' => 'AmbientesCidmBundle:TipoUsuario','property' => 'Descripcion'))    
    ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ambientes\CidmBundle\Entity\Usuario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ambientes_cidmbundle_usuario';
    }
}
