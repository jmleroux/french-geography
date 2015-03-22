<?php

namespace JmLeroux\FrenchGeography\Parser\Insee;

use JmLeroux\FrenchGeography\Parser\Parser;
use JmLeroux\FrenchGeography\Parser\ParserInterface;

use JmLeroux\FrenchGeography\Entity\Department;

class InseeDepartmentParser extends Parser implements ParserInterface
{
    /**
     * @return Department[]
     */
    public function doParse()
    {
        $firstLine = true;
        $departments = [];

        $source = fopen($this->sourcePath, 'r');
        while ($line = fgetcsv($source, 0, "\t")) {
            // Skip headers
            if ($firstLine) {
                $firstLine = false;
                continue;
            }

            $department = new Department();
            $department->setRegionCode($line[0]);
            $department->setCode($line[1]);
            $department->setChiefTown($line[2]);
            $department->setName(utf8_encode($line[5]));

            $departments[$department->getCode()] = $department;
        }
        fclose($source);

        return $departments;
    }
}
