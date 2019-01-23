<?php

namespace ProgramaTest\ExerciseSix\Repository;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use ProgramaTest\ExerciseSix\Entity\Category;
use ProgramaTest\ExerciseSix\Entity\Product;

class CategoryRepository extends EntityRepository
{
	/**
	 * Returns number of available products from given category.
	 *
	 * @param Category $category Product category
	 *
	 * @throws NonUniqueResultException
	 *
	 * @return int Number of available products
	 */
	public function getAvailableProductsFromCategoryCount(Category $category): int
	{
		$qb = $this->_em->createQueryBuilder();
		$ex = $qb->expr();

		$qb
			->select($ex->count('p'))
			->from(Product::class, 'p')
			->andWhere($ex->isMemberOf(':category', 'p.categories'))
			->andWhere($ex->eq('p.available', true))
			->setParameter('category', $category)
		;

		return $qb->getQuery()->getSingleScalarResult();
	}

	/**
	 * Returns products from given category ordered by name using specified sort order.
	 *
	 * @param Category $category  Product category
	 * @param string   $sortOrder Specified sort order
	 *
	 * @return array Products sorted by name from given category
	 */
	public function getProductsFromCategoryOrderedByName(Category $category, string $sortOrder = Criteria::ASC): array
	{
		$qb = $this->_em->createQueryBuilder();

		$qb
			->select('p')
			->from(Product::class, 'p')
			->where($qb->expr()->isMemberOf(':category', 'p.categories'))
			->setParameter('category', $category)
			->orderBy('p.name', $sortOrder)
		;

		return $qb->getQuery()->getResult();
	}
}
