<?php

namespace GoogleTrends;


class Endpoint
{

    const TRENDS_URL = "https://trends.google.it/trends/api/stories/latest?hl={locale}&tz=-60&fi=15&fs=15&geo={geo}&ri=300&rs=15&sort=0";

    const TREND_URL = "https://trends.google.it/trends/story/{id}";

    const TREND_JSON_URL = "https://trends.google.it/trends/api/stories/{it}?hl={locale}&tz=-60&sw=10";


    /**
     * @param string $category
     * @param string $geo
     * @param string $locale
     * @return mixed|string
     */
    public static function getTrendsUrl($category = null, $geo = "IT", $locale = "it")
    {
        $url = self::TRENDS_URL;
        if ($category) {
            $url .= "&cat=" . $category;
        }
        $url = str_replace("{geo}", $geo, $url);
        $url = str_replace("{locale}", $locale, $url);
        return $url;
    }

    /**
     * @param $id
     * @return mixed|string
     */
    public static function getTrendUrl($id)
    {
        $url = self::TREND_URL;
        $url = str_replace("{id}", $id, $url);
        return $url;
    }

    /**
     * @param $id
     * @param $locale
     * @return mixed|string
     */
    public static function getTrendJsonUrl($id, $locale = "it")
    {
        $url = self::TREND_JSON_URL;
        $url = str_replace("{id}", $id, $url);
        $url = str_replace("{locale}", $locale, $url);
        return $url;
    }

}