<?php

namespace JmLeroux\FrenchGeography\Entity;

class Region
{
    /** @var  string */
    protected $codeInsee;
    /** @var  string */
    protected $name;
    /** @var  Department[] */
    protected $departements;

    public function getCodeInsee()
    {
        return $this->codeInsee;
    }

    /**
     * @param string $codeInsee
     */
    public function setCodeInsee($codeInsee)
    {
        $this->codeInsee = $codeInsee;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = trim($name);
    }

    /**
     * @return Department[]
     */
    public function getDepartements()
    {
        return $this->departements;
    }

    /**
     * @param Department[] $departements
     */
    public function setDepartements($departements)
    {
        $this->departements = $departements;
    }

    /**
     * @param Department $departement
     */
    public function addDepartement($departement)
    {
        $this->departements[$departement->getCode()] = $departement;
    }
}
