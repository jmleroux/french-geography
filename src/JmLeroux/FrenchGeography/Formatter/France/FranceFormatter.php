<?php

namespace JmLeroux\FrenchGeography\Formatter\France;

use JmLeroux\FrenchGeography\Entity\Region;

class FranceFormatter
{
    /** @var Region[] */
    protected $regions;

    public function __construct(array $regions)
    {
        $this->regions = $regions;
    }
}
