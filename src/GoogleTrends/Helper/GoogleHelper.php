<?php
/**
 * Created by PhpStorm.
 * User: michelecapicchioni
 * Date: 21/04/18
 * Time: 21:38
 */

namespace GoogleTrends\Helper;


class GoogleHelper
{

    /**
     * @param $string
     * @return mixed|string
     */
    public static function urlencodeAsGoogle($string)
    {
        $string = urlencode($string);
        $string = str_replace("%3A", ":", $string);
        $string = str_replace("%2B", "+", $string);
        $string = str_replace("%2C", ",", $string);
        $string = str_replace("%5B%5D", "%7B%7D", $string);
        return $string;
    }

    /**
     * @param $content
     * @return array|null
     */
    public static function parseGoogleResponse($content)
    {
        $content = explode("\n", $content);
        $content = array_reverse($content);
        array_pop($content);
        $content = array_reverse($content);
        $content = implode("\n", $content);
        $content = json_decode($content, true);
        return $content;
    }
}