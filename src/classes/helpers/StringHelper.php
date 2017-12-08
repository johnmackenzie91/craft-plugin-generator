<?php

namespace Johnmackenzie91\CraftPluginGenerator\Classes\Helpers;

class StringHelper {

    /**
     * Return string as lowercase and no spaces
     * @param $str
     * @return mixed
     */
	public static function lowerNoSpaces($str) {
		$str = strtolower($str);
		$str = str_replace('-', '', $str);
        $str = str_replace(' ', '', $str);
		return $str;
	}

    /**
     * Return string as uppercase
     * @param $str
     * @return mixed
     */
	public static function upper($str) {
		$str = str_replace('-', ' ', $str);
        $str = strtolower($str);
		$str = ucwords($str);
		return $str;
	}

    /**
     * Return string as uppercase with no spaces
     * @param $str
     * @return mixed
     */
	public static function upperNoSpaces($str) {
		$str = str_replace('-', ' ', $str);
        $str = strtolower($str);
		$str = ucwords($str);
		$str = str_replace(' ', '', $str);
		return $str;
	}

    /**
     * Return string as camelCase
     * @param $str
     * @param array $noStrip
     * @return mixed
     */
	public static function camelCase($str, array $noStrip = []) {
	        // non-alpha and non-numeric characters become spaces
	        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
	        $str = trim($str);
            $str = strtolower($str);
	        // uppercase the first character of each word
	        $str = ucwords($str);
	        $str = str_replace(" ", "", $str);
	        $str = lcfirst($str);

	        return $str;
	}

    /**
     * Replace array of strings
     * @param $replaceList
     * @param $string
     * @return mixed
     */
	public static function stringReplaceArray($replaceList, $string)
    {
        foreach($replaceList as $key => $value)
        {
            $string = str_replace($key, $value, $string);
        }
        return $string;
    }

}