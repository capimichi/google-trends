<?php

namespace GoogleTrends;


class Endpoint
{

    const TRENDS_URL = "https://trends.google.it/trends/api/stories/latest?hl={locale}&cat={category}&tz=-60&fi=15&fs=15&geo={geo}&ri=300&rs=15&sort=0";

    const TREND_URL = "https://trends.google.it/trends/story/{id}";

    const TREND_JSON_URL = "https://trends.google.it/trends/api/stories/{it}?hl={locale}&tz=-60&sw=10";

    const COMPARE_TRENDS_URL = "https://trends.google.it/trends/explore?date={date}&q={query}";

    const EXPLORE_TRENDS_URL = "https://trends.google.it/trends/api/explore?hl={hl}&req={request}&tz={tz}";

    const MULTILINE_TRENDS_URL = "https://trends.google.it/trends/api/widgetdata/multiline?hl={hl}&tz={tz}&req={request}&token={token}";

    /**
     * @param $request
     * @param $token
     * @param string $language
     * @return mixed|string
     */
    public static function getMultilineTrendsUrl($request, $token, $language = "it")
    {
        $url = self::MULTILINE_TRENDS_URL;

        $url = str_replace("{hl}", $language, $url);

        $url = str_replace("{tz}", "-120", $url);

        $request = json_encode($request);

        $request = \GoogleTrends\Helper\GoogleHelper::urlencodeAsGoogle($request);

        $url = str_replace("{request}", $request, $url);

        $url = str_replace("{token}", $token, $url);

        return $url;
    }

    /**
     * @param array $terms
     * @param $typeCompareDate
     * @param string $language
     * @return mixed|string
     */
    public static function getExploreTrendsUrl($terms, $typeCompareDate, $language = "it")
    {

        $url = self::EXPLORE_TRENDS_URL;

        $url = str_replace("{hl}", $language, $url);

        $url = str_replace("{tz}", "-120", $url);

        $request = [
            "comparisonItem" => [],
            "category"       => 0,
            "property"       => "",
        ];

        foreach ($terms as $term) {

            $term = str_replace(" ", "+", $term);

            $request["comparisonItem"][] = [
                "keyword" => $term,
                "geo"     => "",
                "time"    => $typeCompareDate,
            ];
        }

        $request = json_encode($request);

        $request = \GoogleTrends\Helper\GoogleHelper::urlencodeAsGoogle($request);

        $url = str_replace("{request}", $request, $url);

        return $url;
    }

    /**
     * @param array $terms
     * @param $typeCompareDate
     * @return mixed|string
     */
    public static function getCompareTrendsUrl($terms, $typeCompareDate)
    {
        $query = implode(",", $terms);
        $query = str_replace(" ", "%20", $query);

        $url = self::COMPARE_TRENDS_URL;
        $url = str_replace("{date}", $typeCompareDate, $url);
        $url = str_replace("{query}", $query, $url);

        return $url;
    }

    /**
     * @param string $category
     * @param string $geo
     * @param string $locale
     * @return mixed|string
     */
    public static function getTrendsUrl($category = "all", $geo = "IT", $locale = "it")
    {
        $url = self::TRENDS_URL;

        $url = str_replace("{cat}", $category, $url);
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