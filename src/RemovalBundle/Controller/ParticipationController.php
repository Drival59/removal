<?php
/**
 * Created by PhpStorm.
 * User: Kaiser
 * Date: 30/05/2018
 * Time: 19:50
 */

namespace RemovalBundle\Controller;


use RemovalBundle\Entity\Participation;
use RemovalBundle\Form\ParticipationType;
use Symfony\Component\HttpFoundation\Request;

class ParticipationController extends MasterController
{
    public function createAction(Request $request)
    {
        $participation = new Participation();

        $form = $this->createForm(ParticipationType::class, $participation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($participation);
            $em->flush();

            return $this->redirectToRoute('removal_participation_read');
        }

        return $this->render('@Removal/Participation/create.html.twig', [
            'form' => $form->createView(), 'participation' => $participation
        ]);
    }

    public function readAction()
    {
        $em = $this->getDoctrine()->getManager();

        $participation = $em->getRepository('RemovalBundle:Participation')->findAll();

        return $this->render('@Removal/Participation/read.html.twig', [
            'participation' => $participation
        ]);
    }

    public function updateAction(Request $request, $participationID)
    {
        $em = $this->getDoctrine()->getManager();

        $participation = $em->getRepository('RemovalBundle:Participation')->find($participationID);

        if ($participation === null)
        {
            return $this->createNotFoundException();
        }

        $form = $this->createForm(ParticipationType::class, $participation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em->flush();

            return $this->redirectToRoute('removal_participation_read');
        }

        return $this->render('@Removal/Participation/update.html.twig', array(
            'form' => $form->createView()));
    }

    public function deleteAction($participationID)
    {
        $em = $this->getDoctrine()->getManager();

        $participation = $em->getRepository('RemovalBundle:Participation')->find($participationID);

        $em->remove($participation);
        $em->flush();

        return $this->redirectToRoute('removal_participation_read');
    }
}