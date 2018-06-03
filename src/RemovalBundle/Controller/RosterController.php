<?php
/**
 * Created by PhpStorm.
 * User: Kaiser
 * Date: 2/06/2018
 * Time: 13:32
 */

namespace RemovalBundle\Controller;


class RosterController extends MasterController
{
    public function readAction()
    {
        $membres = json_decode(file_get_contents('https://eu.api.battle.net/wow/guild/Kirin%20Tor/Removal?fields=members&locale=fr_FR&apikey=j3knfksaj54s8gr9yfhvut2x4cgqm7zh'));

        return $this->render('@Removal/Roster/read.html.twig', [
            'membres' => $membres
        ]);
    }
}