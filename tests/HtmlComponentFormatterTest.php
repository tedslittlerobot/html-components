<?php

// use Mockery as m;
use Tlr\Components\HtmlComponentFormatter as Formatter;

class HtmlComponentFormatterTest extends PHPUnit_Framework_TestCase {

	public function setUp()
	{
		parent::setUp();

		$this->formatter = new Formatter;
	}

	public function tearDown()
	{
		parent::tearDown();
		// m::close();
	}

	public function testLink()
	{
		$this->assertEquals('<a href="foo">bar</a>', $this->formatter->link('bar', 'foo'));
		$this->assertEquals('<a>bar</a>', $this->formatter->link('bar', null));
	}

	public function testCloseForm()
	{
		$this->assertEquals('</form>', $this->formatter->closeForm());
	}

}
