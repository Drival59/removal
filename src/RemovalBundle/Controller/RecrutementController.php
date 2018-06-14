<?php

namespace RemovalBundle\Controller;



use RemovalBundle\Entity\Recrutement;
use RemovalBundle\Form\RecrutementType;
use Symfony\Component\HttpFoundation\Request;

class RecrutementController extends MasterController
{
    public function createAction(Request $request)
    {
        $recrutement = new Recrutement();

        $form = $this->createForm(RecrutementType::class, $recrutement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($recrutement);
            $em->flush();

            return $this->redirectToRoute('removal_admin_read_recrutement');
        }

        return $this->render('@Removal/Admin/createRecrutement.html.twig', [
            'form' => $form->createView(), 'recrutement' => $recrutement
        ]);

    }

    public function readAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recrutement = $em->getRepository('RemovalBundle:Recrutement')->findAll();

        return $this->render('@Removal/Admin/readRecrutement.html.twig', [
            'recrutement' => $recrutement
        ]);
    }

    public function updateAction(Request $request, $recrutementID)
    {
        $em = $this->getDoctrine()->getManager();

        $recrutement = $em->getRepository('RemovalBundle:Recrutement')->find($recrutementID);

        if ($recrutement === null)
        {
            return $this->createNotFoundException();
        }

        $form = $this->createForm(RecrutementType::class, $recrutement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em->flush();

            return $this->redirectToRoute('removal_admin_read_recrutement');
        }

        return $this->render('@Removal/Admin/updateRecrutement.html.twig', array(
            'form' => $form->createView()));
    }
}
