<?php

namespace JmLeroux\FrenchGeography\Parser\Insee;

use JmLeroux\FrenchGeography\Entity\Department;
use JmLeroux\FrenchGeography\Entity\Region;

class InseeFranceParser
{
    /**
     * @return Region[]
     */
    public function parse()
    {
        $regionParser = new InseeRegionParser();
        $regionParser->setSource('data/upload/reg.txt');

        $france = $regionParser->parse();

        unset($regionParser);

        $departmentsParser = new InseeDepartmentParser();
        $departmentsParser->setSource('data/upload/depts.txt');

        $departments = $departmentsParser->parse();

        unset($departmentsParser);

        $this->aggregate($france, $departments);

        return $france;
    }

    /**
     * @param Region[]     $regions
     * @param Department[] $departments
     * @return Region[]
     */
    protected function aggregate($regions, $departments)
    {
        foreach($departments as $department) {
            $region = $regions[$department->getRegionCode()];
            $region->addDepartement($department);
        }
        return $regions;
    }
}
