<?php
/**
 * Created by PhpStorm.
 * User: lenonleite
 * Date: 27/04/17
 * Time: 00:15
 */

namespace Lenonleite\SimpleCrawler;

use Lenonleite\SimpleCrawler\Helper\Prepare;

class General {

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
	public function __construct( $html = '' ) {

		$this->prepare = new Prepare();
		$this->set_new_html( $html );
	}

	/**
	 * @param string $tag
	 * @param string $html
	 * @return mixed
	 */
	public function get_html_between_tag( $tag = 'body', $html = '' ) {

		$html = $this->check_html( $html );
		preg_match_all( "/(?s)<" . $tag . "[^>]*>(.*?)<\/" . $tag . ">/", $html, $matches );

		return $matches[0];
	}

	/**
	 * @param string $tag
	 * @param string $html
	 * @return mixed
	 */
	public function get_data_tags( $tag = '', $html = '' ) {

		$html                     = $this->check_html( $html );
		$tags                     = $this->get_tags( $tag, $html );
		$result['tags']           = $tags;
		$result['html']           = $html;
		$result['tags_atributes'] = $this->get_atributes_array_tags( $tags );

		return $result;
	}

	/**
	 * @param string $tag
	 * @param string $html
	 * @return mixed
	 */
	public function get_tags( $tag = '', $html = '' ) {

		preg_match_all( "/<" . $tag . "(.*)(\/|)>/", $html, $matches );

		return $matches[0];
	}

	/**
	 * @param $tag
	 * @return array
	 */
	public function get_atributes_array_tags( $tags ) {

		$tag_atributes = [];
		foreach ( $tags as $key => $tag ) {
			$tag_atributes[] = $this->get_atribute_tag( $tag );
		}

		return $tag_atributes;
	}

	/**
	 * @param $tag
	 * @return mixed
	 */
	public function get_atribute_tag( $tag ) {

		preg_match_all( "/\s(.*?)=[\"'](.*?)[\"']/", $tag, $matches );
		$matches_filter['full']  = $matches[0];
		$matches_filter['key']   = $matches[1];
		$matches_filter['value'] = $matches[2];

		return $matches_filter;
	}

	/**
	 * @param string $html
	 * @return Html|string
	 */
	private function check_html( $html = '' ) {

		if ( empty( $html ) ) {
			return $this->html;
		}

		return $html;
	}

	/**
	 * @param string $html
	 */
	public function set_new_html( $html = '' ) {

		$this->html = $html;
	}

}