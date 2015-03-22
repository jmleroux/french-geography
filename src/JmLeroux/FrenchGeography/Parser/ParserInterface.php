<?php

namespace JmLeroux\FrenchGeography\Parser;

interface ParserInterface
{
    /** @param string $sourcePath */
    public function setSource($sourcePath);
    public function parse();
}
