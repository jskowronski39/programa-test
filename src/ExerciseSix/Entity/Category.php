<?php

namespace ProgramaTest\ExerciseSix\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity(repositoryClass="ProgramaTest\ExerciseSix\Repository\CategoryRepository")
 * @Table(name="category")
 */
class Category extends AbstractEntity
{
	/**
	 * @ManyToMany(targetEntity="Product", mappedBy="categories", cascade={"all"})
	 *
	 * @var Collection
	 */
	private $products;

	/**
	 * Category constructor.
	 */
	public function __construct()
	{
		$this->products = new ArrayCollection();

		parent::__construct();
	}

	/**
	 * @param Product $product
	 */
	public function addProduct(Product $product): void
	{
		if ($this->products->contains($product)) {
			return;
		}

		$this->products->add($product);
		$product->addCategory($this);
	}

	/**
	 * @return Collection
	 */
	public function getProducts(): Collection
	{
		return clone $this->products;
	}

	/**
	 * @param Product $product
	 */
	public function removeProduct(Product $product): void
	{
		if (!$this->products->contains($product)) {
			return;
		}

		$this->products->remove($product);
		$product->removeCategory($this);
	}
}
