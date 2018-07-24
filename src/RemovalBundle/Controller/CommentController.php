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

  public function deleteAction($newsUrl, $commentId)
  {
    $em = $this->getDoctrine()->getManager();
    $user = $this->getUser();
    $comment = $em->getRepository('RemovalBundle:Comment')->findOneById($commentId);
    $commentByUser = $em->getRepository('RemovalBundle:Comment')->myFindOneByCommentUser($commentId, $user);
    if ($comment != null AND count($commentByUser) != 0) {
      $em->remove($comment);
      $em->flush();
      $this->addFlash('noticeComment', 'Le commentaire a bien été supprimé.');
    }
    return $this->redirectToRoute('removal_news_read', array(
      'newsUrl' => $newsUrl,
    ));
  }

}
