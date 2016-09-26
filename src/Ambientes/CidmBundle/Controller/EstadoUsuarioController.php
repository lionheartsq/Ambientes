<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ambientes\CidmBundle\Entity\EstadoUsuario;
use Ambientes\CidmBundle\Form\EstadoUsuarioType;

/**
 * EstadoUsuario controller.
 *
 */
class EstadoUsuarioController extends Controller
{

    /**
     * Lists all EstadoUsuario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmbientesCidmBundle:EstadoUsuario')->findAll();

        return $this->render('AmbientesCidmBundle:EstadoUsuario:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new EstadoUsuario entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EstadoUsuario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estadousuario_show', array('id' => $entity->getId())));
        }

        return $this->render('AmbientesCidmBundle:EstadoUsuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a EstadoUsuario entity.
     *
     * @param EstadoUsuario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EstadoUsuario $entity)
    {
        $form = $this->createForm(new EstadoUsuarioType(), $entity, array(
            'action' => $this->generateUrl('estadousuario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EstadoUsuario entity.
     *
     */
    public function newAction()
    {
        $entity = new EstadoUsuario();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmbientesCidmBundle:EstadoUsuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EstadoUsuario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:EstadoUsuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoUsuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:EstadoUsuario:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EstadoUsuario entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:EstadoUsuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoUsuario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:EstadoUsuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EstadoUsuario entity.
    *
    * @param EstadoUsuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EstadoUsuario $entity)
    {
        $form = $this->createForm(new EstadoUsuarioType(), $entity, array(
            'action' => $this->generateUrl('estadousuario_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EstadoUsuario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:EstadoUsuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoUsuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('estadousuario_edit', array('id' => $id)));
        }

        return $this->render('AmbientesCidmBundle:EstadoUsuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EstadoUsuario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmbientesCidmBundle:EstadoUsuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstadoUsuario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estadousuario'));
    }

    /**
     * Creates a form to delete a EstadoUsuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estadousuario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
