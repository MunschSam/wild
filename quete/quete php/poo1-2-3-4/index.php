<?php


require_once 'Bicycle.php';
require_once 'Car.php';
require_once 'Truck.php';
require_once 'HighWay.php';
require_once 'MotorWay.php';
require_once 'PedestrianWay.php';
require_once 'ResidentialWay.php';

$bike = new Bicycle("red",2);
$bicycle = new Bicycle('blue', 1);
var_dump($bicycle,$bike);


$bike->setCurrentSpeed(24);



echo $bike->forward();
echo '<br> Vitesse du vélo : ' . $bike->getCurrentSpeed() . ' km/h' . '<br>';
echo $bike->brake();
echo '<br> Vitesse du vélo : ' . $bike->getCurrentSpeed() . ' km/h' . '<br>';
echo $bike->brake();





$car = new Car('green', 4, 'electric');
var_dump($car);

$car->setCurrentSpeed(90);

echo $car->start();
echo '<br> Vitesse de la voiture : ' . 0 . ' km/h' . '<br>';
echo $car->forward();
echo '<br> Vitesse de la voiture : ' . $car->getCurrentSpeed() . ' km/h' . '<br>';
echo $car->brake();
echo '<br> Vitesse de la voiture : ' . $car->getCurrentSpeed() . ' km/h' . '<br>';
echo $car->brake();



$truck= new Truck('black',2,5);
$truck->setCurrentSpeed(90);

var_dump($truck);

echo $truck->start();
echo '<br> Vitesse du camion : ' . 0 . ' km/h' . '<br>';
echo $truck->forward();
echo '<br> Vitesse du camion : ' . $truck->getCurrentSpeed() . ' km/h' . '<br>';
echo $truck->brake();
echo '<br> Vitesse du camion: ' . $truck->getCurrentSpeed() . ' km/h' . '<br>';
echo $truck->brake();
echo '<br>';
echo '<br>';
echo $truck->remplissage();

$pedestrianWay = new PedestrianWay('blue',1);
echo '<br>';
$pedestrianWay->addVehicle($bike);

$MotorWay = new MotorWay('blue',1);
echo '<br>';
$MotorWay->addVehicle($bike);

$MotorWay = new MotorWay('blue',1);
echo '<br>';
$MotorWay->addVehicle($car);

$MotorWay = new MotorWay('blue',1);
echo '<br>';
$MotorWay->addVehicle($truck);


$car->setParkBrake(true);
var_dump($car);



try {
    echo $car->start2();
    echo "<br>";
}
catch(Exception $e){
    
    $car->setParkBrake(false);
    var_dump($car);
}
finally{
    echo 'en avant Ma voiture roule comme un donut';
}

