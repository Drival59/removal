<?php

namespace RemovalBundle\Controller;

class NewController extends MasterController
{
  public function readAction($newsUrl)
  {
    $em = $this->getDoctrine()->getManager();
    $new = $em->getRepository('RemovalBundle:News')->findOneByUrl($newsUrl);
    return $this->render('@Removal/New/index.html.twig', array(
      'new' => $new,
    ));
  }
}
