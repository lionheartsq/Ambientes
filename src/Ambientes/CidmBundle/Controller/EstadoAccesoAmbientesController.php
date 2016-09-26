<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ambientes\CidmBundle\Entity\EstadoAccesoAmbientes;
use Ambientes\CidmBundle\Form\EstadoAccesoAmbientesType;

/**
 * EstadoAccesoAmbientes controller.
 *
 */
class EstadoAccesoAmbientesController extends Controller
{

    /**
     * Lists all EstadoAccesoAmbientes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmbientesCidmBundle:EstadoAccesoAmbientes')->findAll();

        return $this->render('AmbientesCidmBundle:EstadoAccesoAmbientes:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new EstadoAccesoAmbientes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EstadoAccesoAmbientes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estadoaccesoambientes_show', array('id' => $entity->getId())));
        }

        return $this->render('AmbientesCidmBundle:EstadoAccesoAmbientes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a EstadoAccesoAmbientes entity.
     *
     * @param EstadoAccesoAmbientes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EstadoAccesoAmbientes $entity)
    {
        $form = $this->createForm(new EstadoAccesoAmbientesType(), $entity, array(
            'action' => $this->generateUrl('estadoaccesoambientes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EstadoAccesoAmbientes entity.
     *
     */
    public function newAction()
    {
        $entity = new EstadoAccesoAmbientes();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmbientesCidmBundle:EstadoAccesoAmbientes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EstadoAccesoAmbientes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:EstadoAccesoAmbientes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoAccesoAmbientes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:EstadoAccesoAmbientes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EstadoAccesoAmbientes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:EstadoAccesoAmbientes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoAccesoAmbientes entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:EstadoAccesoAmbientes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EstadoAccesoAmbientes entity.
    *
    * @param EstadoAccesoAmbientes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EstadoAccesoAmbientes $entity)
    {
        $form = $this->createForm(new EstadoAccesoAmbientesType(), $entity, array(
            'action' => $this->generateUrl('estadoaccesoambientes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EstadoAccesoAmbientes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:EstadoAccesoAmbientes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoAccesoAmbientes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('estadoaccesoambientes_edit', array('id' => $id)));
        }

        return $this->render('AmbientesCidmBundle:EstadoAccesoAmbientes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EstadoAccesoAmbientes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmbientesCidmBundle:EstadoAccesoAmbientes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstadoAccesoAmbientes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estadoaccesoambientes'));
    }

    /**
     * Creates a form to delete a EstadoAccesoAmbientes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estadoaccesoambientes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
