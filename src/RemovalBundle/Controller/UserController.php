<?php

namespace RemovalBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends MasterController
{
  public function editAction(Request $request)
  {
    $user = $this->getUser();

    if ($request->isMethod('POST')) {
      if (password_verify($_POST['old-psw'], $user->getPassword())) {
        dump("VRAI");
      } else {
        $this->addFlash("errorOld", "L'ancien mot de passe est incorrect !");
      }
    }
    return $this->render('@Removal/User/edit.html.twig');
  }
}
