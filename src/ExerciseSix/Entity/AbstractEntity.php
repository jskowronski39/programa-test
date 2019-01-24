<?php

namespace ProgramaTest\ExerciseSix\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

abstract class AbstractEntity
{
	/**
	 * @Column(type="string", length=255, nullable=true)
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue
	 *
	 * @var int
	 */
	protected $id;

	/**
	 * @Column(type="string", length=255)
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * AbstractEntity constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $description
	 */
	public function setDescription(string $description): void
	{
		$this->description = $description;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}
}
