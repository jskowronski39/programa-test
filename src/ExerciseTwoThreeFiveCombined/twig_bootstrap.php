<?php

require_once '../../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('templates/');
$twig = new Twig_Environment($loader, [
	//	'cache' => 'twig_cache/',
	'cache' => false,
	'debug' => true,
]);
$twig->addExtension(new Twig_Extension_Debug());
