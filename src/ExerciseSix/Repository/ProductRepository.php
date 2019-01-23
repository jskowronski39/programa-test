<?php

namespace ProgramaTest\ExerciseSix\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use ProgramaTest\ExerciseSix\Entity\Product;

class ProductRepository extends EntityRepository
{
	/**
	 * Returns number of available products.
	 *
	 * @throws NonUniqueResultException
	 *
	 * @return int Number of available products
	 */
	public function getAvailableProductsCount(): int
	{
		$qb = $this->_em->createQueryBuilder();
		$ex = $qb->expr();

		$qb
			->select($ex->count('p'))
			->from(Product::class, 'p')
			->andWhere($ex->eq('p.available', true))
		;

		return $qb->getQuery()->getSingleScalarResult();
	}

	/**
	 * Returns products by given name (or name part).
	 *
	 * @param string $name Product name
	 *
	 * @return array Products that satisfy name condition
	 */
	public function getProductsByName(string $name): array
	{
		$qb = $this->_em->createQueryBuilder();
		$ex = $qb->expr();

		$qb
			->select('p')
			->from(Product::class, 'p')
			->andWhere(
				$ex->like('p.name', ':name')
			)
			->setParameter('name', '%'.$name.'%')
		;

		return $qb->getQuery()->getResult();
	}

	/**
	 * Returns collection of products that are unavailable.
	 *
	 * @return array Unavailable products
	 */
	public function getUnavailableProducts(): array
	{
		return $this->findBy([
			'available' => false,
		]);
	}
}
