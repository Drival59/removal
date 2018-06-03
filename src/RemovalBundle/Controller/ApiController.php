<?php
/**
 * Created by PhpStorm.
 * User: Kaiser
 * Date: 1/06/2018
 * Time: 16:54
 */

namespace RemovalBundle\Controller;


class ApiController extends MasterController
{
    public function returnApiAction()
    {
        $membres = json_decode(file_get_contents('https://eu.api.battle.net/wow/guild/Kirin%20Tor/Removal?fields=members&locale=fr_FR&apikey=j3knfksaj54s8gr9yfhvut2x4cgqm7zh'));
        $races = json_decode(file_get_contents('https://eu.api.battle.net/wow/data/character/races?locale=fr_FR&apikey=j3knfksaj54s8gr9yfhvut2x4cgqm7zh'));
        $auctions = json_decode(file_get_contents('http://auction-api-eu.worldofwarcraft.com/auction-data/dfed7ff77a836e9a73fa4aaa7eb2c0b7/auctions.json'));

        $items = [];
        $count = 0;
//        var_dump($auctions);

        foreach ($auctions->auctions as $auction)
        {
            if ($auction->owner == "Kaiserdh")
            {
                $items[] = json_decode(file_get_contents('https://eu.api.battle.net/wow/item/' . $auction->item . '?locale=fr_FR&apikey=j3knfksaj54s8gr9yfhvut2x4cgqm7zh'));
                $count = $count + 1;
            }
        }

        return $this->render('@Removal/Hotel/read.html.twig', [
            'membres' => $membres,
            'races' => $races,
            'auctions' => $auctions,
            'items' => $items,
            'count' => $count
        ]);
    }

    public function kaiserdhAction()
    {
        $auctions = json_decode(file_get_contents('http://auction-api-eu.worldofwarcraft.com/auction-data/dfed7ff77a836e9a73fa4aaa7eb2c0b7/auctions.json'));

        foreach ($auctions->auctions as $auction)
        {
            if ($auction->owner == "Kaiserdh")
            {
                $items[] = json_decode(file_get_contents('https://eu.api.battle.net/wow/item/' . $auction->item . '?locale=fr_FR&apikey=j3knfksaj54s8gr9yfhvut2x4cgqm7zh'));
            }
        }

        return $this->render('@Removal/Hotel/read_kaiserdh.html.twig', [
            'auctions' => $auctions,
            'items' => $items
        ]);
    }
}