<?php

namespace GoogleTrends\Entity;


class Trend
{

    /**
     * @param $data
     * @return Trend
     */
    public static function createFromData($data)
    {
        $articles = array_map(function ($articleData) {
            return Article::creatFromData($articleData);
        }, $data['widgets'][0]['articles']);

        $object = new Trend();
        $object->setTitle($data['title'])
            ->setArticles($articles);

        return $object;
    }

    /**
     * @var string
     */
    protected $title;

    /**
     * @var array
     */
    protected $articles;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Trend
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return array
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param array $articles
     * @return Trend
     */
    public function setArticles($articles)
    {
        $this->articles = $articles;
        return $this;
    }




}