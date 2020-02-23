<?php
namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DatabaseMigrateCommand extends Command
{
    protected $command = 'migrate';

    protected $description = 'Migrate the tables into database';

    public function configure()
    {
        $this->setName($this->command)
             ->setDescription($this->description);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        //\App\Migrations\testmigration::make();
       
        $output->writeln("<info>Tables migrated!</info>");
    }
}
