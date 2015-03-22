<?php

namespace JmLeroux\FrenchGeography\Formatter\Department;

use JmLeroux\FrenchGeography\Entity\Department;

class DepartmentFormatter
{
    /** @var Department[]  */
    protected $departments;

    public function __construct(array $departments)
    {
        $this->departments = $departments;
    }
}
