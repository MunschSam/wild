<?php


abstract class HighWay{
   private array $currentVehicle;
   private int $nbLane;
   private int $maxSpeed;

   abstract public function addVehicle(Vehicle $vehicle);

   public function getCurrentVehicle(): array
   {
       return $this->currentVehicle;
   }

   public function setCurrentVehicle(array $currentVehicle): void
   {
       $this->currentVehicle = $currentVehicle;
   }

   public function getNbLane(): int
   {
       return $this->nbLane;
   }

   public function setNbLane(int $nbLane): void
   {
       $this->nbLane = $nbLane;
   }

   public function getMaxSpeed(): int
   {
       return $this->maxSpeed;
   }

   public function setMaxSpeed(int $maxSpeed): void
   {
       $this->maxSpeed = $maxSpeed;
   }

   
}

?>