<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ambientes\CidmBundle\Entity\Notificaciones;
use Ambientes\CidmBundle\Form\NotificacionesType;

/**
 * Notificaciones controller.
 *
 */
class NotificacionesController extends Controller
{

    /**
     * Lists all Notificaciones entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmbientesCidmBundle:Notificaciones')->findAll();

        return $this->render('AmbientesCidmBundle:Notificaciones:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Notificaciones entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Notificaciones();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('notificaciones_show', array('id' => $entity->getId())));
        }

        return $this->render('AmbientesCidmBundle:Notificaciones:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Notificaciones entity.
     *
     * @param Notificaciones $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Notificaciones $entity)
    {
        $form = $this->createForm(new NotificacionesType(), $entity, array(
            'action' => $this->generateUrl('notificaciones_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Notificaciones entity.
     *
     */
    public function newAction()
    {
        $entity = new Notificaciones();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmbientesCidmBundle:Notificaciones:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Notificaciones entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:Notificaciones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notificaciones entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:Notificaciones:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Notificaciones entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:Notificaciones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notificaciones entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:Notificaciones:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Notificaciones entity.
    *
    * @param Notificaciones $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Notificaciones $entity)
    {
        $form = $this->createForm(new NotificacionesType(), $entity, array(
            'action' => $this->generateUrl('notificaciones_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Notificaciones entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:Notificaciones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notificaciones entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('notificaciones_edit', array('id' => $id)));
        }

        return $this->render('AmbientesCidmBundle:Notificaciones:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Notificaciones entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmbientesCidmBundle:Notificaciones')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Notificaciones entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('notificaciones'));
    }

    /**
     * Creates a form to delete a Notificaciones entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('notificaciones_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
