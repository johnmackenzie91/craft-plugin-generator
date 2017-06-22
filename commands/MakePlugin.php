<?php

// src/AppBundle/Command/CreateUserCommand.php
namespace craftPluginGenerator\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use CraftPluginGenerator\Classes\StringHelper;
use CraftPluginGenerator\Classes\FileSystemHelper;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class MakePlugin extends Command
{
    private $questionHelper;
    private $pluginName;

    protected function configure()
    {
    $this->setName('new')
    	 ->setDescription('Creates new Plugin')
    	 ->setHelp('add help text')
    	 ->addArgument('name', InputArgument::REQUIRED, 'The username of the plugin.');
    }

    public function __construct(){
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->questionHelper = $this->getHelper('question');
		$this->pluginName = StringHelper::lowerNoSpaces($input->getArgument('name'));

        /**
         * Am I in the craft website root?
         */
		if (!FileSystemHelper::isCraftDirectory())
		{
			return $output->writeln('<error>Unable to find the "craft/plugins" directory. Please navigate to site route</error>');
		}

		if (FileSystemHelper::pluginExists($this->pluginName))
		{
            return $output->writeln('<error>A plugin with that name already exists, please choose another one</error>');
        }

        /**
         * Create plugin main file
         */
        FileSystemHelper::createPluginFile($input->getArgument('name'));

        /**
         * Create the controller directory
         */
        if ($this->questionHelper->ask($input, $output, new ConfirmationQuestion('Would you like to create a controller?', false)))
        {
            FileSystemHelper::createController($input->getArgument('name'));
        }

        /**
         * Create the events directory
         */
        if ($this->questionHelper->ask($input, $output, new ConfirmationQuestion('Would you like to generate events?', false)))
        {
            mkdir('craft/plugins/' . $this->pluginName . '/events');
        }

        /**
         * Create the models directory
         */
        if ($this->questionHelper->ask($input, $output, new ConfirmationQuestion('Would you liek to generate models?', false)))
        {
            mkdir('craft/plugins/' . $this->pluginName . '/models');
        }

        /**
         * Create the services directory
         */
        if ($this->questionHelper->ask($input, $output, new ConfirmationQuestion('Would you liek to generate services?', false)))
        {
            mkdir('craft/plugins/' . $this->pluginName . '/services');
        }

        /**
         * Create the templates directory
         */
        if ($this->questionHelper->ask($input, $output, new ConfirmationQuestion('Would you liek to generate templates?', false)))
        {
            mkdir('craft/plugins/' . $this->pluginName . '/templates');

        }

        /**
         * Create the resources directory
         */
        if ($this->questionHelper->ask($input, $output, new ConfirmationQuestion('Would you liek to generate resources?', false)))
        {
            FileSystemHelper::createAssets($input->getArgument('name'));
        }

        /**
         * Create the active records directory
         */
        if ($this->questionHelper->ask($input, $output, new ConfirmationQuestion('Would you like to create an Active Record?', false)))
        {
            // //create active record
            mkdir('craft/plugins/' . $this->pluginName . '/records');
            // TODO add prompt to generate however many records you want
        }

        /**
         * Create the settings directory
         */
        if ($this->questionHelper->ask($input, $output, new ConfirmationQuestion('Would you like to create a settings page?', false)))
        {
            FileSystemHelper::createSettings($input->getArgument('name'));
        }

         return $output->writeln('Plugin successfully created :)');

    }

}