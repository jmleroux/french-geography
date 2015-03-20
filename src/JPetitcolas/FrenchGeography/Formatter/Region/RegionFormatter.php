<?php

namespace JPetitcolas\FrenchGeography\Formatter\Region;

use JPetitcolas\FrenchGeography\Entity\Region;

class RegionFormatter
{
    /** @var Region[] */
    protected $regions;

    public function __construct(array $regions)
    {
        $this->regions = $regions;
    }
}
