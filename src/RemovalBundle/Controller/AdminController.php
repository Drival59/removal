<?php
/**
 * Created by PhpStorm.
 * User: Kaiser
 * Date: 30/05/2018
 * Time: 22:18
 */

namespace RemovalBundle\Controller;


use RemovalBundle\Form\AdminEditUserType;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends MasterController
{
    public function readAllUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('RemovalBundle:User')->findAll();

        return $this->render('@Removal/Admin/readAllUsers.html.twig', [
            'users' => $users
        ]);
    }

    public function updateAction(Request $request, $userID)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('RemovalBundle:User')->find($userID);

        if ($user === null)
        {
            return $this->createNotFoundException();
        }

        $form = $this->createForm(AdminEditUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em->flush();

            return $this->redirectToRoute('removal_admin_read_all_users');
        }

        return $this->render('@Removal/Admin/adminEditUser.html.twig', array(
            'form' => $form->createView()));

    }

    public function deleteAllAction()
    {
        $em = $this->getDoctrine()->getManager();

        $statu = $em->getRepository('RemovalBundle:Status')->findAll();

        foreach ($statu as $status)
        {
            $em->remove($status);
        }

        $em->flush();

        return $this->redirectToRoute('removal_admin_read_all_users');
    }

    public function deleteOneAction($userID)
    {
        $em = $this->getDoctrine()->getManager();

        $status = $em->getRepository('RemovalBundle:Status')->find($userID);

        $em->remove($status);
        $em->flush();

        return $this->redirectToRoute('removal_admin_read_all_users');
    }

    public function confirmationParticipationAction($statusID)
    {
        $em = $this->getDoctrine()->getManager();

        $status = $em->getRepository('RemovalBundle:Status')->find($statusID);

        $status->setConfirmation("Participation confirmée");

//        $em->persist($status);
        $em->flush();

        return $this->redirectToRoute('removal_admin_read_all_users');
    }
}