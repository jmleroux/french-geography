<?php

namespace JmLeroux\FrenchGeography\Command;

use JmLeroux\FrenchGeography\Formatter\France\FranceArrayFormatter;
use JmLeroux\FrenchGeography\Formatter\France\FranceJsonFormatter;
use JmLeroux\FrenchGeography\Parser\Insee\InseeFranceParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GenerateListCommand extends Command
{
    protected static $availableTypes = ['region', 'department', 'city'];
    protected static $availableFormats = ['yaml', 'sql'];
    protected static $availableSourceFormats = ['insee'];

    protected function configure()
    {
        $this
            ->setName('french-geography:generate')
            ->setDescription('Generate a list of regions, departments or cities based on specified parameters.')
            ->addArgument('format', InputArgument::REQUIRED, 'In which format do you want to format input file? [yaml]')
            ->addArgument('sourceFormat', InputArgument::REQUIRED, 'Where did you take the specified source? [insee]')
            ->addArgument('source', InputArgument::REQUIRED, 'Source file containing data to parse.')
            ->addArgument('output', InputArgument::REQUIRED, 'Where do you want to store the formatted output file?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->checkArguments($input->getArguments());
        } catch (\Exception $e) {
            $output->writeln(sprintf('<error>Error: %s</error>', $e->getMessage()));
            return;
        }

        $output->writeln(sprintf('Parsing <comment>%s</comment> file...', $input->getArgument('source')));

        $parser = new InseeFranceParser();
        $parsedItems = $parser->parse();

        $output->writeln(sprintf('Generating output file in <comment>%s</comment> format.', strtoupper($input->getArgument('format'))));

        $formatter = new FranceArrayFormatter($parsedItems);
        $formattedOutput = $formatter->format();

        file_put_contents($input->getArgument('output'), json_encode($formattedOutput, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $output->writeln(sprintf('File successfully generated in: <info>%s</info>.', $input->getArgument('output')));
    }

    protected function checkArguments($arguments)
    {
        if (!in_array($arguments['format'], self::$availableFormats)) {
            throw new \Exception(sprintf('Specified format is not handled: %s.', $arguments['format']));
        }

        if (!in_array($arguments['sourceFormat'], self::$availableSourceFormats)) {
            throw new \Exception(sprintf('Specified sourceFormat is not handled: %s.', $arguments['sourceFormat']));
        }
    }
}
