<?php
/**
 * Copyright (c) Author: Polishchyk. O. V. www.linkedin.com/in/oleksandr-polishchuk-4web
 */

use PHPUnit\Framework\TestCase;
use App\Vehicle\Motorcycle;

class MotorcycleTest extends TestCase
{
    public function testBusAttributes()
    {
        $motorcycle = new Motorcycle();

        $this->assertEquals('Motorcycle', $motorcycle->getName());
        $this->assertEquals(1, $motorcycle->getPassengerCapacity());
        $this->assertEquals(20, $motorcycle->getMaxCargoWeight());
        $this->assertEquals(3.0, $motorcycle->getFuelConsumptionPer100km());
        $this->assertEquals(100, $motorcycle->getMaxDistance());
        $this->assertEquals(2.0, $motorcycle->getDepreciationCoefficient());
    }

    public function testCalculateCost()
    {
        $motorcycle = new Motorcycle();
        $distance = 100;
        $fuelPrice = 30.0;
        $driverRate = 5.0;
        $driverCategoryCoefficient = 1.2;

        $cost = $motorcycle->calculateCost($distance, $fuelPrice, $driverRate, $driverCategoryCoefficient);

        $expectedCost = ($distance * $driverRate * $driverCategoryCoefficient) + (($distance / 100) * $motorcycle->getFuelConsumptionPer100km() * $fuelPrice * $motorcycle->getDepreciationCoefficient());
        $this->assertEquals($expectedCost, $cost);
    }
}
