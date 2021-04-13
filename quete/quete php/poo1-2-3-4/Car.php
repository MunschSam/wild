<?php


require_once 'Vehicle.php';



class Car extends Vehicle
{
    private string $energy;

    private int $energyLevel;

    private bool $hasParkBrake;

    public function getParkBrake():bool
    {
        return $this->parkBrake;
    }

    public function setParkBrake(bool $hasParkBrake)
    {
        $this->parkBrake = $hasParkBrake; 
    }

    public function start2()
    {
        if ($this->parkBrake === true){
            $reponse = "le frein à main !!!!";
            return $reponse; 
           throw new Exception($reponse);
        }
    }


    public function __construct(string $color, int $nbSeats, string $energy)
    {
        $this->color = $color;
        $this->nbSeats = $nbSeats;
        $this->energy = $energy;
    }

    public function getEnergy(): string
    {
        return $this->energy;
    }

    public function setEnergy(string $energy): void
    {
        $this->energy = $energy;
    }

    public function getEnergyLevel(): int
    {
        return $this->energyLevel;
    }

    public function setEnergyLevel(int $energyLevel): void
    {
        $this->energyLevel = $energyLevel;
    }
}




?>

