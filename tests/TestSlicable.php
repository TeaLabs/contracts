<?php
namespace Tea\Contracts\Tests;

use function Tea\Regex\re;
use PHPUnit\Framework\TestCase;
use Tea\Contracts\General\Sliceable;

/**
*
*/
class TestSlicable extends TestCase
{
	/**
	 * @var \Tea\Regex\RegularExpression
	 */
	protected $regex;

	protected function setUp()
	{
		$this->regex = re(Sliceable::SLICE_OFFSET_REGEX);
	}

	public function testSliceOffsetRegex()
	{
		$offset = '4542:10';
		$matches = $this->regex->match($offset);
		$this->assertTrue($matches->any());
		$this->assertEquals(4542, $matches['offset']);
		$this->assertEquals(10, $matches['length']);

		$offset = ':-10';
		$matches = $this->regex->match($offset);
		$this->assertTrue($matches->any());
		$this->assertEquals('', $matches['offset']);
		$this->assertEquals(-10, $matches['length']);

		$offset = '-5:';
		$matches = $this->regex->match($offset);
		$this->assertTrue($matches->any());
		$this->assertEquals(-5, $matches['offset']);
		$this->assertEquals('', $matches['length']);

		$offset = '5:';
		$matches = $this->regex->match($offset);
		$this->assertTrue($matches->any());
		$this->assertEquals(5, $matches['offset']);
		$this->assertEquals('', $matches['length']);

		$offset = ':';
		$matches = $this->regex->match($offset);
		$this->assertTrue($matches->any());
		$this->assertEquals('', $matches['offset']);
		$this->assertEquals('', $matches['length']);

		$offset = '3:12.';
		$matches = $this->regex->match($offset);
		$this->assertFalse($matches->any());

		$offset = '3.4:12';
		$matches = $this->regex->match($offset);
		$this->assertFalse($matches->any());

		$offset = 'i34:12';
		$matches = $this->regex->match($offset);
		$this->assertFalse($matches->any());

		$offset = 'x:12';
		$matches = $this->regex->match($offset);
		$this->assertFalse($matches->any());

		$offset = ':x12';
		$matches = $this->regex->match($offset);
		$this->assertFalse($matches->any());

		$offset = '412';
		$matches = $this->regex->match($offset);
		$this->assertFalse($matches->any());

		$offset = '6:i12';
		$matches = $this->regex->match($offset);
		$this->assertFalse($matches->any());

		$offset = '6:12-';
		$matches = $this->regex->match($offset);
		$this->assertFalse($matches->any());

	}
}
