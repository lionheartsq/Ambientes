<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ambientes\CidmBundle\Entity\CalendarioEvento;
use Ambientes\CidmBundle\Form\CalendarioEventoType;

/**
 * CalendarioEvento controller.
 *
 */
class CalendarioEventoController extends Controller
{

    /**
     * Lists all CalendarioEvento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmbientesCidmBundle:CalendarioEvento')->findAll();

        return $this->render('AmbientesCidmBundle:CalendarioEvento:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CalendarioEvento entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CalendarioEvento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('calendarioevento_show', array('id' => $entity->getId())));
        }

        return $this->render('AmbientesCidmBundle:CalendarioEvento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a CalendarioEvento entity.
     *
     * @param CalendarioEvento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CalendarioEvento $entity)
    {
        $form = $this->createForm(new CalendarioEventoType(), $entity, array(
            'action' => $this->generateUrl('calendarioevento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CalendarioEvento entity.
     *
     */
    public function newAction()
    {
        $entity = new CalendarioEvento();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmbientesCidmBundle:CalendarioEvento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CalendarioEvento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:CalendarioEvento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CalendarioEvento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:CalendarioEvento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CalendarioEvento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:CalendarioEvento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CalendarioEvento entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:CalendarioEvento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CalendarioEvento entity.
    *
    * @param CalendarioEvento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CalendarioEvento $entity)
    {
        $form = $this->createForm(new CalendarioEventoType(), $entity, array(
            'action' => $this->generateUrl('calendarioevento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CalendarioEvento entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:CalendarioEvento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CalendarioEvento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('calendarioevento_edit', array('id' => $id)));
        }

        return $this->render('AmbientesCidmBundle:CalendarioEvento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CalendarioEvento entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmbientesCidmBundle:CalendarioEvento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CalendarioEvento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('calendarioevento'));
    }

    /**
     * Creates a form to delete a CalendarioEvento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('calendarioevento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
