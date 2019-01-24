<?php

use Doctrine\ORM\EntityManager;
use ProgramaTest\ExerciseFour\Entity\Menu;

require_once '../../vendor/autoload.php';
require_once 'twig_bootstrap.php';

/** @var $entityManager EntityManager */
$entityManager = require_once '../../bootstrap.php';

$mainMenuEntry = $entityManager->getRepository(Menu::class)->findOneBy([
	'parent' => null,
]);

/** @var $twig Twig_Environment */
$template = $twig->load('index.html.twig');
echo $template->render([
	'mainMenuEntry' => $mainMenuEntry,
]);
