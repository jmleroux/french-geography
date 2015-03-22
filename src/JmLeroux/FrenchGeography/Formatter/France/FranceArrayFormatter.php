<?php

namespace JmLeroux\FrenchGeography\Formatter\France;

use JmLeroux\FrenchGeography\Entity\Region;
use JmLeroux\FrenchGeography\Formatter\FormatterInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class FranceArrayFormatter extends FranceFormatter implements FormatterInterface
{
    /** @var  ClassMethods */
    protected $hydrator;

    public function format()
    {
        $this->hydrator = new ClassMethods(false);

        $output = ['regions' => []];
        foreach ($this->regions as $region) {
            $output['regions'][$region->getCodeInsee()] = $this->encodeRegion($region);
        }

        return $output;
    }

    public function encodeRegion(Region $region)
    {
        $departments = [];
        foreach ($region->getDepartements() as $department) {
            $departments[$department->getCode()] = $this->hydrator->extract($department);
        }
        $region->setDepartements($departments);
        $region = $this->hydrator->extract($region);

        return $region;
    }
}
