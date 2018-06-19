<?php

namespace RemovalBundle\Controller;

use RemovalBundle\Entity\Comment;
use RemovalBundle\Form\CommentType;

use Symfony\Component\HttpFoundation\Request;

class NewController extends MasterController
{
  public function readAction($newsUrl, Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $new = $em->getRepository('RemovalBundle:News')->findOneByUrl($newsUrl);
    $comments = $em->getRepository('RemovalBundle:Comment')->myFindAll($new);
    $newComment = new Comment;
    $formComment = $this->createForm(CommentType::class, $newComment);
    $formComment->handleRequest($request);
    $user = $this->getUser();

    if ($request->isMethod('POST')) {
      $newComment->setUtilisateur($user);
      $newComment->setNews($new);
      $em->persist($newComment);
      $em->flush();
      $this->addFlash('notice', 'Votre commentaire a bien été ajouté.');
      return $this->redirectToRoute('removal_news_read', array(
        'newsUrl' => $new->getUrl(),
      ));
    }


    return $this->render('@Removal/New/index.html.twig', array(
      'new' => $new,
      'comments' => $comments,
      'user' => $user,
      'formComment' => $formComment->createView(),
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

  public function createAction(Request $request)
  {
    return $this->render('@Removal/New/create.html.twig');
  }

}
