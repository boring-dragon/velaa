<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class LogClearCommand extends Command
{
    protected $command = 'log:clear';

    protected $description = 'Clear access logs';

    public function configure()
    {
        $this->setName($this->command)
             ->setDescription($this->description)
             ->setDefinition(
                 new InputDefinition([new InputOption('query')])
             );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$option = $input->getOption('query')) {
            file_put_contents('stash'.DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'access.log', '');
            $output->writeln('<info>Access log cleared! </info>');
            exit;
        }

        file_put_contents('stash'.DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'query.log', '');
        $output->writeln('<info>Query log cleared! </info>');
    }
}
