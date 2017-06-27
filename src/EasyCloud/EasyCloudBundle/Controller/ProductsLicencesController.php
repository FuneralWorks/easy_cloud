<?php

namespace EasyCloud\EasyCloudBundle\Controller;

use EasyCloud\EasyCloudBundle\Entity\ProductsLicences;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Productslicence controller.
 *
 * @Route("productslicences")
 */
class ProductsLicencesController extends Controller
{
    /**
     * Lists all productsLicence entities.
     *
     * @Route("/", name="productslicences_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productsLicences = $em->getRepository('EasyCloudBundle:ProductsLicences')->findAll();

        return $this->render('productslicences/index.html.twig', array(
            'productsLicences' => $productsLicences,
        ));
    }

    /**
     * Creates a new productsLicence entity.
     *
     * @Route("/new", name="productslicences_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $productsLicence = new Productslicences();
        $form = $this->createForm('EasyCloud\EasyCloudBundle\Form\ProductsLicencesType', $productsLicence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productsLicence);
            $em->flush();

            return $this->redirectToRoute('productslicences_show', array('id' => $productsLicence->getId()));
        }

        return $this->render('productslicences/new.html.twig', array(
            'productsLicence' => $productsLicence,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a productsLicence entity.
     *
     * @Route("/{id}", name="productslicences_show")
     * @Method("GET")
     */
    public function showAction(ProductsLicences $productsLicence)
    {
        $deleteForm = $this->createDeleteForm($productsLicence);

        return $this->render('productslicences/show.html.twig', array(
            'productsLicence' => $productsLicence,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing productsLicence entity.
     *
     * @Route("/{id}/edit", name="productslicences_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProductsLicences $productsLicence)
    {
        $deleteForm = $this->createDeleteForm($productsLicence);
        $editForm = $this->createForm('EasyCloud\EasyCloudBundle\Form\ProductsLicencesType', $productsLicence);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('productslicences_edit', array('id' => $productsLicence->getId()));
        }

        return $this->render('productslicences/edit.html.twig', array(
            'productsLicence' => $productsLicence,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a productsLicence entity.
     *
     * @Route("/{id}", name="productslicences_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProductsLicences $productsLicence)
    {
        $form = $this->createDeleteForm($productsLicence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($productsLicence);
            $em->flush();
        }

        return $this->redirectToRoute('productslicences_index');
    }

    /**
     * Creates a form to delete a productsLicence entity.
     *
     * @param ProductsLicences $productsLicence The productsLicence entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProductsLicences $productsLicence)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productslicences_delete', array('id' => $productsLicence->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
