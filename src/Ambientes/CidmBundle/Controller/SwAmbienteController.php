<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ambientes\CidmBundle\Entity\SwAmbiente;
use Ambientes\CidmBundle\Form\SwAmbienteType;

/**
 * SwAmbiente controller.
 *
 */
class SwAmbienteController extends Controller
{

    /**
     * Lists all SwAmbiente entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmbientesCidmBundle:SwAmbiente')->findAll();

        return $this->render('AmbientesCidmBundle:SwAmbiente:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SwAmbiente entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SwAmbiente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('swambiente_show', array('id' => $entity->getId())));
        }

        return $this->render('AmbientesCidmBundle:SwAmbiente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a SwAmbiente entity.
     *
     * @param SwAmbiente $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SwAmbiente $entity)
    {
        $form = $this->createForm(new SwAmbienteType(), $entity, array(
            'action' => $this->generateUrl('swambiente_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SwAmbiente entity.
     *
     */
    public function newAction()
    {
        $entity = new SwAmbiente();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmbientesCidmBundle:SwAmbiente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SwAmbiente entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:SwAmbiente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SwAmbiente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:SwAmbiente:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SwAmbiente entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:SwAmbiente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SwAmbiente entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:SwAmbiente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SwAmbiente entity.
    *
    * @param SwAmbiente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SwAmbiente $entity)
    {
        $form = $this->createForm(new SwAmbienteType(), $entity, array(
            'action' => $this->generateUrl('swambiente_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SwAmbiente entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:SwAmbiente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SwAmbiente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('swambiente_edit', array('id' => $id)));
        }

        return $this->render('AmbientesCidmBundle:SwAmbiente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SwAmbiente entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmbientesCidmBundle:SwAmbiente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SwAmbiente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('swambiente'));
    }

    /**
     * Creates a form to delete a SwAmbiente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('swambiente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
