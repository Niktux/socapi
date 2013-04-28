<?php

namespace Socapi\Commands;

use Socapi\Models\Import\LFPPlayerParser;

use Socapi\Storage\FileStorage;

use Socapi\Models\Import\LFPParser;

use Socapi\Models\Season;
use Socapi\Models\Import\Remote\LFPLoader;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class LFPImportPlayers extends Command
{
    protected function configure()
    {
        $this
            ->setName('import:lfp:players')
            ->setDescription('Import players from LFP website')
            ->addOption(
                'team',
                null,
                InputArgument::REQUIRED,
                'team to import'
            )
            ->addOption(
                'force',
                null,
                InputOption::VALUE_NONE,
                'bypass cache and force download from LFP website'
            );
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $loader = new LFPLoader(Season::current());
        
        if($input->getOption('force') !== true)
        {
            $loader->setCacheDriver($storage = new FileStorage('cache/import/lfp'));
            $storage->setOutputInterface($output);
        }
        
        $teams = $this->getTeams();
        if($input->getOption('team'))
        {
            $teams = array($input->getOption('team'));
        }
        
        $parser = new LFPPlayerParser($loader);
        foreach($teams as $team)
        {
            $output->writeln("<info>Import $team</info>");
            $result = $parser->parse($team);
            var_dump($result);
        }
    }
    
    private function getTeams()
    {
        return array(
            'ac-ajaccio',
            'sc-bastia',
            'girondins-de-bordeaux',
            'stade-brestois-29',
            'evian-tg-fc',
            'losc-lille',
            'fc-lorient',
            'olympique-lyonnais',
            'olympique-de-marseille',
            'montpellier-herault-sc',
            'as-nancy-lorraine',
            'ogc-nice',
            'paris-saint-germain',
            'stade-de-reims',
            'stade-rennais-fc',
            'as-saint-etienne',
            'fc-sochaux-montbeliard',
            'toulouse-fc',
            'estac-troyes',
            'valenciennes-fc',
        );
    }
}