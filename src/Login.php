<?php

/**
 * Created by PhpStorm.
 * User: lenonleite
 * Date: 26/04/17
 * Time: 01:51
 */

namespace Lenonleite\SimpleCrawler;


class Login extends General {

	/**
	 * @var array
	 */
	private $form = [];

	public function __construct() {

		$this->form = $this->set_form();
	}

	/**
	 * @param array $new_data
	 * @return array
	 */
	private function set_form( $new_data = [] ) {

		$default_data = [
			'method'   => 'post',
			'action'   => '/',
			'fields'   => [],
			'atribute' => []
		];

		return array_merge( $default_data, $new_data );
	}

	/**
	 * @param string $html
	 * @return mixed
	 */
	public function get_forms( $html = '' ) {

		$this->set_new_html( $html );
		$html_between_forms = $this->get_html_between_tag( '', 'form' );
//		var_dump( $html_between_forms );
		$forms = [];
		foreach ( $html_between_forms as $key_form => $html_form ) {
			$forms[ $key_form ]['html']   = $html_form;
			$forms[ $key_form ]['fields'] = $this->get_data_tags( 'input' );
			$forms[ $key_form ]['form']   = $this->get_data_tags( 'form' );
		}

		return $forms;
	}

	/**
	 * @param array $data
	 */
	public function mount_form( $data = [] ) {

	}
}