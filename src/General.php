<?php
/**
 * Created by PhpStorm.
 * User: lenonleite
 * Date: 27/04/17
 * Time: 00:15
 */

namespace Lenonleite\SimpleCrawler;

use Lenonleite\SimpleCrawler\Helper\Prepare;

class General
{
    /**
     * @var Prepare
     */
    private $prepare;

    /**
     * @var Html
     */
    private $html;

    /**
     * General constructor.
     */
    public function __construct($html = '')
    {

        $this->prepare = new Prepare();
        $this->setHtml($html);
    }

    /**
     * @param string $html
     */
    public function setHtml($html = '')
    {
        $this->html = $html;
    }

    /**
     * @param string $tag
     * @param string $html
     * @return mixed
     */
    public function get_html_between_tag($html = '', $tag = 'body')
    {

        $html = $this->check_html($html);
        preg_match_all("/(?s)<".$tag."[^>]*>(.*?)<\/".$tag.">/", $html, $matches);

        return $matches[0];
    }

    /**
     * @param string $html
     * @return Html|string
     */
    private function check_html($html = '')
    {

        if (empty($html)) {
            return $this->html;
        }

        return $html;
    }

    /**
     * @param string $html
     * @param string $tag
     * @param string $id
     * @return mixed
     */
    public function get_html_between_tag_attr_id_or_class($html = '', $tag = 'body', $value = '')
    {

        $html = $this->check_html($html);
        preg_match_all("/(?s)<".$tag."[^>]*(class|id)=\"[^>]*".$value."[^>]*\"[^>]*>(.*?)<\/".$tag.">/", $html, $matches);

        return $matches[0];
    }

    /**
     * @param string $html
     * @param string $tag
     * @param string $id
     * @return mixed
     */
    public function get_html_between_tag_attr_and_value($html = '', $tag = 'body', $attribute = '', $value = '')
    {

        $html = $this->check_html($html);
        preg_match_all("/(?s)<".$tag."[^>]*".$attribute."=(\"|')[^>]*".$value."[^>]*(\"|' )[^>]*>(.*?)<\/".$tag.">/", $html, $matches);

        return $matches[0];
    }

    /**
     * @param string $tag
     * @param string $html
     * @return mixed
     */
    public function get_data_tags($tag = '', $html = '')
    {

        $html = $this->check_html($html);
        $tags = $this->get_tags($tag, $html);
        $result['tags'] = $tags;
        $result['tags_atributes'] = $this->get_attributes_array_tags($tags);

        return $result;
    }

    /**
     * @param string $tag
     * @param string $html
     * @return mixed
     */
    public function get_tags($tag = '', $html = '')
    {

        preg_match_all("/<".$tag."(.*)(\/|)>/", $html, $matches);

        return $matches[0];
    }

    /**
     * @param $tags
     * @return array
     */
    public function get_attributes_array_tags($tags)
    {

        $tag_atributes = [];

        foreach ($tags as $key => $tag) {

            $tag_atributes[] = $this->get_attribute_tag($tag);
        }

        return $tag_atributes;
    }

    /**
     * @param $tag
     * @return mixed
     *     * To do Readme
     */
    public function get_attribute_tag($tag)
    {

        preg_match_all("/<(.*?) ((.*?)=[\"'](.*?)[\"'](.*?))>/", $tag, $matches);
        $matches_filter['full'] = $matches[0][0];
        $matches_filter['key'] = $matches[1][0];
        $matches_filter['value'] = $matches[2][0];

        return $matches_filter;
    }

    /**
     * @param $html
     * @return mixed
     * To do Readme
     */
    public function get_all_tags_atributes_in_html($html)
    {

        preg_match_all("/\s<(.*?) ((.*?)=[\"'](.*?)[\"'])>/", $html, $matches);
        $matches_filter['full'] = $matches[0];
        $matches_filter['key'] = $matches[1];
        $matches_filter['value'] = $matches[2];

        return $matches_filter;
    }

    /**
     * @param string $className
     */
    public function getByClass($className = '')
    {
        if (empty($className)) {
            return;
        }

        preg_match_all("/(?s)<(.*?)\s[^>]*class=(\"|')[^>]*".$className."[^>]*(\"|')[^>]*>(.*?)<\/\\1>/", $this->html, $matches);

        if (empty($matches)) {
            return;
        }
        //var_dump($matches);

        // content is where stay main block. Count by ( )
        return $this->out($matches, 4);
    }

    /**
     * @param $matches
     * @return mixed
     */
    private function out($matches, $content = '')
    {
        $result['html'] = $matches[0];
        $result['totalMatches'] = count($matches);
        $result['matches'] = $matches;
        if ($content !== '') {
            $result['content'] = $result['matches'][$content];
        }

        return $result;
    }
}