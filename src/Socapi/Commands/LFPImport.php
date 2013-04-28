<?php

namespace Socapi\Commands;

use Socapi\Storage\FileStorage;

use Socapi\Models\Import\LFPParser;

use Socapi\Models\Season;
use Socapi\Models\Import\Remote\LFPLoader;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class LFPImport extends Command
{
    protected function configure()
    {
        $this
            ->setName('import:lfp')
            ->setDescription('Import data from LFP website')
            ->addArgument(
                'day',
                InputArgument::OPTIONAL,
                'day to import (from current season)'
            );
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $day = $input->getArgument('day');
        
        if(is_numeric($day) === false || $day < 1 || $day > 38)
        {
            throw new \InvalidArgumentException("$day is not a valid day");
        }
        
        $loader = new LFPLoader(Season::current());
        $loader->setCacheDriver($storage = new FileStorage('cache/import/lfp'));
        //$storage->setOutputInterface($output);
        
        $parser = new LFPParser($loader);
        $result = $parser->parse($day);
        
        var_dump($result);
    }
}