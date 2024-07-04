<?php
/**
 * Copyright (c) Author: Polishchyk. O. V. www.linkedin.com/in/oleksandr-polishchuk-4web
 */

namespace App\Vehicle;


/**
 * Class Car
 * @package App\Vehicle
 */
class Car extends AbstractVehicle
{
    /**
     * Car constructor.
     */
    public function __construct()
    {
        parent::__construct('Car', 4, 100, 8.0, 600, 2.0);
    }
}
