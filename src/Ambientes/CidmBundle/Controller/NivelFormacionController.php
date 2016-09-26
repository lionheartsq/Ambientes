<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ambientes\CidmBundle\Entity\NivelFormacion;
use Ambientes\CidmBundle\Form\NivelFormacionType;

/**
 * NivelFormacion controller.
 *
 */
class NivelFormacionController extends Controller
{

    /**
     * Lists all NivelFormacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmbientesCidmBundle:NivelFormacion')->findAll();

        return $this->render('AmbientesCidmBundle:NivelFormacion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new NivelFormacion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new NivelFormacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('nivelformacion_show', array('id' => $entity->getId())));
        }

        return $this->render('AmbientesCidmBundle:NivelFormacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a NivelFormacion entity.
     *
     * @param NivelFormacion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NivelFormacion $entity)
    {
        $form = $this->createForm(new NivelFormacionType(), $entity, array(
            'action' => $this->generateUrl('nivelformacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NivelFormacion entity.
     *
     */
    public function newAction()
    {
        $entity = new NivelFormacion();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmbientesCidmBundle:NivelFormacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NivelFormacion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:NivelFormacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NivelFormacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:NivelFormacion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NivelFormacion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:NivelFormacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NivelFormacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:NivelFormacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a NivelFormacion entity.
    *
    * @param NivelFormacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NivelFormacion $entity)
    {
        $form = $this->createForm(new NivelFormacionType(), $entity, array(
            'action' => $this->generateUrl('nivelformacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing NivelFormacion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:NivelFormacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NivelFormacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('nivelformacion_edit', array('id' => $id)));
        }

        return $this->render('AmbientesCidmBundle:NivelFormacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a NivelFormacion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmbientesCidmBundle:NivelFormacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NivelFormacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('nivelformacion'));
    }

    /**
     * Creates a form to delete a NivelFormacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nivelformacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
