<?php
/**
 * Return string as lowercase and no spaces
 */
function lowerNoSpaces($str) {
	$str = strtolower($str);
	$str = str_replace('-', '', $str);
	return $str;
}
/**
 * Return string as uppercase
 */
function upper($str) {
	$str = str_replace('-', ' ', $str);
	$str = ucwords($str);
	return $str;
}
/**
 * Return string as uppercase with no spaces
 */
function upperNoSpaces($str) {
	$str = str_replace('-', ' ', $str);
	$str = ucwords($str);
	$str = str_replace(' ', '', $str);
	return $str;
}

/**
 * Return whether current directory is a craft directory
 */
function isCraftDirectory() {
	if(is_dir('craft')) return true;
	return false;
}

/**
 * Return string as camelCase
 */
function camelCase($str, array $noStrip = []) {
        // non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        // uppercase the first character of each word
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);
        $str = lcfirst($str);

        return $str;
}

/**
 * Populate and return the settings template file
 * @return [type] [description]
 */
function generateSettingsTemplate() {
	$settingsTemplate = file_get_contents('../templates/settingsTemplate.txt');
	return $settingsTemplate;
}

/**
 * Populate and return the plugin content template file
 * @return [type] [description]
 */
function generatePluginContent($argv1) {
	$pluginTemplate = file_get_contents('../templates/pluginTemplate.txt');
	$pluginTemplate = str_replace('{$pluginNameUpperNoSpaces}', upperNoSpaces($argv1), $pluginTemplate);
	$pluginTemplate = str_replace('{$pluginNameUpper}', upper($argv1), $pluginTemplate);
	$pluginTemplate = str_replace('{$pluginNameLower}', lowerNoSpaces($argv1), $pluginTemplate);
	return $pluginTemplate;
}

/**
 * Populate and return the controller template file
 * @return [type] [description]
 */
function generateControllerContent($argv1) {
	$controllerTemplate = file_get_contents('../templates/controllerTemplate.txt');
	$controllerTemplate = str_replace('{$controllerClassName}', upperNoSpaces($argv1), $controllerTemplate);
	return $controllerTemplate;
}

/**
 * Populate and return the plguin index template file
 * @return [type] [description]
 */
function generateTemplateIndex($argv1) {
	$pluginIndex = file_get_contents('../templates/pluginIndex.txt');
	$pluginIndex = str_replace('{$pluginName}', upper($argv1), $pluginIndex);
	return  $pluginIndex;
}