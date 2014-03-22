<?php namespace Tlr\Components;

use HtmlComponentFormatterInterface as FormatterInterface;

class ComponentManager {

	protected $config = array();
	protected $formatters = array();
	protected $default;

	public function __construct( array $formatters = array(), $default = null )
	{
		// Assign the formatters array
		$this->config = $formatters;

		// Assign the default formatter
		if ( ! is_null($default) )
		{
			$this->setDefault($default);
		}
	}

	/**
	 * Add a formatter to the config array. If it has already
	 * been loaded from that config array, re-load it
	 * @param string $key
	 * @param mixed  $formatter
	 */
	public function addFormatter( $key, $formatter )
	{
		$load = false;

		if ( isset( $this->formatters[$key] ) )
		{
			$load = true;
		}

		$this->config[ $key ] = $formatter;

		if ( $load )
		{
			$this->loadFormatter( $key );
		}

		return $this;
	}

	/**
	 * Assign a formatter to the formatters array
	 * @param string             $key
	 * @param FormatterInterface $formatter
	 */
	public function setFormatter( $key, FormatterInterface $formatter )
	{
		return $this->formatters[$key] = $formatter;
	}

	/**
	 * Make sure the formatter is loaded into the formatters array
	 * @param  string $key
	 * @return FormatterInterface
	 */
	public function loadFormatter( $key )
	{
		if ( ! isset($this->config[$key] ) )
		{
			throw new InvalidArgumentException("No such format: $key");
		}

		return $this->setFormatter( $key, $this->resolve( $this->config[ $key ] ) );
	}

	/**
	 * Resolve the given input to a formatter instance
	 * @param  string $formatter
	 * @return FormatterInterface
	 */
	public function resolve( $formatter )
	{
		if ( is_a($formatter, FormatterInterface) )
		{
			return $formatter;
		}

		if ( is_string($formatter) )
		{
			return new $formatter;
		}
	}

	/**
	 * Get the given formatter by key
	 * @param  string $key
	 * @return FormatterInterface
	 */
	public function getFormatter( $key )
	{
		if ( ! isset( $this->formatters[ $key ] ) )
		{
			$this->loadFormatter( $key );
		}

		return $this->formatters[$key];
	}

	/**
	 * Set the default formatter
	 * @param string $key
	 */
	public function setDefault( $key )
	{
		if ( ! isset( $this->formatters[ $key ] ) || ! isset( $this->config[ $key ] ) )
		{
			throw new InvalidArgumentException("The formatter $key cannot be set as default, as it does not exist.")
		}

		$this->default = $key;

		return $this;
	}

	/**
	 * Get the specified formatter, returning the default formatter if nothing is specified
	 * @param  string $key
	 * @return FormatterInterface
	 */
	public function format( $key = null )
	{
		if ( is_null( $key ) )
		{
			$key = $this->getDefaultKey();
		}

		return $this->getFormatter( $key );
	}

	/**
	 * Forward all non-handled methods to the default formatter
	 * @param  string $method
	 * @param  array  $args
	 * @return mixed
	 */
	public function __call( $method, $args )
	{
		return call_user_func_array(array( $this->format(), $method ), $args);
	}

	/// GETTERS ///

	/**
	 * Get a list of all the formatters
	 * @return array
	 */
	public function getFormatters()
	{
		return $this->formatters;
	}

	/**
	 * Get the config array
	 * @return array
	 */
	public function getConfig()
	{
		return $this->config;
	}

	/**
	 * Get the default key.
	 * @return string
	 */
	public function getDefaultKey()
	{
		return $this->default;
	}
}
