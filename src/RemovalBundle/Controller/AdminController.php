<?php
/**
 * Created by PhpStorm.
 * User: Kaiser
 * Date: 30/05/2018
 * Time: 22:18
 */

namespace RemovalBundle\Controller;


use RemovalBundle\Entity\Status;
use RemovalBundle\Form\AdminEditUserType;
use RemovalBundle\Form\StatusType;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends MasterController
{
    public function readAllUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('RemovalBundle:User')->findAll();

        $status = $em->getRepository('RemovalBundle:Status')->findAll();

        return $this->render('@Removal/Admin/readAllUsers.html.twig', [
            'users' => $users,
            'status' => $status
        ]);
    }

    public function listeMembresAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('RemovalBundle:User')->findAll();

        $status = $em->getRepository('RemovalBundle:Status')->findAll();

        return $this->render('@Removal/Admin/listeMembres.html.twig', [
            'users' => $users,
            'status' => $status
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
            'form' => $form->createView()
        ));

    }

    public function newStatusAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $status = new Status();

        $users = $em->getRepository('RemovalBundle:User')->findAll();
        $participations = $em->getRepository('RemovalBundle:Participation')->findAll();

        $form = $this->createForm(StatusType::class, $status);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($status);
            $em->flush();

            return $this->redirectToRoute('removal_admin_read_all_users');
        }

        return $this->render('@Removal/Status/create.html.twig', [
            'form' => $form->createView(), 'participations' => $participations, 'users' => $users
        ]);

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

    public function deleteOneAction($statusID)
    {
        $em = $this->getDoctrine()->getManager();

        $status = $em->getRepository('RemovalBundle:Status')->find($statusID);

        $em->remove($status);
        $em->flush();

        return $this->redirectToRoute('removal_admin_read_all_users');
    }

    public function confirmationParticipationAction($statusID)
    {
        $em = $this->getDoctrine()->getManager();

        $status = $em->getRepository('RemovalBundle:Status')->find($statusID);

        $status->setConfirmation("Validée");

        $em->flush();

        return $this->redirectToRoute('removal_admin_read_all_users');
    }
}