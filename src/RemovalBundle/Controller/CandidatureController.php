<?php
/**
 * Created by PhpStorm.
 * User: Kaiser
 * Date: 3/06/2018
 * Time: 15:12
 */

namespace RemovalBundle\Controller;


use RemovalBundle\Entity\Candidature;
use RemovalBundle\Form\CandidatureType;
use Symfony\Component\HttpFoundation\Request;

class CandidatureController extends MasterController
{
    public function createAction(Request $request)
    {
        $candidature = new Candidature();

        $user = $this->getUser();

        $candidature->setUtilisateur($user);
        $candidature->setStatus("new");

        $form = $this->createForm(CandidatureType::class, $candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($candidature);
            $em->flush();

            $data_name = $form['pseudo']->getData();

            $message = \Swift_Message::newInstance()
                ->setContentType('text/html')
                ->setSubject($data_name)
                ->setFrom(['williamdeclercq1504@gmail.com'])
                ->setTo(['removal.kirintor@gmail.com'])
                ->setBody('Une nouvelle candidature vient d\'arriver');

            $this->get('mailer')->send($message);

            return $this->redirectToRoute('removal_homepage');
        }

        return $this->render('@Removal/Candidature/create.html.twig', [
            'form' => $form->createView(), 'candidature' => $candidature
        ]);
    }

    public function readAction()
    {
        $em = $this->getDoctrine()->getManager();
        $candidatures = $em->getRepository('RemovalBundle:Candidature')->findAll();

        return $this->render('@Removal/Candidature/read.html.twig', [
            'candidatures' => $candidatures
        ]);
    }

    public function readArchiveAction()
    {
        $em = $this->getDoctrine()->getManager();
        $candidatures = $em->getRepository('RemovalBundle:Candidature')->findAll();

        return $this->render('@Removal/Candidature/readArchive.html.twig', [
            'candidatures' => $candidatures
        ]);
    }

    public function updateAction($candidatureID)
    {
        $em = $this->getDoctrine()->getManager();

        $candidature = $em->getRepository('RemovalBundle:Candidature')->find($candidatureID);

        $candidature->setStatus("Candidature archivée");

        $em->flush();

        return $this->redirectToRoute('removal_candidature_read');
    }
}