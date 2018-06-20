<?php
/**
 * Created by PhpStorm.
 * User: Kaiser
 * Date: 31/05/2018
 * Time: 16:20
 */

namespace RemovalBundle\Controller;






use Symfony\Component\Validator\Constraints\Date;

class GestionController extends MasterController
{
    public function readAction()
    {
        $users = $this->getUser();
        $personnages = $this->getUser()->getJoueurs();
        $status = $this->getUser()->getStatus();
        $date = new Date();

        return $this->render('@Removal/Gestion/read.html.twig', [
            'users' => $users,
            'personnages' => $personnages,
            'status' => $status,
            'date' => $date
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
        $this->addFlash('notice', 'Votre participation a bien été Envoyée !');

        return $this->redirectToRoute('removal_gestion_read');
    }

    public function archiverParticipationAction($participationID)
    {
        $em = $this->getDoctrine()->getManager();

        $status = $em->getRepository('RemovalBundle:Status')->find($participationID);

        $status->setConfirmation('Archivée');

        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $this->addFlash('notice', 'Votre participation a bien été archivée !');

        return $this->redirectToRoute('removal_gestion_read');
    }
}