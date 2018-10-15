<?php

namespace Lenonleite\SimpleCrawler\Php;

/**
 * Created by PhpStorm.
 * User: lenonleite
 * Date: 04/10/17
 * Time: 01:38
 */
class Methods {
	
	/**
	 * @param $html
	 * @return array
	 */
	public function get_parameters( $html ) {

		preg_match_all( "/(private|public|protected|)[^>](static[^>]|)(function)(.*?)\((.*?)\)[^>]{(?s)(.*?)}/i", $html, $ms );

		$nexternal_result = array();

		foreach ( $ms[0] as $key_all_context => $m_all_context ) {

			$external_result[ $key_all_context ]['type_methdd']      = $ms[1][ $key_all_context ];
			$external_result[ $key_all_context ]['static']           = $ms[2][ $key_all_context ];
			$external_result[ $key_all_context ]['name_method']      = $ms[4][ $key_all_context ];
			$external_result[ $key_all_context ]['atributes']        = explode( ',', $ms[5][ $key_all_context ] );
			$external_result[ $key_all_context ]['internal_context'] = $ms[6][ $key_all_context ];
			$external_result[ $key_all_context ]['all_context']      = $ms[0][ $key_all_context ];

		}

		return $nexternal_result;
	}
}