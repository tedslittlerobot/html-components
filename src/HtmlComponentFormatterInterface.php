<?php namespace Tlr\Components;

interface HtmlComponentFormatterInterface {

	/**
	 * Open an HTML form
	 * @param  string  $target
	 * @param  string  $method
	 * @param  boolean $files
	 * @param  array   $attributes
	 * @param  array   $options
	 * @return string
	 */
	public function openForm( $target = '', $method = 'post', $data = false, $attributes = array(), $options = array() );

	/**
	 * Close an HTML form
	 * @return string
	 */
	public function closeForm();
	public function textInput( $name = null, $value = null, $attributes = array(), $options = array() );


	public function textarea( $name = null, $value = null, $attributes = array(), $options = array() );


	public function input( $type = 'text', $name = null, $content = null, $attributes = array(), $options = array() );
	public function select( $name = null, $items = array(), $attributes = array(), $options = array() );
	public function select2( $name = null, $items = array(), $attributes = array(), $options = array() );
	public function checkbox( $name = null, $label = null, $attributes = array(), $options = array() );
	public function radio( $name = null, $attributes = array(), $options = array() );
	public function button( $content = '', $attributes = array(), $options = array() );
	public function submit( $content = '', $attributes = array(), $options = array() );
	public function link( $content, $href, $attributes = array(), $options = array() );

	/**
	 * Build a navbar
	 * @param  mixed $items can be an instance of MenuItem or an array of menu items
	 * @return string
	 */
	// public function navbar( $items, $attributes = array(), $options = array() );
	// public function tabs();
	// public function well();

}
