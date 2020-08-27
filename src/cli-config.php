<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once '/public/bootstrap.php';

// replace with mechanism to retrieve EntityManager in your app
// $entityManager = GetEntityManager();


// cli-config.php

// use Doctrine\ORM\EntityManager;
// use Doctrine\ORM\Tools\Console\ConsoleRunner;
// use Slim\Container;

// /** @var Container $container */
// $container = require_once __DIR__ . '/public/bootstrap.php';

// return ConsoleRunner::createHelperSet($container[EntityManager::class]);
// require_once "/public/bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
