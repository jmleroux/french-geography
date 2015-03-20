<?php

namespace JPetitcolas\FrenchGeography\Parser;

interface ParserInterface
{
    public function setSource($sourcePath);
    public function parse();
}
