<?php
/**
 * Created by PhpStorm.
 * User: Kaiser
 * Date: 29/05/2018
 * Time: 19:37
 */

namespace RemovalBundle\Controller;


class HomeController extends MasterController
{
    public function readAction()
    {
        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository('RemovalBundle:News')->myFindAll();
        $raidsInProgress = $em->getRepository('RemovalBundle:Raid')->findByInProgress(1);
        $bossdowns = $em->getRepository('RemovalBundle:Bossdown')->findByRaid($raidsInProgress);
        return $this->render('@Removal/Home/index.html.twig', array(
          'news' => $news,
          'raidsInProgress' => $raidsInProgress,
          'bossdowns' => $bossdowns,
        ));
    }
}
