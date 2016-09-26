<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ambientes\CidmBundle\Entity\TipoElemento;
use Ambientes\CidmBundle\Form\TipoElementoType;

/**
 * TipoElemento controller.
 *
 */
class TipoElementoController extends Controller
{

    /**
     * Lists all TipoElemento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmbientesCidmBundle:TipoElemento')->findAll();

        return $this->render('AmbientesCidmBundle:TipoElemento:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TipoElemento entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TipoElemento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoelemento_show', array('id' => $entity->getId())));
        }

        return $this->render('AmbientesCidmBundle:TipoElemento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TipoElemento entity.
     *
     * @param TipoElemento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoElemento $entity)
    {
        $form = $this->createForm(new TipoElementoType(), $entity, array(
            'action' => $this->generateUrl('tipoelemento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoElemento entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoElemento();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmbientesCidmBundle:TipoElemento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoElemento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:TipoElemento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoElemento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:TipoElemento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoElemento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:TipoElemento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoElemento entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:TipoElemento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TipoElemento entity.
    *
    * @param TipoElemento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoElemento $entity)
    {
        $form = $this->createForm(new TipoElementoType(), $entity, array(
            'action' => $this->generateUrl('tipoelemento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TipoElemento entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:TipoElemento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoElemento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipoelemento_edit', array('id' => $id)));
        }

        return $this->render('AmbientesCidmBundle:TipoElemento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TipoElemento entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmbientesCidmBundle:TipoElemento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoElemento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipoelemento'));
    }

    /**
     * Creates a form to delete a TipoElemento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoelemento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
