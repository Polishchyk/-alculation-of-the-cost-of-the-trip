<?php
/**
 * Copyright (c) Author: Polishchyk. O. V. www.linkedin.com/in/oleksandr-polishchuk-4web
 */

use PHPUnit\Framework\TestCase;
use App\Calculator;
use App\Vehicle\Bus;
use App\Vehicle\Car;
use App\Vehicle\Motorcycle;

class CalculatorTest extends TestCase
{
    public function testAddVehicle()
    {
        $calculator = new Calculator();
        $bus = new Bus();
        $car = new Car();
        $motorcycle = new Motorcycle();

        $calculator->addVehicle($bus);
        $calculator->addVehicle($car);
        $calculator->addVehicle($motorcycle);

        $reflection = new ReflectionClass($calculator);
        $property = $reflection->getProperty('vehicles');
        $property->setAccessible(true);
        $vehicles = $property->getValue($calculator);

        $this->assertCount(3, $vehicles);
        $this->assertInstanceOf(Bus::class, $vehicles[0]);
        $this->assertInstanceOf(Car::class, $vehicles[1]);
        $this->assertInstanceOf(Motorcycle::class, $vehicles[2]);
    }

    public function testCalculate()
    {
        $calculator = new Calculator();
        $bus = new Bus();
        $car = new Car();
        $motorcycle = new Motorcycle();

        $calculator->addVehicle($bus);
        $calculator->addVehicle($car);
        $calculator->addVehicle($motorcycle);

        $passengers = 1;
        $cargoWeight = 10;
        $distance = 100;

        ob_start();
        $calculator->calculate($passengers, $cargoWeight, $distance);
        $output = ob_get_clean();

        $expectedCost = ($distance * 5.0 * 1.2) + (($distance / 100) * 20.0 * 30.0 * 2.0);
        $expectedOutput = "Transport: Bus - Cost: {$expectedCost} грн\n";

        $expectedCost = ($distance * 5.0 * 1.2) + (($distance / 100) * 8.0 * 30.0 * 2.0);
        $expectedOutput .= "Transport: Car - Cost: {$expectedCost} грн\n";

        $expectedCost = ($distance * 5.0 * 1.2) + (($distance / 100) * 3.0 * 30.0 * 2.0);
        $expectedOutput .= "Transport: Motorcycle - Cost: {$expectedCost} грн\n";

        $this->assertEquals($expectedOutput, $output);
    }
}
