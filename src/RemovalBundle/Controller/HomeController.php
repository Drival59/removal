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
        $news = $em->getRepository('RemovalBundle:News')->findAll();

        return $this->render('@Removal/Home/index.html.twig', array(
          'news' => $news,
        ));
    }
}
