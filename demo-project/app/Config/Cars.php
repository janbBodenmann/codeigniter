<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Cars extends BaseConfig
{
    public $car_types = [
        10 => 'Limo',
        20 => 'Cabrio',
        30 => 'Bus'
    ];

    public $show_car_types = true;
}
