<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ambientes\CidmBundle\Entity\CentroFormacion;
use Ambientes\CidmBundle\Form\CentroFormacionType;

/**
 * CentroFormacion controller.
 *
 */
class CentroFormacionController extends Controller
{

    /**
     * Lists all CentroFormacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmbientesCidmBundle:CentroFormacion')->findAll();

        return $this->render('AmbientesCidmBundle:CentroFormacion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CentroFormacion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CentroFormacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('centroformacion_show', array('id' => $entity->getIdCentro())));
        }

        return $this->render('AmbientesCidmBundle:CentroFormacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a CentroFormacion entity.
     *
     * @param CentroFormacion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CentroFormacion $entity)
    {
        $form = $this->createForm(new CentroFormacionType(), $entity, array(
            'action' => $this->generateUrl('centroformacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CentroFormacion entity.
     *
     */
    public function newAction()
    {
        $entity = new CentroFormacion();
        $form   = $this->createCreateForm($entity);
        return $this->render('AmbientesCidmBundle:CentroFormacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CentroFormacion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:CentroFormacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CentroFormacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:CentroFormacion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CentroFormacion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:CentroFormacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CentroFormacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmbientesCidmBundle:CentroFormacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CentroFormacion entity.
    *
    * @param CentroFormacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CentroFormacion $entity)
    {
        $form = $this->createForm(new CentroFormacionType(), $entity, array(
            'action' => $this->generateUrl('centroformacion_update', array('id' => $entity->getIdCentro())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CentroFormacion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmbientesCidmBundle:CentroFormacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CentroFormacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('centroformacion_edit', array('id' => $id)));
        }

        return $this->render('AmbientesCidmBundle:CentroFormacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CentroFormacion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmbientesCidmBundle:CentroFormacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CentroFormacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('centroformacion'));
    }

    /**
     * Creates a form to delete a CentroFormacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('centroformacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
