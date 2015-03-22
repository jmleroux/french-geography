<?php

namespace JmLeroux\FrenchGeography\Parser;

abstract class Parser implements ParserInterface
{
    protected $sourcePath;

    /**
     * @param string $sourcePath
     * @throws \InvalidArgumentException
     */
    public function setSource($sourcePath)
    {
        if (!file_exists($sourcePath)) {
            throw new \InvalidArgumentException(sprintf('Source file seems to not exist: %s.', $sourcePath));
        }

        $this->sourcePath = $sourcePath;
    }

    /**
     * @throws \RuntimeException
     */
    public function parse()
    {
        if (!$this->sourcePath) {
            throw new \RuntimeException('Trying to parse with no file set.');
        }

        return $this->doParse();
    }

    abstract protected function doParse();
}
