<?php

namespace EasyCloud\EasyCloudBundle\Controller;

use EasyCloud\EasyCloudBundle\Entity\PlanRate;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Planrate controller.
 *
 * @Route("planrate")
 */
class PlanRateController extends Controller
{
    /**
     * Lists all planRate entities.
     *
     * @Route("/", name="planrate_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $planRates = $em->getRepository('EasyCloudBundle:PlanRate')->findAll();

        return $this->render('planrate/index.html.twig', array(
            'planRates' => $planRates,
        ));
    }

    /**
     * Creates a new planRate entity.
     *
     * @Route("/new", name="planrate_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $planRate = new Planrate();
        $form = $this->createForm('EasyCloud\EasyCloudBundle\Form\PlanRateType', $planRate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($planRate);
            $em->flush();

            return $this->redirectToRoute('planrate_show', array('id' => $planRate->getId()));
        }

        return $this->render('planrate/new.html.twig', array(
            'planRate' => $planRate,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a planRate entity.
     *
     * @Route("/{id}", name="planrate_show")
     * @Method("GET")
     */
    public function showAction(PlanRate $planRate)
    {
        $deleteForm = $this->createDeleteForm($planRate);

        return $this->render('planrate/show.html.twig', array(
            'planRate' => $planRate,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing planRate entity.
     *
     * @Route("/{id}/edit", name="planrate_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PlanRate $planRate)
    {
        $deleteForm = $this->createDeleteForm($planRate);
        $editForm = $this->createForm('EasyCloud\EasyCloudBundle\Form\PlanRateType', $planRate);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('planrate_edit', array('id' => $planRate->getId()));
        }

        return $this->render('planrate/edit.html.twig', array(
            'planRate' => $planRate,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a planRate entity.
     *
     * @Route("/{id}", name="planrate_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PlanRate $planRate)
    {
        $form = $this->createDeleteForm($planRate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($planRate);
            $em->flush();
        }

        return $this->redirectToRoute('planrate_index');
    }

    /**
     * Creates a form to delete a planRate entity.
     *
     * @param PlanRate $planRate The planRate entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlanRate $planRate)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('planrate_delete', array('id' => $planRate->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
