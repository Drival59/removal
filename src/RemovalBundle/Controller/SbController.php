<?php

namespace RemovalBundle\Controller;

class SbController extends MasterController
{
    public function readAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('RemovalBundle:User')->findAll();

        $status = $em->getRepository('RemovalBundle:Status')->findAll();

        return $this->render('@Removal/Sb/read.html.twig', [
            'users' => $users,
            'status' => $status
        ]);
    }
}
