<?php

namespace RemovalBundle\Controller;

use RemovalBundle\Entity\Mythique;
use RemovalBundle\Entity\Participants;
use RemovalBundle\Form\MythiqueType;
use RemovalBundle\Form\ParticipantsType;
use Symfony\Component\HttpFoundation\Request;

class MythiqueController extends MasterController
{

    public function readAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupes = $em->getRepository('RemovalBundle:Mythique')->findAll();
        $participants = $em->getRepository('RemovalBundle:Participants')->findAll();
        $user = $this->getUser()->getId();

        return $this->render('@Removal/Mythique/read.html.twig', [
            'groupes' => $groupes,
            'participants' => $participants,
            'user' => $user
        ]);
    }


    public function createAction(Request $request)
    {
        $groupe = new Mythique();

        $form = $this->createForm(MythiqueType::class, $groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $groupe->setUser($this->getUser());
            $em->persist($groupe);
            $em->flush();

            return $this->redirectToRoute('removal_user_groupe_read');
        }

        return $this->render('@Removal/Mythique/create.html.twig', [
            'form' => $form->createView(), 'groupe' => $groupe
        ]);
    }

    public function updateAction(Request $request, $groupeID)
    {
        $em = $this->getDoctrine()->getManager();

        $groupe = $em->getRepository('RemovalBundle:Mythique')->find($groupeID);

        $form = $this->createForm(MythiqueType::class, $groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em->flush();

            return $this->redirectToRoute('removal_user_groupe_read');
        }

        return $this->render('@Removal/Mythique/update.html.twig', [
            'form' => $form->createView(), 'groupe' => $groupe
        ]);
    }

    public function deleteAction($groupeID)
    {
        $em = $this->getDoctrine()->getManager();

        $groupe = $em->getRepository('RemovalBundle:Mythique')->find($groupeID);

        $em->remove($groupe);
        $em->flush();

        return $this->redirectToRoute('removal_user_groupe_read');
    }

    public function inscriptionAction(Request $request, $groupeID)
    {
        $em = $this->getDoctrine()->getManager();

        $participant = new Participants();

        $user = $this->getUser();
        $groupe = $em->getRepository('RemovalBundle:Mythique')->find($groupeID);

        $form = $this->createForm(ParticipantsType::class, $participant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $participant->setGroupe($groupe);
            $participant->setUser($user);
            $participant->setStatus("En attente");
            $em->persist($participant);
            $em->flush();
            $this->addFlash('notice', 'Votre inscription a bien été Envoyée !');

            return $this->redirectToRoute('removal_user_groupe_read');
        }

        return $this->render('@Removal/Mythique/inscription.html.twig', [
            'form' => $form->createView(), 'participant' => $participant
        ]);

    }

    public function gestionReadAction()
    {

        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser()->getId();

        $groupes = $em->getRepository('RemovalBundle:Mythique')->findAll();

        return $this->render('@Removal/Mythique/gestion.html.twig', [
            'groupes' => $groupes,
            'user' => $user
        ]);
    }

    public function readCandidatureAction($groupeID)
    {
        $em = $this->getDoctrine()->getManager();
        $candidatures = $em->getRepository('RemovalBundle:Participants')->findByGroupe($groupeID);

        return $this->render('@Removal/Mythique/readCandidature.html.twig', [
            'candidatures' => $candidatures
        ]);
    }

    public function ValideInscriptionAction($participantID)
    {
        $em = $this->getDoctrine()->getManager();

        $participant = $em->getRepository('RemovalBundle:Participants')->find($participantID);

        $participant->setStatus("Validé");

        $em->flush();
        $this->addFlash('notice', 'La validation de la candidature à bien été envoyée');

        return $this->redirectToRoute('removal_user_groupe_gestion');
    }

    public function RefusInscriptionAction($participantID)
    {
        $em = $this->getDoctrine()->getManager();

        $participant = $em->getRepository('RemovalBundle:Participants')->find($participantID);
        $groupe = $participant->getGroupe();
        if ($participant->getStatus() != "En attente")
        {
            if ($participant->getSpecialisation() == "TANK")
            {
                $groupe->settank("Ouvert");
            }elseif ($participant->getSpecialisation() == "HEAL")
            {
                $groupe->setheal("Ouvert");
            }elseif ($participant->getSpecialisation() != "DPS CAC" || $participant->getSpecialisation() != "DPS DISTANT" && $groupe->getdps1() == $participant->getNompersonnage())
            {
                $groupe->setdps1("Ouvert");
            }elseif ($participant->getSpecialisation() != "DPS CAC" || $participant->getSpecialisation() != "DPS DISTANT" && $groupe->getdps2() == $participant->getNompersonnage())
            {
                $groupe->setdps2("Ouvert");
            }elseif ($participant->getSpecialisation() != "DPS CAC" || $participant->getSpecialisation() != "DPS DISTANT" && $groupe->getdps3() == $participant->getNompersonnage())
            {
                $groupe->setdps3("Ouvert");
            }
        }

        $em->remove($participant);
        $em->flush();
        $this->addFlash('notice', 'Le refus de la candidature à bien été envoyé');

        return $this->redirectToRoute('removal_user_groupe_gestion');
    }

    public function updateInscriptionAction($participantID)
    {
        $em = $this->getDoctrine()->getManager();

        $participant = $em->getRepository('RemovalBundle:Participants')->find($participantID);
        $participant->setStatus("Validé");

        $name = $participant->getNompersonnage();

        $groupe = $participant->getGroupe();

        if ($participant->getSpecialisation() == "TANK")
        {
            $groupe->settank($name);
        }elseif ($participant->getSpecialisation() == "HEAL")
        {
            $groupe->setheal($name);
        }elseif ($groupe->getdps1() == "Ouvert" || $groupe->getdps1() == "Dps distance" || $groupe->getdps1() == "Dps cac" || $groupe->getdps1() == "Chasseur - Maîtrise des bêtes" || $groupe->getdps1() == "Chasseur - Précision" ||
            $groupe->getdps1() == "Chasseur - Survie" || $groupe->getdps1() == "Prêtre - Discipline" || $groupe->getdps1() == "Prêtre - Ombre" || $groupe->getdps1() == "Guerrier - Armes" || $groupe->getdps1() == "Guerrier - Furie" ||
            $groupe->getdps1() == "Dk - Givre" || $groupe->getdps1() == "Dk - Impie" || $groupe->getdps1() == "Mage - Arcane" || $groupe->getdps1() == "Mage - Feu" || $groupe->getdps1() == "Mage - Givre" || $groupe->getdps1() == "Voleur - Assassinat" ||
            $groupe->getdps1() == "Voleur - Hors-la-loi" || $groupe->getdps1() == "Voleur - Finesse" || $groupe->getdps1() == "Dh - Dévastation" || $groupe->getdps1() == "Moine - Marche-vent" || $groupe->getdps1() == "Chaman - Élémentaire" ||
            $groupe->getdps1() == "Chaman - Amélioration" || $groupe->getdps1() == "Druide - Équilibre" || $groupe->getdps1() == "Druide - Féral" || $groupe->getdps1() == "Paladin - Rétribution" || $groupe->getdps1() == "Démo - Affliction" ||
            $groupe->getdps1() == "Démo - Démonologie" || $groupe->getdps1() == "Démo - Destruction" and ($participant->getSpecialisation() == "DPS CAC" || $participant->getSpecialisation() == "DPS DISTANT"))
        {
            $groupe->setdps1($name);
        }elseif ($groupe->getdps2() == "Ouvert" || $groupe->getdps2() == "Dps distance" || $groupe->getdps2() == "Dps cac" || $groupe->getdps2() == "Chasseur - Maîtrise des bêtes" || $groupe->getdps2() == "Chasseur - Précision" ||
            $groupe->getdps2() == "Chasseur - Survie" || $groupe->getdps2() == "Prêtre - Discipline" || $groupe->getdps2() == "Prêtre - Ombre" || $groupe->getdps2() == "Guerrier - Armes" || $groupe->getdps2() == "Guerrier - Furie" ||
            $groupe->getdps2() == "Dk - Givre" || $groupe->getdps2() == "Dk - Impie" || $groupe->getdps2() == "Mage - Arcane" || $groupe->getdps2() == "Mage - Feu" || $groupe->getdps2() == "Mage - Givre" || $groupe->getdps2() == "Voleur - Assassinat" ||
            $groupe->getdps2() == "Voleur - Hors-la-loi" || $groupe->getdps2() == "Voleur - Finesse" || $groupe->getdps2() == "Dh - Dévastation" || $groupe->getdps2() == "Moine - Marche-vent" || $groupe->getdps2() == "Chaman - Élémentaire" ||
            $groupe->getdps2() == "Chaman - Amélioration" || $groupe->getdps2() == "Druide - Équilibre" || $groupe->getdps2() == "Druide - Féral" || $groupe->getdps2() == "Paladin - Rétribution" || $groupe->getdps2() == "Démo - Affliction" ||
            $groupe->getdps2() == "Démo - Démonologie" || $groupe->getdps2() == "Démo - Destruction" and ($participant->getSpecialisation() == "DPS CAC" || $participant->getSpecialisation() == "DPS DISTANT"))
        {
            $groupe->setdps2($name);
        }elseif ($groupe->getdps3() == "Ouvert" || $groupe->getdps3() == "Dps distance" || $groupe->getdps3() == "Dps cac" || $groupe->getdps3() == "Chasseur - Maîtrise des bêtes" || $groupe->getdps3() == "Chasseur - Précision" ||
            $groupe->getdps3() == "Chasseur - Survie" || $groupe->getdps3() == "Prêtre - Discipline" || $groupe->getdps3() == "Prêtre - Ombre" || $groupe->getdps3() == "Guerrier - Armes" || $groupe->getdps3() == "Guerrier - Furie" ||
            $groupe->getdps3() == "Dk - Givre" || $groupe->getdps3() == "Dk - Impie" || $groupe->getdps3() == "Mage - Arcane" || $groupe->getdps3() == "Mage - Feu" || $groupe->getdps3() == "Mage - Givre" || $groupe->getdps3() == "Voleur - Assassinat" ||
            $groupe->getdps3() == "Voleur - Hors-la-loi" || $groupe->getdps3() == "Voleur - Finesse" || $groupe->getdps3() == "Dh - Dévastation" || $groupe->getdps3() == "Moine - Marche-vent" || $groupe->getdps3() == "Chaman - Élémentaire" ||
            $groupe->getdps3() == "Chaman - Amélioration" || $groupe->getdps3() == "Druide - Équilibre" || $groupe->getdps3() == "Druide - Féral" || $groupe->getdps3() == "Paladin - Rétribution" || $groupe->getdps3() == "Démo - Affliction" ||
            $groupe->getdps3() == "Démo - Démonologie" || $groupe->getdps3() == "Démo - Destruction" and ($participant->getSpecialisation() == "DPS CAC" || $participant->getSpecialisation() == "DPS DISTANT"))
        {
            $groupe->setdps3($name);
        }

        $em->flush();
        $this->addFlash('notice', 'La validation de la candidature à bien été envoyée');

        return $this->redirectToRoute('removal_user_groupe_gestion');

    }
}
