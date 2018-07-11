<?php

namespace RemovalBundle\Controller;

use RemovalBundle\Entity\Mythique;
use RemovalBundle\Entity\Participants;
use RemovalBundle\Form\MythiqueType;
use Symfony\Component\HttpFoundation\Request;

class MythiqueController extends MasterController
{

    public function readAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupes = $em->getRepository('RemovalBundle:Mythique')->findAll();
        $participants = $em->getRepository('RemovalBundle:Participants')->findAll();
        $user = $this->getUser()->getId();

        return $this->render('@Removal/Mythique/read.html.twig', [
            'groupes' => $groupes,
            'participants' => $participants,
            'user' => $user
        ]);
    }


    public function createAction(Request $request)
    {
        $groupe = new Mythique();

        $form = $this->createForm(MythiqueType::class, $groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupe);
            $em->flush();

            return $this->redirectToRoute('removal_user_groupe_read');
        }

        return $this->render('@Removal/Mythique/create.html.twig', [
            'form' => $form->createView(), 'groupe' => $groupe
        ]);
    }

    public function updateAction(Request $request, $groupeID)
    {
        $em = $this->getDoctrine()->getManager();

        $groupe = $em->getRepository('RemovalBundle:Mythique')->find($groupeID);

        $form = $this->createForm(MythiqueType::class, $groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em->flush();

            return $this->redirectToRoute('removal_user_groupe_read');
        }

        return $this->render('@Removal/Mythique/update.html.twig', [
            'form' => $form->createView(), 'groupe' => $groupe
        ]);
    }

    public function deleteAction($groupeID)
    {
        $em = $this->getDoctrine()->getManager();

        $groupe = $em->getRepository('RemovalBundle:Mythique')->find($groupeID);

        $em->remove($groupe);
        $em->flush();

        return $this->redirectToRoute('removal_user_groupe_read');
    }

    public function inscriptionAction($groupeID)
    {
        $em = $this->getDoctrine()->getManager();

        $participant = new Participants();

        $user = $this->getUser();
        $groupe = $em->getRepository('RemovalBundle:Mythique')->find($groupeID);

        $participant->setGroupe($groupe);
        $participant->setUser($user);

        $em->persist($participant);
        $em->flush();
        $this->addFlash('notice', 'Votre inscription a bien été Envoyée !');

        return $this->redirectToRoute('removal_user_groupe_read');
    }

    public function gestionReadAction()
    {

        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser()->getId();

        $groupes = $em->getRepository('RemovalBundle:Mythique')->findAll();

        return $this->render('@Removal/Mythique/gestion.html.twig', [
            'groupes' => $groupes,
            'user' => $user
        ]);
    }
}
