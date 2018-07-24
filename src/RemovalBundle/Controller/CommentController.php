<?php

namespace RemovalBundle\Controller;

use RemovalBundle\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends MasterController
{

  public function moreAction($newsUrl, $fc)
  {
    $em = $this->getDoctrine()->getManager();
    $new = $em->getRepository('RemovalBundle:News')->findOneByUrl($newsUrl);
    $moreComments = $em->getRepository('RemovalBundle:Comment')->showMoreComments($new, $fc);

    return $this->render('@Removal/Comment/moreComment.html.twig', array(
      'moreComments' => $moreComments,
      'newsUrl' => $newsUrl
    ));
  }

  public function editAction($newsUrl, $commentId, Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $user = $this->getUser();
    $comment = $em->getRepository('RemovalBundle:Comment')->findOneById($commentId);
    $commentByUser = $em->getRepository('RemovalBundle:Comment')->myFindOneByCommentUser($commentId, $user);
    if ($comment != null AND (count($commentByUser) != 0 || $this->isGranted('ROLE_SB'))) {
      $form = $this->createForm(CommentType::class, $comment);
      $form->handleRequest($request);
      if ($form->isSubmitted()) {
        $em->merge($comment);
        $em->flush();
        $this->addFlash('noticeComment', 'Le commentaire a bien été modifié.');
        return $this->redirectToRoute('removal_news_read', array(
          'newsUrl' => $newsUrl,
        ));
      }
      return $this->render('@Removal/Comment/edit.html.twig', array(
        'form' => $form->createView(),
      ));
    }
    return $this->redirectToRoute('removal_news_read', array(
      'newsUrl' => $newsUrl,
    ));
  }

  public function deleteAction($newsUrl, $commentId)
  {
    $em = $this->getDoctrine()->getManager();
    $user = $this->getUser();
    $comment = $em->getRepository('RemovalBundle:Comment')->findOneById($commentId);
    $commentByUser = $em->getRepository('RemovalBundle:Comment')->myFindOneByCommentUser($commentId, $user);
    if ($comment != null AND (count($commentByUser) != 0 || $this->isGranted('ROLE_SB'))) {
      $em->remove($comment);
      $em->flush();
      $this->addFlash('noticeComment', 'Le commentaire a bien été supprimé.');
    }
    return $this->redirectToRoute('removal_news_read', array(
      'newsUrl' => $newsUrl,
    ));
  }

}
