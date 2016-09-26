<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ambientes\CidmBundle\Entity\ElementoIngreso;
use Ambientes\CidmBundle\Form\ElementoIngresoType;

/**
 * ElementoIngreso controller.
 *
 */
class ElementoIngresoController extends Controller
{

    /**
     * Lists all ElementoIngreso entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmbientesCidmBundle:ElementoIngreso')->findAll();

        return $this->render('AmbientesCidmBundle:ElementoIngreso:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ElementoIngreso entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ElementoIngreso();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('elementoingreso_show', array('id' => $entity->getId())));
        }

        return $this->render('AmbientesCidmBundle:ElementoIngreso:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ElementoIngreso entity.
     *
     * @param ElementoIngreso $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ElementoIngreso $entity)
    {
        $form = $this->createForm(new ElementoIngresoType(), $entity, array(
            'action' => $this->generateUrl('elementoingreso_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ElementoIngreso entity.
     *
     */
    public function newAction()
    {
        $entity = new ElementoIngreso();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmbientesCidmBundle:ElementoIngreso:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ElementoIngreso entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:ElementoIngreso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ElementoIngreso entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:ElementoIngreso:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ElementoIngreso entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:ElementoIngreso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ElementoIngreso entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:ElementoIngreso:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ElementoIngreso entity.
    *
    * @param ElementoIngreso $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ElementoIngreso $entity)
    {
        $form = $this->createForm(new ElementoIngresoType(), $entity, array(
            'action' => $this->generateUrl('elementoingreso_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ElementoIngreso entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:ElementoIngreso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ElementoIngreso entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('elementoingreso_edit', array('id' => $id)));
        }

        return $this->render('AmbientesCidmBundle:ElementoIngreso:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ElementoIngreso entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmbientesCidmBundle:ElementoIngreso')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ElementoIngreso entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('elementoingreso'));
    }

    /**
     * Creates a form to delete a ElementoIngreso entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('elementoingreso_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
