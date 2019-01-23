<?php

namespace ProgramaTest\ExerciseSix\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity(repositoryClass="ProgramaTest\ExerciseSix\Repository\ProductRepository")
 * @Table(name="product")
 */
class Product extends AbstractEntity
{
	/**
	 * @Column(type="boolean")
	 *
	 * @var bool
	 */
	private $available;
	/**
	 * @ManyToMany(targetEntity="Category", inversedBy="products", cascade={"all"})
	 * @JoinTable(name="products_categories")
	 *
	 * @var Category[]
	 */
	private $categories;

	/**
	 * @Column(type="decimal", precision=8, scale=2)
	 *
	 * @var float
	 */
	private $price;

	/**
	 * Product constructor.
	 */
	public function __construct()
	{
		$this->categories = new ArrayCollection();

		parent::__construct();
	}

	/**
	 * @param Category $category
	 */
	public function addCategory(Category $category): void
	{
		if ($this->categories->contains($category)) {
			return;
		}

		$this->categories->add($category);
		$category->addProduct($this);
	}

	/**
	 * @return Collection
	 */
	public function getCategories(): Collection
	{
		return clone $this->categories;
	}

	/**
	 * @return float
	 */
	public function getPrice(): float
	{
		return $this->price;
	}

	/**
	 * @return bool
	 */
	public function isAvailable(): bool
	{
		return $this->available;
	}

	/**
	 * @param Category $category
	 */
	public function removeCategory(Category $category): void
	{
		if (!$this->categories->contains($category)) {
			return;
		}

		$this->categories->remove($category);
		$category->removeProduct($this);
	}

	/**
	 * @param bool $available
	 */
	public function setAvailable(bool $available): void
	{
		$this->available = $available;
	}

	/**
	 * @param float $price
	 */
	public function setPrice(float $price): void
	{
		$this->price = $price;
	}
}
