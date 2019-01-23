<?php

namespace ProgramaTest\ExerciseOne;

use ProgramaTest\ExerciseOne\Exception\NaturalNumberNotExistException;
use ProgramaTest\ExerciseOne\Exception\NotANaturalNumberException;

class NaturalNumbers implements NaturalNumbersInterface
{
	/**
	 * @var array Internal array of natural numbers
	 */
	private $naturalNumbersArray = [];

	/**
	 * @var bool Specifies if zero should be treated as natural number or not
	 */
	private $treatZeroAsNaturalNumber;

	/**
	 * {@inheritdoc}
	 */
	public function __construct(bool $treatZeroAsNaturalNumber = true)
	{
		$this->treatZeroAsNaturalNumber = $treatZeroAsNaturalNumber;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function createFromArray(array $naturalNumbersArray, bool $treatZeroAsNaturalNumber = true): NaturalNumbers
	{
		$naturalNumbers = new NaturalNumbers($treatZeroAsNaturalNumber);

		\array_walk($naturalNumbersArray, function ($element) use ($naturalNumbers) {
			$naturalNumbers->addNaturalNumber($element);
		});

		return $naturalNumbers;
	}

	/**
	 * {@inheritdoc}
	 */
	public function addNaturalNumber(int $naturalNumber): void
	{
		if (!$this->isNumberNatural($naturalNumber)) {
			throw new NotANaturalNumberException($naturalNumber);
		}

		$this->naturalNumbersArray[] = $naturalNumber;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getEvenNaturalNumbers(): array
	{
		return \array_values(\array_filter($this->naturalNumbersArray, function ($element) {
			return 0 == $element % 2;
		}));
	}

	/**
	 * {@inheritdoc}
	 */
	public function getEvenNaturalNumbersCount(): int
	{
		return \count($this->getEvenNaturalNumbers());
	}

	/**
	 * {@inheritdoc}
	 */
	public function getNaturalNumberIndex(int $naturalNumber): int
	{
		if (!$this->isNumberNatural($naturalNumber)) {
			throw new NotANaturalNumberException($naturalNumber);
		}

		$key = \array_search($naturalNumber, $this->naturalNumbersArray, true);
		if (!$key) {
			throw new NaturalNumberNotExistException($naturalNumber);
		}

		return $key;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getNaturalNumbers(): array
	{
		return $this->naturalNumbersArray;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getOddNaturalNumbers(): array
	{
		return \array_values(\array_filter($this->naturalNumbersArray, function ($element) {
			return 0 !== $element % 2;
		}));
	}

	/**
	 * {@inheritdoc}
	 */
	public function getOddNaturalNumbersCount(): int
	{
		return \count($this->getOddNaturalNumbers());
	}

	/**
	 * {@inheritdoc}
	 */
	public function getSumOfEvenNaturalNumbers(): int
	{
		return \array_sum($this->getEvenNaturalNumbers());
	}

	/**
	 * {@inheritdoc}
	 */
	public function getSumOfOddNaturalNumbers(): int
	{
		return \array_sum($this->getOddNaturalNumbers());
	}

	/**
	 * {@inheritdoc}
	 */
	public function isNumberNatural(int $number): bool
	{
		if ($this->treatZeroAsNaturalNumber) {
			return $number >= 0;
		}

		return $number > 0;
	}

	/**
	 * {@inheritdoc}
	 */
	public function naturalNumberExist(int $naturalNumber): bool
	{
		if (!$this->isNumberNatural($naturalNumber)) {
			throw new NotANaturalNumberException($naturalNumber);
		}

		$key = \array_search($naturalNumber, $this->naturalNumbersArray, true);

		if (false === $key) {
			return false;
		}

		return true;
	}

	/**
	 * {@inheritdoc}
	 */
	public function removeNaturalNumber(int $naturalNumber): void
	{
		if (!$this->isNumberNatural($naturalNumber)) {
			throw new NotANaturalNumberException($naturalNumber);
		}

		$key = $this->getNaturalNumberIndex($naturalNumber);

		unset($this->naturalNumbersArray[$key]);
	}
}
