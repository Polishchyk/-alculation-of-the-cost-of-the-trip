<?php
/**
 * Copyright (c) Author: Polishchyk. O. V. www.linkedin.com/in/oleksandr-polishchuk-4web
 */

namespace App\Vehicle;


/**
 * Class Bus
 * @package App\Vehicle
 */
class Bus extends AbstractVehicle
{
    /**
     * Bus constructor.
     */
    public function __construct()
    {
        parent::__construct('Bus', 32, 300, 20.0, 200, 2.0);
    }
}
