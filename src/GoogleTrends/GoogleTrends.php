<?php

namespace GoogleTrends;


use GoogleTrends\Entity\Trend;

class GoogleTrends
{

    /**
     * @param string $category
     * @param string $geo
     * @param string $locale
     * @return array
     */
    public static function getLatestTrendIds($category = "all", $geo = "IT", $locale = "it")
    {
        $url = Endpoint::getTrendsUrl($category, $geo, $locale);
        $content = file_get_contents($url);
        $content = str_replace(")]}'", "", $content);
        $json = json_decode($content, true);
        if (isset($json['trendingStoryIds'])) {
            return $json['trendingStoryIds'];
        } else {
            return [];
        }
    }

    /**
     * @param $id
     * @param string $locale
     * @return Trend
     */
    public static function getTrend($id, $locale = "it")
    {
        $url = Endpoint::getTrendJsonUrl($id, $locale);
        $content = file_get_contents($url);
        $content = str_replace(")]}'", "", $content);
        $json = json_decode($content, true);
        return Trend::createFromData($json);
    }

    /**
     * @param $terms
     * @param $typeCompareDate
     * @param string $language
     * @return array|bool|mixed|string
     */
    public static function getExploreData($terms, $typeCompareDate, $language = "it")
    {
        $url = Endpoint::getExploreTrendsUrl($terms, $typeCompareDate, $language);

        $content = file_get_contents($url);

        $content = \GoogleTrends\Helper\GoogleHelper::parseGoogleResponse($content);

        return $content;
    }

    /**
     * @param $request
     * @param $token
     * @param string $language
     * @return array|bool|null|string
     */
    public static function getMultilineData($request, $token, $language = "it")
    {
        $url = Endpoint::getMultilineTrendsUrl($request, $token, $language);

        $content = file_get_contents($url);

        $content = \GoogleTrends\Helper\GoogleHelper::parseGoogleResponse($content);

        return $content;

    }
}