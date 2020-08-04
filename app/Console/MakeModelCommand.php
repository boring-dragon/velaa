<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeModelCommand extends Command
{
    protected $command = 'make:model';

    protected $description = 'Generate a models class';

    public function configure()
    {
        $this->setName($this->command)
             ->setDescription($this->description)
             ->addArgument('classname', InputArgument::REQUIRED, 'what is the class name of the model?');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $classname = $input->getArgument('classname');
        \Velaa\Core\StubGenerators\ModelStubGenerator::generate($classname);
        system('composer dump-autoload');
        $output->writeln('<info>'.$classname.' Model has been generated!</info>');
    }
}
