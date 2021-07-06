<?php

namespace App\Service;

use App\Repository\TileRepository;

class MapManager{

    public function tileExists(TileRepository $tileRepository, int $x, int $y): Response 
    {
        if($x>11|$x<0|$y>5|$y<0){
        $em = $this->getDoctrine()->getManager();
        $tiles = $em->getRepository(Tile::class)->findAll();
        return "le bateau est perdu";
        }
    }




    public function getRandomIsland(TileRepository $tileRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $tiles = $em->getRepository(Tile::class)->findAll();

        $rand_isle = array_rand($tiles, 1);
    }
}