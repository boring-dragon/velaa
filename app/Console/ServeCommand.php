<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ServeCommand extends Command
{
    protected $command = 'serve';

    protected $description = 'Run the development server';

    public function configure()
    {
        $this->setName($this->command)
             ->setDescription($this->description)
             ->addArgument('port', InputArgument::OPTIONAL, 'What port you want to run the app?');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $port = $input->getArgument('port');
        if (!isset($port)) {
            $port = 8080;
        }
        $output->writeln('<info>Your Velaa app is running on localhost:'.$port.'</info>');
        system('php -S localhost:'.$port);
    }
}
