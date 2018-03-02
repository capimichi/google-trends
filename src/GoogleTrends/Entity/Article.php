<?php

namespace GoogleTrends\Entity;


class Article
{
    /**
     * @var string
     */
    protected $imageUrl;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $source;

    /**
     * @param $data
     * @return Article
     */
    public static function creatFromData($data)
    {
        $object = new Article();
        $object->setTitle($data['title'])
            ->setUrl($data['url'])
            ->setImageUrl($data['imageUrl'])
            ->setSource($data['source']);
        return $object;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     * @return Article
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Article
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return Article
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }


}