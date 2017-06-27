<?php

namespace EasyCloud\EasyCloudBundle\Controller;

use EasyCloud\EasyCloudBundle\Entity\Subscriptions;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Subscription controller.
 *
 * @Route("subscriptions")
 */
class SubscriptionsController extends Controller
{
    /**
     * Lists all subscription entities.
     *
     * @Route("/", name="subscriptions_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subscriptions = $em->getRepository('EasyCloudBundle:Subscriptions')->findAll();

        return $this->render('subscriptions/index.html.twig', array(
            'subscriptions' => $subscriptions,
        ));
    }

    /**
     * Creates a new subscription entity.
     *
     * @Route("/new", name="subscriptions_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subscription = new Subscriptions();
        $form = $this->createForm('EasyCloud\EasyCloudBundle\Form\SubscriptionsType', $subscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subscription);
            $em->flush();

            return $this->redirectToRoute('subscriptions_show', array('id' => $subscription->getId()));
        }

        return $this->render('subscriptions/new.html.twig', array(
            'subscription' => $subscription,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subscription entity.
     *
     * @Route("/{id}", name="subscriptions_show")
     * @Method("GET")
     */
    public function showAction(Subscriptions $subscription)
    {
        $deleteForm = $this->createDeleteForm($subscription);

        return $this->render('subscriptions/show.html.twig', array(
            'subscription' => $subscription,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subscription entity.
     *
     * @Route("/{id}/edit", name="subscriptions_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Subscriptions $subscription)
    {
        $deleteForm = $this->createDeleteForm($subscription);
        $editForm = $this->createForm('EasyCloud\EasyCloudBundle\Form\SubscriptionsType', $subscription);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subscriptions_edit', array('id' => $subscription->getId()));
        }

        return $this->render('subscriptions/edit.html.twig', array(
            'subscription' => $subscription,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subscription entity.
     *
     * @Route("/{id}", name="subscriptions_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Subscriptions $subscription)
    {
        $form = $this->createDeleteForm($subscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subscription);
            $em->flush();
        }

        return $this->redirectToRoute('subscriptions_index');
    }

    /**
     * Creates a form to delete a subscription entity.
     *
     * @param Subscriptions $subscription The subscription entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Subscriptions $subscription)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subscriptions_delete', array('id' => $subscription->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
