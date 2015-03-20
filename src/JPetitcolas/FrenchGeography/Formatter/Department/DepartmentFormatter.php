<?php

namespace JPetitcolas\FrenchGeography\Formatter\Department;

use JPetitcolas\FrenchGeography\Entity\Department;

class DepartmentFormatter
{
    /** @var Department[]  */
    protected $departments;

    public function __construct(array $departments)
    {
        $this->departments = $departments;
    }
}
