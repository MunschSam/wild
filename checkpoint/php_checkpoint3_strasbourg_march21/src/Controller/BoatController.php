<?php

namespace App\Controller;

use App\Entity\Boat;
use App\Repository\BoatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/boat")
 */
class BoatController extends AbstractController
{
    /**
     * Move the boat to coord x,y
     * @Route("/move/{x}/{y}", name="moveBoat", requirements={"x"="\d+", "y"="\d+"}))
     */
    public function moveBoat(int $x, int $y, BoatRepository $boatRepository, EntityManagerInterface $em): Response
    {
        $boat = $boatRepository->findOneBy([]);
        $boat->setCoordX($x);
        $boat->setCoordY($y);
        $em->flush();
        return $this->redirectToRoute('map');
    }

    /**
     * Move the boat to coord N,S,E,W
     * @Route("/boat/direction/{direction}", name="moveBoat")
     */
    public function moveDirection($direction, int $x, int $y, BoatRepository $boatRepository, EntityManagerInterface $em): Response
    {
        $boat = $boatRepository->findOneBy([]);
        $boat->getCoordX($x);
        $boat->getCoordY($y);

        if($direction == $E){
          $boat->setCoordX($x)+1;
          $boat->setCoordY($y);
          return $this->redirectToRoute('map');
        }

        else if($direction == $W){
        $boat->setCoordX($x)-1;
        $boat->setCoordY($y);
        return $this->redirectToRoute('map');
        }

        else if($direction == $S){
        $boat->setCoordX($x);
        $boat->setCoordY($y)+1;
        return $this->redirectToRoute('map');
        }

        else if($direction == $N){
        $boat->setCoordX($x);
        $boat->setCoordY($y)-1;
        return $this->redirectToRoute('map');
        }

        return $this->render('map/index.html.twig', [
            'E' => $E,
            'W' => $W,
            'S' => $S,
            'N' => $N,
        ]);
    }
}
