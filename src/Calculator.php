<?php
/**
 * Copyright (c) Author: Polishchyk. O. V. www.linkedin.com/in/oleksandr-polishchuk-4web
 */

namespace App;

use App\Vehicle\VehicleInterface;


/**
 * Class Calculator
 * @package App
 */
class Calculator
{
    /**
     * @var array
     */
    private $vehicles = [];
    /**
     * @var float
     */
    private $fuelPrice = 30.0; // грн за літр
    /**
     * @var float
     */
    private $driverRate = 5.0; // грн за км
    /**
     * @var float
     */
    private $driverCategoryCoefficient = 1.2;

    /**
     * @param VehicleInterface $vehicle
     */
    public function addVehicle(VehicleInterface $vehicle)
    {
        $this->vehicles[] = $vehicle;
    }

    /**
     * @param int $passengers
     * @param int $cargoWeight
     * @param int $distance
     */
    public function calculate(int $passengers, int $cargoWeight, int $distance)
    {
        foreach ($this->vehicles as $vehicle) {
            if ($passengers <= $vehicle->getPassengerCapacity() &&
                $cargoWeight <= $vehicle->getMaxCargoWeight() &&
                $distance <= $vehicle->getMaxDistance()) {

                $cost = $vehicle->calculateCost(
                    $distance,
                    $this->fuelPrice,
                    $this->driverRate,
                    $this->driverCategoryCoefficient
                );

                echo "Transport: {$vehicle->getName()} - Cost: {$cost} грн\n";
            }else{
                echo "This transport: {$vehicle->getName()} is not suitable for the given input parameters";
            }
        }
    }
}
