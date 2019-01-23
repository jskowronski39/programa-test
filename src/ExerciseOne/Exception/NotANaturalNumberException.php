<?php

namespace ProgramaTest\ExerciseOne\Exception;

use Throwable;

class NotANaturalNumberException extends \Exception
{
	private const EXCEPTION_MESSAGE_TEMPLATE = 'Passed value: "%s" is not a natural number!';

	public function __construct(string $message = '', int $code = 0, Throwable $previous = null)
	{
		parent::__construct(\sprintf(self::EXCEPTION_MESSAGE_TEMPLATE, $message), $code, $previous);
	}
}
