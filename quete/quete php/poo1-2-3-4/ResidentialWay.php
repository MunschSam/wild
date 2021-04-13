<?php

require_once 'HighWay.php';



final class ResidentialWay extends Vehicle
{
    private int $nbLane=2;
    private int $maxSpeed=50;


    public function addVehicle(Vehicle $vehicle)
    {
        if($vehicle instanceof Vehicle){
            $this->currentVehicles[] = $vehicle;
            echo "bienvenue" ;
        }else {
            echo "return chez toi";
            
    }
}
}