<?php
/**
 * Copyright (c) Author: Polishchyk. O. V. www.linkedin.com/in/oleksandr-polishchuk-4web
 */

namespace App\Vehicle;


/**
 * Interface VehicleInterface
 * @package App\Vehicle
 */
interface VehicleInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return int
     */
    public function getPassengerCapacity(): int;

    /**
     * @return int
     */
    public function getMaxCargoWeight(): int;

    /**
     * @return float
     */
    public function getFuelConsumptionPer100km(): float;

    /**
     * @return int
     */
    public function getMaxDistance(): int;

    /**
     * @return float
     */
    public function getDepreciationCoefficient(): float;

    /**
     * @param int $distance
     * @param float $fuelPrice
     * @param float $driverRate
     * @param float $driverCategoryCoefficient
     * @return float
     */
    public function calculateCost(int $distance, float $fuelPrice, float $driverRate, float $driverCategoryCoefficient): float;
}
