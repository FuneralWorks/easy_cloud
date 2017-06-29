<?php

namespace EasyCloud\EasyCloudBundle\Controller;

use EasyCloud\EasyCloudBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

/**
 * User controller.
 *
 * @Route("user")
 */
class UserController extends Controller
{
    /**
     * Lists all user entities.
     *
     * @Route("/", name="user_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('EasyCloudBundle:User')->findAll();

        return $this->render('user/index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new user entity.
     *
     * @Route("/new", name="user_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('EasyCloud\EasyCloudBundle\Form\UserType', $user);
        $form->handleRequest($request);
        
        // Traite le formulaire de création d'un user
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            // On crée un salt pour amélioré la sécurité
            $user->setSalt(md5(time()));
            // On crée un mot de passe (attention, comme vous pouvez le voir, il faut utiliser les même paramètres
            // que spécifiés dans le fichier security.yml, à savoir SHA512 avec 10 itérations.
            $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);    
            
            $password = $encoder->encodePassword($form->get('password')->getData(), $user->getSalt());
            $user->setPassword($password);


            $em->persist($user);
            $em->flush();
            
            $message = \Swift_Message::newInstance()
                ->setSubject('Création de votre compte EasyCloud')
                ->setFrom('nathan.calvarin@gmail.com')
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView(
                        'Emails/registration.html.twig',
                        array('name' => $user->getLogin(), 'password' => $form->get('password')->getData())
                    )
                )
            ;
            $this->get('mailer')->send($message);
            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     * @Route("/{id}", name="user_show")
     * @Method("GET")
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('user/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     * @Route("/{id}/edit", name="user_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('EasyCloud\EasyCloudBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();



             $user->setSalt(md5(time()));
            // On crée un mot de passe (attention, comme vous pouvez le voir, il faut utiliser les même paramètres
            // que spécifiés dans le fichier security.yml, à savoir SHA512 avec 10 itérations.
            $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);    
            
            $password = $encoder->encodePassword($editForm->get('password')->getData(), $user->getSalt());
            $user->setPassword($password);


            $em->persist($user);

            $em->flush();
            $message = \Swift_Message::newInstance()
                ->setSubject('Modification de votre compte EasyCloud')
                ->setFrom('nathan.calvarin@gmail.com')
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView(
                        'Emails/modification.html.twig',
                        array('name' => $user->getLogin(), 'password' => $editForm->get('password')->getData())
                    )
                )
            ;
            $this->get('mailer')->send($message);

            return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
        }

        return $this->render('user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     * @Route("/{id}", name="user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
