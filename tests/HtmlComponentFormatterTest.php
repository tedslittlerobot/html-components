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

	public function testOpenForm()
	{
		$this->assertEquals('<form action="foo" method="BAR">', $this->formatter->openForm('foo', 'bar'));
		$this->assertEquals('<form enctype="multipart/form-data">', $this->formatter->openForm(null, null, true));
	}

	public function testCloseForm()
	{
		$this->assertEquals('</form>', $this->formatter->closeForm());
	}

	public function testCheckbox()
	{
		$this->assertEquals('<label><input type="checkbox" name="foo" value="baz">bar</label>', $this->formatter->checkbox('foo', 'bar', 'baz'));
	}

	public function testRadio()
	{
		$this->assertEquals('<label><input type="radio" name="foo" value="baz">bar</label>', $this->formatter->radio('foo', 'bar', 'baz'));
	}

}
