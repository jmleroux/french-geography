<?php

namespace JPetitcolas\FrenchGeography\Parser;

abstract class Parser implements ParserInterface
{
    protected $sourcePath;

    public function setSource($sourcePath)
    {
        if (!file_exists($sourcePath)) {
            throw new \Exception(sprintf('Source file seems to not exist: %s.', $sourcePath));
        }

        $this->sourcePath = $sourcePath;
    }

    public function parse()
    {
    }
}
