<?php

require_once 'HighWay.php';



final class MotorWay extends HighWay
{
    private int $nbLane=4;
    private int $maxSpeed=130;

    public function addVehicle(Vehicle $vehicle)
    {
        if($vehicle instanceof Bicycle){
            echo "velo reperé sur l'autoroute" ;
        }else {
            $this->currentVehicles[] = $vehicle;
            echo "voiture ou camion flashé" ;
    }
}
}