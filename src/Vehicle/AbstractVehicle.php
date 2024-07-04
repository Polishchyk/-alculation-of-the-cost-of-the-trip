<?php
/**
 * Copyright (c) Author: Polishchyk. O. V. www.linkedin.com/in/oleksandr-polishchuk-4web
 */

namespace App\Vehicle;


/**
 * Class AbstractVehicle
 * @package App\Vehicle
 */
class AbstractVehicle implements VehicleInterface
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $passengerCapacity;
    /**
     * @var int
     */
    protected $maxCargoWeight;
    /**
     * @var float
     */
    protected $fuelConsumptionPer100km;
    /**
     * @var int
     */
    protected $maxDistance;
    /**
     * @var float
     */
    protected $depreciationCoefficient;

    /**
     * AbstractVehicle constructor.
     * @param string $name
     * @param int $passengerCapacity
     * @param int $maxCargoWeight
     * @param float $fuelConsumptionPer100km
     * @param int $maxDistance
     * @param float $depreciationCoefficient
     */
    public function __construct(
        string $name,
        int $passengerCapacity,
        int $maxCargoWeight,
        float $fuelConsumptionPer100km,
        int $maxDistance,
        float $depreciationCoefficient
    ) {
        $this->name = $name;
        $this->passengerCapacity = $passengerCapacity;
        $this->maxCargoWeight = $maxCargoWeight;
        $this->fuelConsumptionPer100km = $fuelConsumptionPer100km;
        $this->maxDistance = $maxDistance;
        $this->depreciationCoefficient = $depreciationCoefficient;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getPassengerCapacity(): int
    {
        return $this->passengerCapacity;
    }

    /**
     * @inheritDoc
     */
    public function getMaxCargoWeight(): int
    {
       return $this->maxCargoWeight;
    }

    /**
     * @inheritDoc
     */
    public function getFuelConsumptionPer100km(): float
    {
        return $this->fuelConsumptionPer100km;
    }

    /**
     * @inheritDoc
     */
    public function getMaxDistance(): int
    {
        return $this->maxDistance;
    }

    /**
     * @inheritDoc
     */
    public function getDepreciationCoefficient(): float
    {
        return $this->depreciationCoefficient;
    }

    /**
     * @inheritDoc
     */
    public function calculateCost(int $distance, float $fuelPrice, float $driverRate, float $driverCategoryCoefficient): float
    {
        $fuelCost = ($distance / 100) * $this->getFuelConsumptionPer100km() * $fuelPrice;
        $driverCost = $distance * $driverRate * $driverCategoryCoefficient;

        return $driverCost + ($fuelCost * $this->getDepreciationCoefficient());
    }
}
