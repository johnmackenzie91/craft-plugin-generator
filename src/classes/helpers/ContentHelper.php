<?php
namespace Johnmackenzie91\CraftPluginGenerator\Classes\Helpers;

class ContentHelper {

    /**
     * Populate and return the settings template file
     * @return [type] [description]
     */
    public static function generateSettingsTemplate()
    {
        $settingsTemplate = file_get_contents(__DIR__ . '/../templates/settingsTemplate.txt');
        return $settingsTemplate;
    }

    /**
     * Populate and return the plugin content template file
     * @return [type] [description]
     */
    public static function generatePluginContent($inputName)
    {
        $pluginTemplate = file_get_contents(__DIR__ . '/../templates/pluginTemplate.txt');

        return StringHelper::stringReplaceArray(
            ['{$pluginNameUpperNoSpaces}' => StringHelper::upperNoSpaces($inputName),
             '{$pluginNameUpper}', StringHelper::upper($inputName),
             '{$pluginNameLower}', StringHelper::lowerNoSpaces($inputName)],
            $pluginTemplate
            );
    }

    /**
     * Populate and return the controller template file
     * @return [type] [description]
     */
    public static function generateControllerContent($inputName)
    {
        $controllerTemplate = file_get_contents(__DIR__ . '/../templates/controllerTemplate.txt');
        $controllerTemplate = str_replace('{$controllerClassName}', StringHelper::upperNoSpaces($inputName), $controllerTemplate);
        return $controllerTemplate;
    }

    /**
     * Populate and return the plguin index template file
     * @return [type] [description]
     */
    public static function generateTemplateIndex($inputName)
    {
        $pluginIndex = file_get_contents(__DIR__ . '/../templates/pluginIndex.txt');
        $pluginIndex = str_replace('{$pluginName}', StringHelper::upper($inputName), $pluginIndex);
        return  $pluginIndex;
    }
}