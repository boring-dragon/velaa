<?php
namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class EggCommand extends Command
{
    protected $command = 'egg';

    protected $description = 'Output a inspiring quote';

    public function configure()
    {
        $this->setName($this->command)
             ->setDescription($this->description);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $rawquotes = file_get_contents("https://type.fit/api/quotes");
        $quote = json_decode($rawquotes, true);

        $output->writeln("<info>"."\"".$quote[rand(0, 1600)]["text"]."\""."</info>");
    }
}
