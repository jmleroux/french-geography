<?php

namespace JPetitcolas\FrenchGeography\Entity;

class Department
{
    protected $regionCode;
    /** @var  string */
    protected $code;
    /** @var  string */
    protected $chiefTown;
    /** @var  string */
    protected $name;

    public function getRegionCode()
    {
        return $this->regionCode;
    }

    public function setRegionCode($regionCode)
    {
        $this->regionCode = $regionCode;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getChiefTown()
    {
        return $this->chiefTown;
    }

    public function setChiefTown($chiefTown)
    {
        $this->chiefTown = $chiefTown;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
