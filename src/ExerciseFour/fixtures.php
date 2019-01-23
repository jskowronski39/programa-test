<?php

use Doctrine\ORM\EntityManager;
use ProgramaTest\ExerciseFour\Entity\Menu;

require_once '../../vendor/autoload.php';

/** @var $entityManager EntityManager */
$entityManager = require_once '../../bootstrap.php';

$mainCategory = new Menu();
$mainCategory->setLabel('Kategoria główna');

$subCategory1 = new Menu();
$subCategory1->setLabel('Podkategoria 1');
$subCategory1->setParent($mainCategory);

$subCategory11 = new Menu();
$subCategory11->setLabel('Podkategoria 1.1');
$subCategory11->setParent($subCategory1);

$subCategory12 = new Menu();
$subCategory12->setLabel('Podkategoria 1.2');
$subCategory12->setParent($subCategory1);

$subCategory2 = new Menu();
$subCategory2->setLabel('Podkategoria 2');
$subCategory2->setParent($mainCategory);

$subCategory21 = new Menu();
$subCategory21->setLabel('Podkategoria 2.1');
$subCategory21->setParent($subCategory2);

$subCategory22 = new Menu();
$subCategory22->setLabel('Podkategoria 2.2');
$subCategory22->setParent($subCategory2);

$entityManager->persist($mainCategory);

$entityManager->flush();
