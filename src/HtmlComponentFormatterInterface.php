<?php namespace Tlr\Components;

interface HtmlComponentFormatterInterface {

	/**
	 * Set the class
	 * @param  array|string $class
	 * @return $this
	 */
	public function class( $class );
	/**
	 * Set an attribute
	 * @param string       $attribute
	 * @param string|array $value
	 * @return $this
	 */
	public function attribute( $attribute, $value );
	/**
	 * Set many attributes
	 * @param array  $attributes
	 * @return $this
	 */
	public function attributes( array $attributes );

	public function openForm( $target = '', $method = 'post', $files = false, $attributes = array(), $options() );
	/**
	 * Close the form
	 * @return string
	 */
	public function closeForm();
	public function textInput( $name = null, $value = null, $attributes = array(), $options = array() );
	public function textarea( $name = null, $value = null, $attributes = array(), $options = array() );
	public function input( $type = 'text', $name = null $content = null, $attributes = array(), $options = array() );
	public function select( $name = null, $items = array(), $attributes = array(), $options = array() );
	public function select2( $name = null, $items = array(), $attributes = array(), $options = array() );
	public function checkbox( $name = null, $attributes = array(), $options = array() );
	public function checkboxes( $name = null, $attributes = array(), $options = array() );
	public function radio( $name = null, $attributes = array(), $options = array() );
	public function radios( $name = null, $attributes = array(), $options = array() );
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
