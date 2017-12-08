<?php

namespace CraftPluginGenerator\Classes;

class FileSystemHelper {

    /**
     * Return whether current directory is a craft directory
     * @return bool
     */
    public static function isCraftDirectory() {
        return is_dir('craft') ? true: false;
    }

    /**
     * Return whether current directory is a craft directory
     * @param $pluginName
     * @return mixed
     */
    public static function pluginExists($pluginName) {
        return is_dir('craft/plugins/' . $pluginName) ? true : false;
    }

    /**
     * Creates the plugin file
     * @param $inputName
     */
    public static function createPluginFile($inputName)
    {
        $pluginName = StringHelper::camelCase($inputName);
        // Make the plugin directory
        mkdir('craft/plugins/' . $pluginName);

        // // Create plugin file
        $plugin = fopen('craft/plugins/'. $pluginName . '/' . StringHelper::upperNoSpaces($inputName) . 'Plugin.php' , 'w');
        fwrite($plugin, ContentHelper::generatePluginContent($inputName));
        fclose($plugin);
        return;
    }

    /**
     * Creates the settings directoy and files
     * @param $inputName
     */
    public static function createSettings($inputName)
    {
        $pluginName = StringHelper::camelCase($inputName);

        $settingsTemplate = fopen('craft/plugins/' . $pluginName . '/templates/settings.html', 'w');
        fwrite($settingsTemplate, ContentHelper::generateSettingsTemplate());
        fclose($settingsTemplate);

        $indexTemplate = fopen('craft/plugins/' . $pluginName . '/templates/index.html', 'w');
        fwrite($indexTemplate, ContentHelper::generateTemplateIndex($inputName));
        return;
    }

    /**
     * Creates assets directory and files
     * @param $inputName
     */
    public static function createAssets($inputName)
    {
        $pluginName = StringHelper::camelCase($inputName);

        mkdir('craft/plugins/' . $pluginName . '/resources');

        $pluginCSS = fopen('craft/plugins/' . $pluginName . '/resources/' . $pluginName . '.css', 'w');
        fclose($pluginCSS);

        $pluginJS = fopen('craft/plugins/' . $pluginName . '/resources/' . $pluginName . '.js', 'w');
        fclose($pluginJS);
        return;
    }

    /**
     * Creates the controller directory and files
     * @param $inputName
     */
    public static function createController($inputName)
    {
        $pluginName = StringHelper::camelCase($inputName);

        mkdir('craft/plugins/' . $pluginName . '/controllers');

        $controller = fopen('craft/plugins/' . $pluginName . '/controllers/' . StringHelper::upperNoSpaces($inputName) . 'Controller.php', 'w');
        fwrite($controller, ContentHelper::generateControllerContent($inputName));
        fclose($controller);
        return;
    }
}