<?php

namespace JmLeroux\FrenchGeography\Parser\Insee;

use JmLeroux\FrenchGeography\Parser\Parser;
use JmLeroux\FrenchGeography\Parser\ParserInterface;

use JmLeroux\FrenchGeography\Entity\City;

class InseeCityParser extends Parser implements ParserInterface
{
    public function parse()
    {
        if (!$this->sourcePath) {
            throw new \Exception('Try to parse with no file set.');
        }

        $firstLine = true;
        $cities = array();

        $source = fopen($this->sourcePath, 'r');
        while ($line = fgetcsv($source, 0, "\t")) {
            // Skip headers
            if ($firstLine) {
                $firstLine = false;
                continue;
            }

            $city = new City();
            $city->setRegionCode($line[2]);
            $city->setDepartmentCode($line[3]);
            $city->setName(utf8_encode($line[11]));
            $city->setPrefix(substr($line[10], 1, -1));

            $cities[] = $city;
        }
        fclose($source);

        return $cities;
    }
}
