<?php
/**
 * Copyright (c) Author: Polishchyk. O. V. www.linkedin.com/in/oleksandr-polishchuk-4web
 */
require 'vendor/autoload.php';

use App\Calculator;
use App\Vehicle\Bus;
use App\Vehicle\Car;
use App\Vehicle\Motorcycle;

$calculator = new Calculator();
$calculator->addVehicle(new Bus());
$calculator->addVehicle(new Car());
$calculator->addVehicle(new Motorcycle());

$passengers = 4;
$cargoWeight = 20;
$distance = 100;

$calculator->calculate($passengers, $cargoWeight, $distance);
