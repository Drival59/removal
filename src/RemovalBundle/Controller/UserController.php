<?php

namespace RemovalBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use RemovalBundle\Form\UserType;

class UserController extends MasterController
{
  public function editAction(Request $request)
  {
    $user = $this->getUser();
    $form = $this->createForm(UserType::class, $user);
    $form->handleRequest($request);
    if ($request->isMethod('POST')) {
      $em = $this->getDoctrine()->getManager();
      /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
      $file = $user->getAvatar();
      $fileName = md5(uniqid().'.'.$file->guessExtension());
      $file->move(
        $this->getParameter('avatars_directory'),
        $fileName
      );
      $user->setAvatar($fileName);
      $em->merge($user);
      $em->flush();
      $this->addFlash("validateAvatar", "Votre avatar a bien été modifié");
      return $this->redirectToRoute('removal_user_edit');
    }
    return $this->render('@Removal/User/edit.html.twig', array(
      'formAvatar' => $form->createView(),
    ));
  }

  public function editpswAction(Request $request)
  {
    $user = $this->getUser();
    if ($request->isMethod('POST')) {
      if (password_verify($_POST['old-psw'], $user->getPassword())) {
        if($_POST['new-psw'] == $_POST['confirm-new-psw']) {
          $em = $this->getDoctrine()->getManager();
          $user->setPassword(password_hash($_POST['new-psw'], PASSWORD_DEFAULT));
          $em->merge($user);
          $em->flush();
          $this->addFlash("validatePsw", "Votre mot de passe a été modifié.");
        } else {
          $this->addFlash("errorPsw", "Le mot de passe et sa confirmation ne sont pas identiques.");
        }
      } else {
        $this->addFlash("errorOldPsw", "L'ancien mot de passe est incorrect !");
      }
    }
    return $this->redirectToRoute('removal_user_edit');
  }

  public function editemailAction(Request $request)
  {
    $user = $this->getUser();
    if ($request->isMethod('POST')) {
      if ($_POST['old-email'] == $user->getEmail()) {
        if($_POST['new-email'] == $_POST['confirm-new-email']) {
          $em = $this->getDoctrine()->getManager();
          $checkEmail = $em->getRepository('RemovalBundle:User')->findOneByEmail($_POST['new-email']);
          if ($checkEmail == null) {
            $user->setEmail($_POST['new-email']);
            $em->merge($user);
            $em->flush();
            $this->addFlash("validateEmail", "Votre adresse email a été modifiée.");
          } else {
            $this->addFlash("errorCheck", "Cette adresse email est déjà utilisée.");
          }
        } else {
          $this->addFlash("errorEmail", "L'adresse email et sa confirmation ne sont pas identiques.");
        }
      } else {
        $this->addFlash("errorOldEmail", "L'ancienne adresse email est incorrecte !");
      }
    }
    return $this->redirectToRoute('removal_user_edit');
  }
}
