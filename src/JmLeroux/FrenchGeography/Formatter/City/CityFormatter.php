<?php

namespace JmLeroux\FrenchGeography\Formatter\City;

use JmLeroux\FrenchGeography\Entity\City;

class CityFormatter
{
    /** @var City[] */
    protected $cities;

    public function __construct(array $cities)
    {
        $this->cities = $cities;
    }
}
