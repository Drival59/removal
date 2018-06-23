<?php

namespace RemovalBundle\Controller;

use RemovalBundle\Entity\Bossdown;
use RemovalBundle\Entity\Raid;
use RemovalBundle\Form\BossdownType;
use RemovalBundle\Form\RaidType;
use Symfony\Component\HttpFoundation\Request;

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

    public function readRaidAction()
    {
        $em = $this->getDoctrine()->getManager();

        $raids = $em->getRepository('RemovalBundle:Raid')->findAll();

        return $this->render('@Removal/Raid/read.html.twig', [
            'raids' => $raids
        ]);
    }

    public function readBossAction()
    {
        $em = $this->getDoctrine()->getManager();

        $boss = $em->getRepository('RemovalBundle:Bossdown')->findAll();

        return $this->render('@Removal/Bossdown/read.html.twig', [
            'boss' => $boss
        ]);
    }

    public function createRaidAction(Request $request)
    {
        $raid = new Raid();

        $form = $this->createForm(RaidType::class, $raid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($raid);
            $em->flush();

            return $this->redirectToRoute('removal_sb_raid_read');
        }

        return $this->render('@Removal/Raid/createRaid.html.twig', [
            'form' => $form->createView(), 'raid' => $raid
        ]);
    }

    public function createBossAction(Request $request)
    {
        $boss = new Bossdown();

        $form = $this->createForm(BossdownType::class, $boss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $boss->setImageUrl('eonar.png');
            $em = $this->getDoctrine()->getManager();
            $em->persist($boss);
            $em->flush();

            return $this->redirectToRoute('removal_sb_boss_read');
        }

        return $this->render('@Removal/Bossdown/create.html.twig', [
            'form' => $form->createView(), 'boss' => $boss
        ]);
    }

    public function updateRaidAction(Request $request, $raidID)
    {
        $em = $this->getDoctrine()->getManager();

        $raid = $em->getRepository('RemovalBundle:Raid')->find($raidID);

        if ($raid === null)
        {
            return $this->createNotFoundException();
        }

        $form = $this->createForm(RaidType::class, $raid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em->flush();

            return $this->redirectToRoute('removal_sb_raid_read');
        }

        return $this->render('@Removal/Raid/update.html.twig', array(
            'form' => $form->createView()));
    }

    public function deleteRaidAction($raidID)
    {
        $em = $this->getDoctrine()->getManager();

        $raid = $em->getRepository('RemovalBundle:Raid')->find($raidID);

        $em->remove($raid);
        $em->flush();

        return $this->redirectToRoute('removal_sb_raid_read');
    }
}
