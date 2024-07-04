<?php
/**
 * Copyright (c) Author: Polishchyk. O. V. www.linkedin.com/in/oleksandr-polishchuk-4web
 */

namespace App\Vehicle;


/**
 * Class Motorcycle
 * @package App\Vehicle
 */
class Motorcycle extends AbstractVehicle
{
    /**
     * Motorcycle constructor.
     */
    public function __construct()
    {
        parent::__construct('Motorcycle', 1, 20, 3.0, 100, 2.0);
    }
}
