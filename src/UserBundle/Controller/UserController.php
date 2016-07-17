<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use UserBundle\Form\Type\RegistrationType;
use UserBundle\Entity\User;


/**
 * Class UserController
 */
class UserController extends Controller
{

    /**
     * Registration action
     *
     * @param Request $request request object
     *
     * @return Response response object
     */
    public function registrationAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_registartion');
        }

        return $this->render(
            'UserBundle:User:registration.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
