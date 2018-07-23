<?php

namespace RemovalBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends MasterController
{
  public function editAction(Request $request)
  {
    return $this->render('@Removal/User/edit.html.twig');
  }

  public function editpswAction(Request $request)
  {
    $user = $this->getUser();
    if ($request->isMethod('POST')) {
      if (password_verify($_POST['old-psw'], $user->getPassword())) {
        if($_POST['new-psw'] == $_POST['confirm-new-psw']) {

        } else {
          $this->addFlash("errorPsw", "Le mot de passe et sa confirmation ne sont pas identiques");
        }
      } else {
        $this->addFlash("errorOld", "L'ancien mot de passe est incorrect !");
      }
    }
    return $this->redirectToRoute('removal_user_edit');
  }
}
