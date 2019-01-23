<?php

namespace ProgramaTest\ExerciseFour\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="menu")
 */
class Menu
{
	/**
	 * @OneToMany(targetEntity="Menu", mappedBy="parent", cascade={"all"})
	 *
	 * @var Collection
	 */
	private $children;

	/**
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue
	 *
	 * @var int
	 */
	private $id;

	/**
	 * @Column(type="string", length=255)
	 *
	 * @var string
	 */
	private $label;

	/**
	 * @ManyToOne(targetEntity="Menu", inversedBy="children", cascade={"all"})
	 * @JoinColumn(name="parent_id", referencedColumnName="id")
	 *
	 * @var Menu
	 */
	private $parent;

	/**
	 * Menu constructor.
	 */
	public function __construct()
	{
		$this->children = new ArrayCollection();
	}

	/**
	 * @param Menu $child
	 */
	public function addChild(Menu $child): void
	{
		if ($this->children->contains($child)) {
			return;
		}

		$this->children->add($child);
		$child->setParent($this);
	}

	/**
	 * @return Collection
	 */
	public function getChildren(): Collection
	{
		return clone $this->children;
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
	public function getLabel(): string
	{
		return $this->label;
	}

	/**
	 * @return Menu
	 */
	public function getParent(): ?Menu
	{
		return $this->parent;
	}

	/**
	 * @param Menu $child
	 */
	public function removeChild(Menu $child): void
	{
		if (!$this->children->contains($child)) {
			return;
		}

		$this->children->remove($child);
		$child->setParent(null);
	}

	/**
	 * @param string $label
	 */
	public function setLabel(string $label): void
	{
		$this->label = $label;
	}

	/**
	 * @param Menu $parent
	 */
	public function setParent(Menu $parent): void
	{
		$this->parent = $parent;
		$parent->addChild($this);
	}
}
