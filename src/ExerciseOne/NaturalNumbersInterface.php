<?php

namespace ProgramaTest\ExerciseOne;

use ProgramaTest\ExerciseOne\Exception\NaturalNumberNotExistException;
use ProgramaTest\ExerciseOne\Exception\NotANaturalNumberException;

interface NaturalNumbersInterface
{
	/**
	 * NaturalNumbers constructor.
	 *
	 * @param bool $treatZeroAsNaturalNumber Specifies if zero should be treated as natural number or not
	 */
	public function __construct(bool $treatZeroAsNaturalNumber = true);

	/**
	 * Creates class instance from given array of natural numbers.
	 *
	 * @param array $naturalNumbersArray      Natural numbers array
	 * @param bool  $treatZeroAsNaturalNumber Specifies if zero should be treated as natural number or not
	 *
	 * @return NaturalNumbers Class instance
	 */
	public static function createFromArray(array $naturalNumbersArray, bool $treatZeroAsNaturalNumber = true): NaturalNumbers;

	/**
	 * Adds natural number to the collection.
	 *
	 * @param int $naturalNumber Natural number to add
	 *
	 * @throws NotANaturalNumberException Thrown if provided number is not a natural number
	 */
	public function addNaturalNumber(int $naturalNumber): void;

	/**
	 * Returns array of even natural numbers in the collection.
	 *
	 * @return array Even natural numbers array
	 */
	public function getEvenNaturalNumbers(): array;

	/**
	 * Returns count of even natural numbers in the collection.
	 *
	 * @return int Count of even natural numbers
	 */
	public function getEvenNaturalNumbersCount(): int;

	/**
	 * Returns index under which natural number can be found in the collection.
	 *
	 * @param int $naturalNumber Natural number to look for
	 *
	 * @throws NaturalNumberNotExistException Thrown if provided number does not exist in the collection
	 *
	 * @return int Natural number index or -1 if not found
	 */
	public function getNaturalNumberIndex(int $naturalNumber): int;

	/**
	 * Returns array of all natural numbers in the collection.
	 *
	 * @return array Natural numbers array
	 */
	public function getNaturalNumbers(): array;

	/**
	 * Returns array of odd natural numbers in the collection.
	 *
	 * @return array Odd natural numbers array
	 */
	public function getOddNaturalNumbers(): array;

	/**
	 * Returns count of odd natural numbers in the collection.
	 *
	 * @return int Count of odd natural numbers
	 */
	public function getOddNaturalNumbersCount(): int;

	/**
	 * Returns sum of all even natural numbers in the collection.
	 *
	 * @return int Even natural numbers sum
	 */
	public function getSumOfEvenNaturalNumbers(): int;

	/**
	 * Returns sum of all odd natural numbers in the collection.
	 *
	 * @return int Odd natural numbers sum
	 */
	public function getSumOfOddNaturalNumbers(): int;

	/**
	 * Verifies if given number is a natural number.
	 *
	 * @param int $number Number to verify
	 *
	 * @return bool Verification result
	 */
	public function isNumberNatural(int $number): bool;

	/**
	 * Checks whether natural number exists in the collection.
	 *
	 * @param int $naturalNumber Natural number to check
	 *
	 * @throws NotANaturalNumberException Thrown if provided number is not a natural number
	 *
	 * @return bool Returns false if number wasn't found. True otherwise
	 */
	public function naturalNumberExist(int $naturalNumber): bool;

	/**
	 * Removes given natural number from the collection.
	 *
	 * @param int $naturalNumber Natural number to remove
	 *
	 * @throws NotANaturalNumberException     Thrown if provided number is not a natural number
	 * @throws NaturalNumberNotExistException Thrown if provided number does not exist in the collection
	 */
	public function removeNaturalNumber(int $naturalNumber): void;
}
