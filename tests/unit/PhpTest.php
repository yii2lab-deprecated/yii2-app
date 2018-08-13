<?php

namespace tests\unit\helpers;

use yii2lab\test\Test\Unit;

class PhpTest extends Unit
{
	
	public function testFloatPrecision()
	{
		$actual = 0.1 + 0.2;
		$this->tester->assertEquals(0.3, $actual);
	}
	
	/*public function testFloatPrecision2()
	{
		$actual = 35-34.99;
		$this->tester->assertEquals(0.01, $actual);
		$this->tester->assertTrue(0.01 == $actual);
	}
	
	public function testFloatPrecision3()
	{
		$a = 1.23456789;
		$b = 1.23456780;
		$epsilon = 0.00001;
		$actual = $a-$b;
		$this->tester->assertEquals(0.00000009, $actual);
		$this->tester->assertTrue(0.00000009 == $actual);
		$this->tester->assertTrue(abs($actual) < $epsilon);
	}*/
}
