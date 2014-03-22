<?php namespace Tlr\Components;

class HtmlComponentFormatter {

	public function closeForm()
	{
		return '</form>';
	}

	public function link($content, $href, $attributes = array(), $options = array())
	{
		if (!is_null($href))
		{
			$attributes['href'] = $href;
		}

		return $this->element('a', $attributes, $content);
	}

	public function element( $element = 'div', $attributes = array(), $content = null )
	{
		foreach ($attributes as $attribute => $values)
		{
			$attributes[$attribute] = implode(' ', (array)$values);
		}

		$html = "<{$element}" . $this->attributeString( $attributes ) . ">";

		if ( ! is_null($content) )
		{
			$html .= "{$content}</{$element}>";
		}

		return $html;
	}

	public function attributeString( $attributes )
	{
		$parsed = array();

		foreach ($attributes as $key => $value)
		{
			$parsed[] = $key . '=' . '"' . implode(' ', (array)$value) . '"';
		}

		return ( empty( $parsed ) ? '' : ' ' ) . implode(' ', $parsed);
	}
}
