<?php

namespace Socapi\Commands;

use Symfony\Component\Console\Output\OutputInterface;

trait Outputable
{
    private
        $output = null;
    
    public function setOutputInterface(OutputInterface $output)
    {
        $this->output = $output;
    }
    
    private function writeln($message)
    {
        if($this->output !== null)
        {
            $this->output->writeln($message);
        }
    }
}