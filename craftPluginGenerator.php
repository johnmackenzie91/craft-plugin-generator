<?php

include_once 'templates/helper_functions.php';


if (count($argv) > 1) {

	$pluginName = lowerNoSpaces($argv[1]);

	if(!isCraftDirectory()){
		echo 'Unable to find "craft/plugins". Please caft site.';exit;
	}

	//Does the directory already exist
	if (!is_dir('craft/plugins/' . $pluginName)) {

		// Make the plguin directory
		mkdir('craft/plugins/' . $pluginName);

		// Create plugin file
		$plugin = fopen('craft/plugins/'. $pluginName . '/' . upperNoSpaces($argv[1]) . 'Plugin.php' , 'w');
		fwrite($plugin, generatePluginContent($argv[1]));
		fclose($plugin);


		mkdir('craft/plugins/' . $pluginName . '/controllers');
	 	$controller = fopen('craft/plugins/' . $pluginName . '/controllers/' . upperNoSpaces($argv[1]) . 'Controller.php', 'w');
	 	fwrite($controller, generateControllerContent($argv[1]));
	 	fclose($controller);

		mkdir('craft/plugins/' . $pluginName . '/events');
		mkdir('craft/plugins/' . $pluginName . '/models');
		mkdir('craft/plugins/' . $pluginName . '/services');
		mkdir('craft/plugins/' . $pluginName . '/templates');
		mkdir('craft/plugins/' . $pluginName . '/resources');

		$pluginCSS = fopen('craft/plugins/' . $pluginName . '/resources/' . $pluginName . '.css', 'w');
		fclose($pluginCSS);

		$pluginJS = fopen('craft/plugins/' . $pluginName . '/resources/' . $pluginName . '.js', 'w');
		fclose($pluginJS);

		//create active record
		mkdir('craft/plugins/' . $pluginName . '/records');
		// TODO add prompt to generate however many records you want
		
		$settingsTemplate = fopen('craft/plugins/' . $pluginName . '/templates/settings.html', 'w');
		fwrite($settingsTemplate, generateSettingsTemplate());

		$indexTemplate = fopen('craft/plugins/' . $pluginName . '/templates/index.html', 'w');
		fwrite($indexTemplate, generateTemplateIndex($argv[1]));

		echo 'Plugin successfully created :)' . PHP_EOL;

	}else{
		echo 'A plugin with that name already exists.' . PHP_EOL;
	}
	//make controllers,
	//	make name Controller.php
	//	 library, models, services, templates namePlugin.php

}else {
	echo 'Please input a name for the plugin.' . PHP_EOL;
}
