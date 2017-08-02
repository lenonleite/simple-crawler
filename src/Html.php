<?php
/**
 * Created by PhpStorm.
 * User: lenonleite
 * Date: 25/04/17
 * Time: 18:03
 */
namespace Lenonleite\SimpleCrawler;

class Html {

	public function get_urls( $html ) {

		preg_match_all( '#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $html, $match );

		return $match[0];

	}

}