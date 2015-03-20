<?php

namespace JPetitcolas\FrenchGeography\Entity;

class Region
{
    /** @var  string */
    protected $codeInsee;
    /** @var  string */
    protected $name;

    public function getCodeInsee()
    {
        return $this->codeInsee;
    }

    public function setCodeInsee($codeInsee)
    {
        $this->codeInsee = $codeInsee;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = trim($name);
    }
}
