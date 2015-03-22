<?php

namespace JmLeroux\FrenchGeography\Command;

use JmLeroux\FrenchGeography\Formatter\FormatterInterface;
use JmLeroux\FrenchGeography\Parser\ParserInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DownloadSourcesCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('jml-regions:download')
            ->setDescription('Download data files from INSEE.')
            ->addArgument('type', InputArgument::REQUIRED, 'Data to download [regions, departments]')
            ->addArgument('year', InputArgument::OPTIONAL, 'Year', 2014);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->checkArguments($input->getArguments());
        } catch (\Exception $e) {
            $output->writeln(sprintf('<error>Error: %s</error>', $e->getMessage()));

            return;
        }

        $url = sprintf('http://www.insee.fr/fr/methodes/nomenclatures/cog/telechargement/%d/txt/%s%d.txt',
            $input->getArgument('year'),
            $input->getArgument('type'),
            $input->getArgument('year')
        );

        $uploadFile = 'data/upload/' . $input->getArgument('type') . '.txt';

        $output->writeln(sprintf('Parsing <comment>%s</comment> file...', $url));

        file_put_contents($uploadFile, utf8_encode(file_get_contents($url)));
    }

    protected function checkArguments($arguments)
    {
//        if (!in_array($arguments['type'], self::$availableTypes)) {
//            throw new \Exception(sprintf('Specified type is not handled: %s.', $arguments['type']));
//        }
    }
}
