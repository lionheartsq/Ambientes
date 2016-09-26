<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ambientes\CidmBundle\Entity\Ingreso;
use Ambientes\CidmBundle\Form\IngresoType;

/**
 * Ingreso controller.
 *
 */
class IngresoController extends Controller
{

    /**
     * Lists all Ingreso entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmbientesCidmBundle:Ingreso')->findAll();

        return $this->render('AmbientesCidmBundle:Ingreso:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Ingreso entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Ingreso();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ingreso_show', array('id' => $entity->getId())));
        }

        return $this->render('AmbientesCidmBundle:Ingreso:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Ingreso entity.
     *
     * @param Ingreso $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Ingreso $entity)
    {
        $form = $this->createForm(new IngresoType(), $entity, array(
            'action' => $this->generateUrl('ingreso_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Ingreso entity.
     *
     */
    public function newAction()
    {
        $entity = new Ingreso();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmbientesCidmBundle:Ingreso:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Ingreso entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:Ingreso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ingreso entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:Ingreso:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ingreso entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:Ingreso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ingreso entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:Ingreso:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Ingreso entity.
    *
    * @param Ingreso $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Ingreso $entity)
    {
        $form = $this->createForm(new IngresoType(), $entity, array(
            'action' => $this->generateUrl('ingreso_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Ingreso entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:Ingreso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ingreso entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ingreso_edit', array('id' => $id)));
        }

        return $this->render('AmbientesCidmBundle:Ingreso:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Ingreso entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmbientesCidmBundle:Ingreso')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ingreso entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ingreso'));
    }

    /**
     * Creates a form to delete a Ingreso entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ingreso_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
