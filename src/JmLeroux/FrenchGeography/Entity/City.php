<?php

namespace JmLeroux\FrenchGeography\Entity;

class City
{
    /** @var  string */
    protected $regionCode;
    /** @var  string */
    protected $departmentCode;
    /** @var  string */
    protected $name;
    /** @var  string */
    protected $prefix;

    public function getRegionCode()
    {
        return $this->regionCode;
    }

    public function setRegionCode($regionCode)
    {
        $this->regionCode = $regionCode;
    }

    public function getDepartmentCode()
    {
        return $this->departmentCode;
    }

    public function setDepartmentCode($departmentCode)
    {
        $this->departmentCode = $departmentCode;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrefix()
    {
        return $this->prefix;
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }
}
