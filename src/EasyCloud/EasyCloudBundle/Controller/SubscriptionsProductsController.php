<?php

namespace EasyCloud\EasyCloudBundle\Controller;

use EasyCloud\EasyCloudBundle\Entity\SubscriptionsProducts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Subscriptionsproduct controller.
 *
 * @Route("subscriptionsproducts")
 */
class SubscriptionsProductsController extends Controller
{
    /**
     * Lists all subscriptionsProduct entities.
     *
     * @Route("/", name="subscriptionsproducts_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subscriptionsProducts = $em->getRepository('EasyCloudBundle:SubscriptionsProducts')->findAll();

        return $this->render('subscriptionsproducts/index.html.twig', array(
            'subscriptionsProducts' => $subscriptionsProducts,
        ));
    }

    /**
     * Creates a new subscriptionsProduct entity.
     *
     * @Route("/new", name="subscriptionsproducts_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subscriptionsProduct = new Subscriptionsproducts();
        $form = $this->createForm('EasyCloud\EasyCloudBundle\Form\SubscriptionsProductsType', $subscriptionsProduct);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subscriptionsProduct);
            $em->flush();

            return $this->redirectToRoute('subscriptionsproducts_show', array('id' => $subscriptionsProduct->getId()));
        }

        return $this->render('subscriptionsproducts/new.html.twig', array(
            'subscriptionsProduct' => $subscriptionsProduct,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subscriptionsProduct entity.
     *
     * @Route("/{id}", name="subscriptionsproducts_show")
     * @Method("GET")
     */
    public function showAction(SubscriptionsProducts $subscriptionsProduct)
    {
        $deleteForm = $this->createDeleteForm($subscriptionsProduct);

        return $this->render('subscriptionsproducts/show.html.twig', array(
            'subscriptionsProduct' => $subscriptionsProduct,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subscriptionsProduct entity.
     *
     * @Route("/{id}/edit", name="subscriptionsproducts_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SubscriptionsProducts $subscriptionsProduct)
    {
        $deleteForm = $this->createDeleteForm($subscriptionsProduct);
        $editForm = $this->createForm('EasyCloud\EasyCloudBundle\Form\SubscriptionsProductsType', $subscriptionsProduct);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subscriptionsproducts_edit', array('id' => $subscriptionsProduct->getId()));
        }

        return $this->render('subscriptionsproducts/edit.html.twig', array(
            'subscriptionsProduct' => $subscriptionsProduct,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subscriptionsProduct entity.
     *
     * @Route("/{id}", name="subscriptionsproducts_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SubscriptionsProducts $subscriptionsProduct)
    {
        $form = $this->createDeleteForm($subscriptionsProduct);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subscriptionsProduct);
            $em->flush();
        }

        return $this->redirectToRoute('subscriptionsproducts_index');
    }

    /**
     * Creates a form to delete a subscriptionsProduct entity.
     *
     * @param SubscriptionsProducts $subscriptionsProduct The subscriptionsProduct entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SubscriptionsProducts $subscriptionsProduct)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subscriptionsproducts_delete', array('id' => $subscriptionsProduct->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
