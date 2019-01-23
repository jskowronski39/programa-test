<?php

require_once 'vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

$paths = [
	'src/ExerciseFour/Entity',
	'src/ExerciseSix/Entity',
];

$isDevMode = false;

$dbParams = [
	'driver' => 'pdo_mysql',
	'host' => 'localhost',
	'port' => 3306,
	'dbname' => 'programa-test',
	'user' => 'root',
	'password' => '', // Needs to be set
	'charset' => 'utf8',
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, true);
return $entityManager = EntityManager::create($dbParams, $config);
