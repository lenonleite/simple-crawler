<?php

/**
 * Created by PhpStorm.
 * User: lenonleite
 * Date: 27/04/17
 * Time: 01:50
 */

namespace Lenonleite\SimpleCrawler\Helper;

class Prepare {

	/**
	 * @param array $data
	 * @return array
	 */
	public function prepare_tag_values( $array_data = [] ) {

		var_dump( $array_data );
		$result = [];
		foreach ( $array_data as $key_data => $data ) {
			$result[ $key_data ]['key_value'] = $this->organize_tag_by_key_value( $data );
		}


		return $result;
	}

	/**
	 * @param $data
	 * @return array
	 */
	private function organize_tag_by_key_value( $data ) {

		return array_combine( $data[1], $data[3] );
	}

}