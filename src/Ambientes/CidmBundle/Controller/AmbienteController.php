<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ambientes\CidmBundle\Entity\Ambiente;
use Ambientes\CidmBundle\Form\AmbienteType;

/**
 * Ambiente controller.
 *
 */
class AmbienteController extends Controller
{

    /**
     * Lists all Ambiente entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmbientesCidmBundle:Ambiente')->findAll();

        return $this->render('AmbientesCidmBundle:Ambiente:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Ambiente entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Ambiente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ambiente_show', array('id' => $entity->getIdAmbiente())));
        }

        return $this->render('AmbientesCidmBundle:Ambiente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Ambiente entity.
     *
     * @param Ambiente $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Ambiente $entity)
    {
        $form = $this->createForm(new AmbienteType(), $entity, array(
            'action' => $this->generateUrl('ambiente_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Ambiente entity.
     *
     */
    public function newAction()
    {
        $entity = new Ambiente();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmbientesCidmBundle:Ambiente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Ambiente entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:Ambiente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ambiente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:Ambiente:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ambiente entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:Ambiente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ambiente entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:Ambiente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Ambiente entity.
    *
    * @param Ambiente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Ambiente $entity)
    {
        $form = $this->createForm(new AmbienteType(), $entity, array(
            'action' => $this->generateUrl('ambiente_update', array('id' => $entity->getIdAmbiente())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Ambiente entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:Ambiente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ambiente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ambiente_edit', array('id' => $id)));
        }

        return $this->render('AmbientesCidmBundle:Ambiente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Ambiente entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmbientesCidmBundle:Ambiente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ambiente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ambiente'));
    }

    /**
     * Creates a form to delete a Ambiente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ambiente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
