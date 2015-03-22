<?php

namespace JmLeroux\FrenchGeography\Formatter\Department;

use JmLeroux\FrenchGeography\Formatter\FormatterInterface;

class DepartmentYamlFormatter extends DepartmentFormatter implements FormatterInterface
{
    public function format()
    {
        $output = 'departments:'.PHP_EOL.PHP_EOL;

        foreach ($this->departments as $department) {
            $output .= sprintf('    department_%d:', $department->getCode()).PHP_EOL;
            $output .= sprintf('        name: "%s"', $department->getName()).PHP_EOL;
            $output .= sprintf('        region_id: %d', $department->getRegionCode()).PHP_EOL;
            $output .= PHP_EOL;
        }

        return $output;
    }
}
