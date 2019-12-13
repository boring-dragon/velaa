<?php
namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ServeCommand extends Command{


    protected $command = 'serve';

    protected $description = 'Run the development server';

    public function configure()
    {
        $this->setName($this->command)
             ->setDescription($this->description);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        
        $output->writeln("<info>Your Velaa app is running on localhost:8080..</info>");
        system('php -S localhost:8080');
    }

}    