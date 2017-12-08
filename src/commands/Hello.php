<?php

namespace Johnmackenzie91\CraftPluginGenerator\Commands;



class Hello extends Command
{


    protected function configure()
    {

    }

    public function __construct(){
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
         return $output->writeln('Hello... that is all...');

    }

}