<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ambientes\CidmBundle\Entity\AccesoAmbientes;
use Ambientes\CidmBundle\Form\AccesoAmbientesType;

/**
 * AccesoAmbientes controller.
 *
 */
class AccesoAmbientesController extends Controller
{

    /**
     * Lists all AccesoAmbientes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmbientesCidmBundle:AccesoAmbientes')->findAll();

        return $this->render('AmbientesCidmBundle:AccesoAmbientes:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new AccesoAmbientes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new AccesoAmbientes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('accesoambientes_show', array('id' => $entity->getId())));
        }

        return $this->render('AmbientesCidmBundle:AccesoAmbientes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a AccesoAmbientes entity.
     *
     * @param AccesoAmbientes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AccesoAmbientes $entity)
    {
        $form = $this->createForm(new AccesoAmbientesType(), $entity, array(
            'action' => $this->generateUrl('accesoambientes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AccesoAmbientes entity.
     *
     */
    public function newAction()
    {
        $entity = new AccesoAmbientes();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmbientesCidmBundle:AccesoAmbientes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AccesoAmbientes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:AccesoAmbientes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AccesoAmbientes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:AccesoAmbientes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AccesoAmbientes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:AccesoAmbientes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AccesoAmbientes entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:AccesoAmbientes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a AccesoAmbientes entity.
    *
    * @param AccesoAmbientes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AccesoAmbientes $entity)
    {
        $form = $this->createForm(new AccesoAmbientesType(), $entity, array(
            'action' => $this->generateUrl('accesoambientes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AccesoAmbientes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:AccesoAmbientes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AccesoAmbientes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('accesoambientes_edit', array('id' => $id)));
        }

        return $this->render('AmbientesCidmBundle:AccesoAmbientes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a AccesoAmbientes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmbientesCidmBundle:AccesoAmbientes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AccesoAmbientes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('accesoambientes'));
    }

    /**
     * Creates a form to delete a AccesoAmbientes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('accesoambientes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
