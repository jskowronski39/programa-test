<?php

use PHPUnit\Framework\TestCase;
use ProgramaTest\ExerciseOne\Exception\NaturalNumberNotExistException;
use ProgramaTest\ExerciseOne\Exception\NotANaturalNumberException;
use ProgramaTest\ExerciseOne\NaturalNumbers;
use ProgramaTest\ExerciseOne\NaturalNumbersInterface;

class NaturalNumbersTest extends TestCase
{
	public const EXISTING_NATURAL_NUMBER = 7;
	public const EXISTING_NATURAL_NUMBER_INDEX = 7;
	public const NOT_EXISTING_NATURAL_NUMBER = 23;
	public const NOT_A_NATURAL_NUMBER = -12.43;

	public const NOT_NATURAL_NUMBERS_ARRAY = [
		-1,
	];

	public const NATURAL_NUMBERS_ARRAY = [
		0,
		1,
		2,
		3,
		4,
		5,
		6,
		7,
		8,
		9,
		10,
	];

	public const EVEN_NATURAL_NUMBERS_ARRAY = [
		0,
		2,
		4,
		6,
		8,
		10,
	];

	public const ODD_NATURAL_NUMBERS_ARRAY = [
		1,
		3,
		5,
		7,
		9,
	];

	/**
	 * @var NaturalNumbersInterface
	 */
	protected $naturalNumbersInstance;

	public function setUp(): void
	{
		$this->naturalNumbersInstance = NaturalNumbers::createFromArray(self::NATURAL_NUMBERS_ARRAY, true);
	}

	public function tearDown(): void
	{
		unset($this->naturalNumbersInstance);
	}

	public function testCreateUsingConstructor()
	{
		$this->assertInstanceOf(NaturalNumbers::class, new NaturalNumbers());
		$this->assertInstanceOf(NaturalNumbers::class, new NaturalNumbers(true));
	}

	public function testCreateFromNaturalNumbersArray(): void
	{
		$this->assertInstanceOf(NaturalNumbers::class, $this->naturalNumbersInstance);
	}

	public function testCreateFromNotNaturalNumbersArray(): void
	{
		$this->expectException(NotANaturalNumberException::class);

		NaturalNumbers::createFromArray(self::NOT_NATURAL_NUMBERS_ARRAY, true);
	}

	public function testAddNaturalNumber(): void
	{
		$naturalNumberToAdd = 11;

		$this->naturalNumbersInstance->addNaturalNumber($naturalNumberToAdd);
		$this->assertContains($naturalNumberToAdd, $this->naturalNumbersInstance->getNaturalNumbers());
	}

	public function testAddNotNaturalNumber(): void
	{
		$this->expectException(NotANaturalNumberException::class);

		$this->naturalNumbersInstance->addNaturalNumber(self::NOT_A_NATURAL_NUMBER);
	}

	public function testGetEvenNaturalNumbers(): void
	{
		$this->assertEquals(self::EVEN_NATURAL_NUMBERS_ARRAY, $this->naturalNumbersInstance->getEvenNaturalNumbers());
	}

	public function testGetEvenNaturalNumbersCount(): void
	{
		$this->assertEquals(\count(self::EVEN_NATURAL_NUMBERS_ARRAY), $this->naturalNumbersInstance->getEvenNaturalNumbersCount());
	}

	public function testGetExistingNaturalNumberIndex(): void
	{
		$this->assertEquals(
			self::EXISTING_NATURAL_NUMBER_INDEX,
			$this->naturalNumbersInstance->getNaturalNumberIndex(self::EXISTING_NATURAL_NUMBER)
		);
	}

	public function testGetNotExistingNaturalNumberIndex(): void
	{
		$this->expectException(NaturalNumberNotExistException::class);

		$this->naturalNumbersInstance->getNaturalNumberIndex(self::NOT_EXISTING_NATURAL_NUMBER);
	}

	public function testGetNotNaturalNumberIndex(): void
	{
		$this->expectException(NotANaturalNumberException::class);

		$this->naturalNumbersInstance->getNaturalNumberIndex(self::NOT_A_NATURAL_NUMBER);
	}

	public function testGetNaturalNumbers(): void
	{
		$this->assertEquals(self::NATURAL_NUMBERS_ARRAY, $this->naturalNumbersInstance->getNaturalNumbers());
	}

	public function testGetOddNaturalNumbers(): void
	{
		$this->assertEquals(self::ODD_NATURAL_NUMBERS_ARRAY, $this->naturalNumbersInstance->getOddNaturalNumbers());
	}

	public function testGetOddNaturalNumbersCount(): void
	{
		$this->assertEquals(\count(self::ODD_NATURAL_NUMBERS_ARRAY), $this->naturalNumbersInstance->getOddNaturalNumbersCount());
	}

	public function testGetSumOfEvenNaturalNumbers()
	{
		$this->assertEquals(array_sum(self::EVEN_NATURAL_NUMBERS_ARRAY), $this->naturalNumbersInstance->getSumOfEvenNaturalNumbers());
	}

	public function testGetSumOfOddNaturalNumbers()
	{
		$this->assertEquals(array_sum(self::ODD_NATURAL_NUMBERS_ARRAY), $this->naturalNumbersInstance->getSumOfOddNaturalNumbers());
	}

	public function testIsNumberNatural(): void
	{
		$this->assertTrue($this->naturalNumbersInstance->isNumberNatural(self::NOT_EXISTING_NATURAL_NUMBER));
		$this->assertFalse($this->naturalNumbersInstance->isNumberNatural(self::NOT_A_NATURAL_NUMBER));
	}

	public function testNaturalNumberExist(): void
	{
		$this->assertTrue($this->naturalNumbersInstance->naturalNumberExist(self::EXISTING_NATURAL_NUMBER));
		$this->assertFalse($this->naturalNumbersInstance->naturalNumberExist(self::NOT_EXISTING_NATURAL_NUMBER));
	}

	public function testRemoveExistingNaturalNumber(): void
	{
		$this->naturalNumbersInstance->removeNaturalNumber(self::EXISTING_NATURAL_NUMBER);
		$this->assertEquals(\count(self::NATURAL_NUMBERS_ARRAY) -1, \count($this->naturalNumbersInstance->getNaturalNumbers()));
		$this->assertFalse($this->naturalNumbersInstance->naturalNumberExist(self::EXISTING_NATURAL_NUMBER));
	}

	public function testRemoveNotExistingNaturalNumber(): void
	{
		$this->expectException(NaturalNumberNotExistException::class);
		$this->naturalNumbersInstance->removeNaturalNumber(self::NOT_EXISTING_NATURAL_NUMBER);
	}

	public function testRemoveNotNaturalNumber(): void
	{
		$this->expectException(NotANaturalNumberException::class);
		$this->naturalNumbersInstance->removeNaturalNumber(self::NOT_A_NATURAL_NUMBER);
	}
}
