<?php
/**
 * Created by PhpStorm.
 * User: Kaiser
 * Date: 29/05/2018
 * Time: 20:57
 */

namespace RemovalBundle\Controller;


use RemovalBundle\Entity\Joueur;
use RemovalBundle\Form\JoueurType;
use Symfony\Component\HttpFoundation\Request;

class JoueurController extends MasterController
{
    public function createAction(Request $request)
    {
        $joueur = new Joueur();

        $joueurname = $this->getUser();

        $joueur->setUtilisateur($joueurname);

        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($joueur);
            $em->flush();

            return $this->redirectToRoute('removal_joueur_read');
        }

        return $this->render('@Removal/Joueur/create.html.twig', [
            'form' => $form->createView(), 'joueur' => $joueur
        ]);
    }

    public function readAction()
    {
        $em = $this->getDoctrine()->getManager();

        $joueur = $em->getRepository('RemovalBundle:Joueur')->findAll();

        return $this->render('@Removal/Joueur/read.html.twig', [
            'joueur' => $joueur
        ]);
    }

    public function readAllAction($joueurID)
    {
        $em = $this->getDoctrine()->getManager();

        $joueur = $em->getRepository('RemovalBundle:Joueur')->findAllByUser($joueurID);

        return $this->render('@Removal/Joueur/read_all_joueur_user.html.twig', [
            'joueur' => $joueur
        ]);
    }

    public function deleteAction($joueurID)
    {
        $em = $this->getDoctrine()->getManager();

        $joueur = $em->getRepository('RemovalBundle:Joueur')->find($joueurID);

        $em->remove($joueur);
        $em->flush();

        return $this->redirectToRoute('removal_joueur_read');
    }

    public function updateAction(Request $request, $joueurID)
    {
        $em = $this->getDoctrine()->getManager();

        $joueur = $em->getRepository('RemovalBundle:Joueur')->find($joueurID);

        if ($joueur === null)
        {
            return $this->createNotFoundException();
        }

        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em->flush();

            return $this->redirectToRoute('removal_joueur_read');
        }

        return $this->render('@Removal/Joueur/update.html.twig', array(
            'form' => $form->createView()));

    }
}
