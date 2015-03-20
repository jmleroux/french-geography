<?php

namespace JPetitcolas\FrenchGeography\Formatter\City;

use JPetitcolas\FrenchGeography\Entity\City;

class CityFormatter
{
    /** @var City[] */
    protected $cities;

    public function __construct(array $cities)
    {
        $this->cities = $cities;
    }
}
