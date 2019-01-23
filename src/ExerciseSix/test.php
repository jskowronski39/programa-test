<?php

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;
use ProgramaTest\ExerciseSix\Entity\Category;
use ProgramaTest\ExerciseSix\Entity\Product;
use ProgramaTest\ExerciseSix\Repository\CategoryRepository;
use ProgramaTest\ExerciseSix\Repository\ProductRepository;

require_once '../../vendor/autoload.php';

/** @var $entityManager EntityManager */
$entityManager = require_once '../../bootstrap.php';

/** @var $productRepository ProductRepository */
$productRepository = $entityManager->getRepository(Product::class);

/** @var $categoryRepository CategoryRepository */
$categoryRepository = $entityManager->getRepository(Category::class);

// Product repository

// #1
$availableProductsCount = $productRepository->getAvailableProductsCount();

// #2
$unavailableProductsArray = $productRepository->getUnavailableProducts();

// #3
$productsByNameArray = $productRepository->getProductsByName('gtx');

// Category repository

// #1
$pascalCategory = $categoryRepository->findOneBy([
	'name' => 'Pascal Architecture',
]);
$pascalGpusCount = $categoryRepository->getAvailableProductsFromCategoryCount($pascalCategory);

// #2
$pcPartsCategory = $categoryRepository->findOneBy([
	'name' => 'PC Parts',
]);
$sortedPcPartsArray = $categoryRepository->getProductsFromCategoryOrderedByName($pcPartsCategory, Criteria::ASC);
