<?php

namespace ProgramaTest\ExerciseOne\Exception;

class NaturalNumberNotExistException extends \Exception
{
	private const EXCEPTION_MESSAGE_TEMPLATE = 'Natural number: "%s" not exist!';

	public function __construct(string $message = '', int $code = 0, Throwable $previous = null)
	{
		parent::__construct(\sprintf(self::EXCEPTION_MESSAGE_TEMPLATE, $message), $code, $previous);
	}
}
