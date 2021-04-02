<?php

require_once 'Vehicle.php';



class Truck extends Vehicle
{
    private int $stockage;
    private int $chargement=0;

    public function __construct(string $color, int $nbSeats,int $stockage)
    {
        $this->color = $color;
        $this->nbSeats = $nbSeats;
        $this->stockage = $stockage;
    }

    public function Remplissage(): string
    {
        $sentence = "";
        while ($this->chargement< $this->stockage) {
            $this->chargement++;
            $sentence .= "Remplissage !!!";
        }

        $sentence .= "Rempli !";
        return $sentence;
    }


public function getStockage(): int
{
    return $this->stockage;
}

public function setStockage(): void
{
    $this->stockage = $stockage;
}

public function getChargement(): int
{
    return $this->chargement;
}

public function setChargement(): void
{
    $this->chargement = $chargement;
}
}





?>