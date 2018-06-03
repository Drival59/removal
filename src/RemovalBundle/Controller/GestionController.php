<?php
/**
 * Created by PhpStorm.
 * User: Kaiser
 * Date: 31/05/2018
 * Time: 16:20
 */

namespace RemovalBundle\Controller;




use RemovalBundle\Entity\Status;

class GestionController extends MasterController
{
    public function readAction()
    {
        $user = $this->getUser();
        $personnages = $this->getUser()->getJoueurs();

        return $this->render('@Removal/Gestion/read.html.twig', [
            'user' => $user,
            'personnages' => $personnages
        ]);
    }

    public function validationStatusAction()
    {
        $status = new Status();

        $user = $this->getUser();

        $status->setUtilisateur($user);
        $status->setStatus(true);

            $em = $this->getDoctrine()->getManager();
            $em->persist($status);
            $em->flush();

            return $this->redirectToRoute('removal_gestion_read');
    }
}