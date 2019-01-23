<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

/** @var $entityManager EntityManager */
$entityManager = require_once 'bootstrap.php';

return ConsoleRunner::createHelperSet($entityManager);
