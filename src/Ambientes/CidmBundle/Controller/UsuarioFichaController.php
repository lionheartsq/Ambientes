<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ambientes\CidmBundle\Entity\UsuarioFicha;
use Ambientes\CidmBundle\Form\UsuarioFichaType;

/**
 * UsuarioFicha controller.
 *
 */
class UsuarioFichaController extends Controller
{

    /**
     * Lists all UsuarioFicha entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmbientesCidmBundle:UsuarioFicha')->findAll();

        return $this->render('AmbientesCidmBundle:UsuarioFicha:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new UsuarioFicha entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new UsuarioFicha();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usuarioficha_show', array('id' => $entity->getId())));
        }

        return $this->render('AmbientesCidmBundle:UsuarioFicha:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a UsuarioFicha entity.
     *
     * @param UsuarioFicha $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(UsuarioFicha $entity)
    {
        $form = $this->createForm(new UsuarioFichaType(), $entity, array(
            'action' => $this->generateUrl('usuarioficha_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new UsuarioFicha entity.
     *
     */
    public function newAction()
    {
        $entity = new UsuarioFicha();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmbientesCidmBundle:UsuarioFicha:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a UsuarioFicha entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:UsuarioFicha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UsuarioFicha entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:UsuarioFicha:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing UsuarioFicha entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:UsuarioFicha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UsuarioFicha entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:UsuarioFicha:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a UsuarioFicha entity.
    *
    * @param UsuarioFicha $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(UsuarioFicha $entity)
    {
        $form = $this->createForm(new UsuarioFichaType(), $entity, array(
            'action' => $this->generateUrl('usuarioficha_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing UsuarioFicha entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:UsuarioFicha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UsuarioFicha entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('usuarioficha_edit', array('id' => $id)));
        }

        return $this->render('AmbientesCidmBundle:UsuarioFicha:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a UsuarioFicha entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmbientesCidmBundle:UsuarioFicha')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UsuarioFicha entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usuarioficha'));
    }

    /**
     * Creates a form to delete a UsuarioFicha entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuarioficha_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
