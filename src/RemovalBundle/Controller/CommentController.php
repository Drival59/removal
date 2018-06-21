<?php

namespace RemovalBundle\Controller;


class CommentController extends MasterController
{

  public function moreAction($newsUrl, $fc)
  {
    $em = $this->getDoctrine()->getManager();
    $new = $em->getRepository('RemovalBundle:News')->findOneByUrl($newsUrl);
    $moreComments = $em->getRepository('RemovalBundle:Comment')->showMoreComments($new, $fc);
    
    return $this->render('@Removal/Comment/moreComment.html.twig', array(
      'moreComments' => $moreComments,
    ));
  }


}
