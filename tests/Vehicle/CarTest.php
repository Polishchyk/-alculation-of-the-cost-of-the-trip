<?php
/**
 * Copyright (c) Author: Polishchyk. O. V. www.linkedin.com/in/oleksandr-polishchuk-4web
 */

use PHPUnit\Framework\TestCase;
use App\Vehicle\Car;

class CarTest extends TestCase
{
    public function testBusAttributes()
    {
        $car = new Car();

        $this->assertEquals('Car', $car->getName());
        $this->assertEquals(4, $car->getPassengerCapacity());
        $this->assertEquals(100, $car->getMaxCargoWeight());
        $this->assertEquals(8.0, $car->getFuelConsumptionPer100km());
        $this->assertEquals(600, $car->getMaxDistance());
        $this->assertEquals(2.0, $car->getDepreciationCoefficient());
    }

    public function testCalculateCost()
    {
        $car = new Car();
        $distance = 150;
        $fuelPrice = 30.0;
        $driverRate = 5.0;
        $driverCategoryCoefficient = 1.2;

        $cost = $car->calculateCost($distance, $fuelPrice, $driverRate, $driverCategoryCoefficient);

        $expectedCost = ($distance * $driverRate * $driverCategoryCoefficient) + (($distance / 100) * $car->getFuelConsumptionPer100km() * $fuelPrice * $car->getDepreciationCoefficient());
        $this->assertEquals($expectedCost, $cost);
    }
}
