<?php
namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class LoadClassCommand extends Command{

    protected $name = 'load:class';

    protected $description = 'Dump the classes again';

    public function configure()
    {
        $this->setName($this->name)
             ->setDescription($this->description);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        
        system('composer dumpautoload');
    }

}    