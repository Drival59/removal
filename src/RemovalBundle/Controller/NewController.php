<?php

namespace RemovalBundle\Controller;

class NewController extends MasterController
{
  public function readAction($newsUrl)
  {
    $em = $this->getDoctrine()->getManager();
    $new = $em->getRepository('RemovalBundle:News')->findOneByUrl($newsUrl);
    $comments = $em->getRepository('RemovalBundle:Comment')->findByNews($new);
    $user = $this->getUser();
    return $this->render('@Removal/New/index.html.twig', array(
      'new' => $new,
      'comments' => $comments,
      'user' => $user,
    ));
  }

  public function moreAction($fn)
  {
    $em = $this->getDoctrine()->getManager();
    $moreNews = $em->getRepository('RemovalBundle:News')->showMoreNews($fn);
    $comments = $em->getRepository('RemovalBundle:Comment')->findAll();
    return $this->render('@Removal/New/moreNews.html.twig', array(
      'moreNews' => $moreNews,
      'comments' => $comments,
    ));
  }

}
