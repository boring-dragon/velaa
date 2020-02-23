<?php
namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class MakeMigrationCommand extends Command
{
    protected $command = 'make:migration';

    protected $description = 'Generate a migration class';

    public function configure()
    {
        $this->setName($this->command)
             ->setDescription($this->description)
             ->addArgument('classname', InputArgument::REQUIRED, 'what is the class name of the model?');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $classname = $input->getArgument('classname');
        $migrationname = \Velaa\Core\StubGenerators\MigrationStubGenerator::generate($classname);
        system('composer dump-autoload');
        $output->writeln("<info>".$migrationname." Migration created!</info>");
    }
}
