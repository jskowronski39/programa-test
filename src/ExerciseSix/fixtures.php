<?php

use Doctrine\ORM\EntityManager;
use ProgramaTest\ExerciseSix\Entity\Category;
use ProgramaTest\ExerciseSix\Entity\Product;

require_once '../../vendor/autoload.php';

/** @var $entityManager EntityManager */
$entityManager = require_once '../../bootstrap.php';

$pcPartsCategory = new Category();
$pcPartsCategory->setName('PC Parts');
$pcPartsCategory->setDescription('');

$gpusCategory = new Category();
$gpusCategory->setName('Graphics Cards');
$gpusCategory->setDescription('');

$pascalCategory = new Category();
$pascalCategory->setName('Pascal Architecture');
$pascalCategory->setDescription('');

$gpu1 = new Product();
$gpu1->setName('MSI GeForce GTX 970');
$gpu1->setDescription('');
$gpu1->setAvailable(false);
$gpu1->setPrice(1178.15);
$gpu1->addCategory($pcPartsCategory);
$gpu1->addCategory($gpusCategory);

$gpu2 = new Product();
$gpu2->setName('Asus GeForce GTX 1080 Ti');
$gpu2->setDescription('');
$gpu2->setAvailable(true);
$gpu2->setPrice(3661.28);
$gpu2->addCategory($pcPartsCategory);
$gpu2->addCategory($gpusCategory);

$gpu3 = new Product();
$gpu3->setName('Gigabyte GeForce RTX 2080 Ti');
$gpu3->setDescription('');
$gpu3->setAvailable(true);
$gpu3->setPrice(5678.00);
$gpu3->addCategory($pcPartsCategory);
$gpu3->addCategory($gpusCategory);
$gpu3->addCategory($pascalCategory);

$entityManager->persist($gpu1);
$entityManager->persist($gpu2);
$entityManager->persist($gpu3);
$entityManager->flush();
