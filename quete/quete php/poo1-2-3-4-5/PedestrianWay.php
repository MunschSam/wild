<?php

require_once 'HighWay.php';



final class PedestrianWay extends Vehicle
{
    private int $nbLane=1;
    private int $maxSpeed=10;

   

    public function addVehicle(Vehicle $vehicle)
    {
        if($vehicle instanceof Bicycle){
            $this->currentVehicles[] = $vehicle;
            echo "bienvenue bicycle" ;
        }else {
            echo "sort de ta voiture";
            
    }
}
}