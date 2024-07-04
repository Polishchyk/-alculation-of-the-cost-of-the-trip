<?php
/**
 * Copyright (c) Author: Polishchyk. O. V. www.linkedin.com/in/oleksandr-polishchuk-4web
 */

use PHPUnit\Framework\TestCase;
use App\Vehicle\Bus;

class BusTest extends TestCase
{
    public function testBusAttributes()
    {
        $bus = new Bus();

        $this->assertEquals('Bus', $bus->getName());
        $this->assertEquals(32, $bus->getPassengerCapacity());
        $this->assertEquals(300, $bus->getMaxCargoWeight());
        $this->assertEquals(20.0, $bus->getFuelConsumptionPer100km());
        $this->assertEquals(200, $bus->getMaxDistance());
        $this->assertEquals(2.0, $bus->getDepreciationCoefficient());
    }

    public function testCalculateCost()
    {
        $bus = new Bus();
        $distance = 150;
        $fuelPrice = 30.0;
        $driverRate = 5.0;
        $driverCategoryCoefficient = 1.2;

        $cost = $bus->calculateCost($distance, $fuelPrice, $driverRate, $driverCategoryCoefficient);

        $expectedCost = ($distance * $driverRate * $driverCategoryCoefficient) + (($distance / 100) * $bus->getFuelConsumptionPer100km() * $fuelPrice * $bus->getDepreciationCoefficient());
        $this->assertEquals($expectedCost, $cost);
    }
}
