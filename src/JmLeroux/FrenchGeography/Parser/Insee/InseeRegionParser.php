<?php

namespace JmLeroux\FrenchGeography\Parser\Insee;

use JmLeroux\FrenchGeography\Parser\Parser;
use JmLeroux\FrenchGeography\Parser\ParserInterface;

use JmLeroux\FrenchGeography\Entity\Region;

class InseeRegionParser extends Parser implements ParserInterface
{
    public function doParse()
    {
        $firstLine = true;
        $regions = array();

        $source = fopen($this->sourcePath, 'r');
        while ($line = fgetcsv($source, 0, "\t")) {
            if ($firstLine) {
                $firstLine = false;
                continue;
            }

            $region = new Region();
            $region->setCodeInsee($line[0]);
            $region->setName($line[4]);

            $regions[$region->getCodeInsee()] = $region;
        }
        fclose($source);

        return $regions;
    }
}
