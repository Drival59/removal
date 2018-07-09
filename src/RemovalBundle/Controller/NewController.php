<?php

namespace RemovalBundle\Controller;

use RemovalBundle\Entity\Comment;
use RemovalBundle\Entity\News;
use RemovalBundle\Form\CommentType;

use RemovalBundle\Form\NewsType;
use Symfony\Component\HttpFoundation\Request;

class NewController extends MasterController
{
  public function readAction($newsUrl, Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $new = $em->getRepository('RemovalBundle:News')->findOneByUrl($newsUrl);
    $comments = $em->getRepository('RemovalBundle:Comment')->myFindAll($new);
    $allComments = $em->getRepository('RemovalBundle:Comment')->findByNews($new);
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
      'allComments' => $allComments,
      'newsUrl' => $newsUrl,
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
      $new = new News();

      $em = $this->getDoctrine()->getManager();

      $form = $this->createForm(NewsType::class, $new);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
      {
          $user = $this->getUser();
          $new->setUrl(str_replace(' ','-',$new->getTitle()));
          $new->setUtilisateur($user);
          /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
          $file = $new->getImageUrl();
          $fileName = md5(uniqid().'.'.$file->guessExtension());
          $file->move(
            $this->getParameter('news_images_directory'),
            $fileName
          );
          $new->setImageUrl($fileName);
          $em->persist($new);
          $em->flush();

          return $this->redirectToRoute('removal_homepage');
      }

      return $this->render('@Removal/New/create.html.twig', [
          'form' => $form->createView(),
      ]);
  }

  public function deleteAction($newsUrl)
  {
    $em = $this->getDoctrine()->getManager();
    $user = $this->getUser();
    $new = $em->getRepository('RemovalBundle:News')->findOneByUrl($newsUrl);
    if ($new != null) {
      $em->remove($new);
      $em->flush();
    }
    return $this->redirectToRoute('removal_homepage');
  }

  public function editAction(Request $request, $newsUrl)
  {
    $em = $this->getDoctrine()->getManager();
    $new = $em->getRepository('RemovalBundle:News')->findOneByUrl($newsUrl);
    $newsImage = $new->getImageUrl();
    $new->setImageUrl(null);
    $form = $this->createForm(NewsType::class, $new);
    $form->handleRequest($request);
    $user = $this->getUser();

    if ($form->isSubmitted())
    {
        $new->setUrl(str_replace(' ','-',$new->getTitle()));
        $new->setUtilisateur($user);
        if ($new->getImageUrl() != null) {
          /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
          $file = $new->getImageUrl();
          $fileName = md5(uniqid().'.'.$file->guessExtension());
          $file->move(
            $this->getParameter('news_images_directory'),
            $fileName
          );
          $new->setImageUrl($fileName);
        } else {
          $new->setImageUrl($newsImage);
        }
        $em->merge($new);
        $em->flush();
        return $this->redirectToRoute('removal_homepage');
    }

    return $this->render('@Removal/New/edit.html.twig', [
        'form' => $form->createView(), 'new' => $new
    ]);

  }

}
