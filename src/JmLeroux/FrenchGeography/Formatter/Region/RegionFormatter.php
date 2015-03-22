<?php

namespace JmLeroux\FrenchGeography\Formatter\Region;

use JmLeroux\FrenchGeography\Entity\Region;

class RegionFormatter
{
    /** @var Region[] */
    protected $regions;

    public function __construct(array $regions)
    {
        $this->regions = $regions;
    }
}
