<?php
/**
 * Created by PhpStorm.
 * User: Kaiser
 * Date: 31/05/2018
 * Time: 16:20
 */

namespace RemovalBundle\Controller;






class GestionController extends MasterController
{
    public function readAction()
    {
        $users = $this->getUser();
        $personnages = $this->getUser()->getJoueurs();
        $status = $this->getUser()->getStatus();

        return $this->render('@Removal/Gestion/read.html.twig', [
            'users' => $users,
            'personnages' => $personnages,
            'status' => $status
        ]);
    }

    public function readArchiveAction()
    {
        $users = $this->getUser();
        $personnages = $this->getUser()->getJoueurs();
        $status = $this->getUser()->getStatus();

        return $this->render('@Removal/Gestion/readArchive.html.twig', [
            'users' => $users,
            'personnages' => $personnages,
            'status' => $status
        ]);
    }

    public function validationStatusAction($participationID)
    {
        $em = $this->getDoctrine()->getManager();

        $status = $em->getRepository('RemovalBundle:Status')->find($participationID);

        $status->setConfirmation('En cours');

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return $this->redirectToRoute('removal_gestion_read');
    }

    public function archiverParticipationAction($participationID)
    {
        $em = $this->getDoctrine()->getManager();

        $status = $em->getRepository('RemovalBundle:Status')->find($participationID);

        $status->setConfirmation('Archivée');

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return $this->redirectToRoute('removal_gestion_read');
    }
}