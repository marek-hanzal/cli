#!/usr/bin/env php
<?php

use DI\ContainerBuilder;
use Marsh\Claim\RegisterCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\CommandLoader\ContainerCommandLoader;

/**
 * Composer stuff as usual; we need autoloading (don't forget to call `composer install`!).
 */
require_once __DIR__ . '/vendor/autoload.php';
/**
 * PHP-DI container builder; this is cool if we want some nice code splitting support (decoupling commands, services,
 * config and other stuff).
 *
 * https://php-di.org/doc/getting-started.html
 */
$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(require __DIR__ . '/config/config.php');
$containerBuilder->addDefinitions(($config = @include __DIR__ . '/config/config.local.php') ? $config : []);
$containerBuilder->addDefinitions(($config = @include __DIR__ . '/config/config.optional.php') ? $config : []);
/**
 * This is the source of the dark magic! With this we can use @Inject annotation in Traits, thus it's not necessary
 * to use constructor hell dependencies.
 */
$containerBuilder->useAnnotations(true);
/**
 * New application with some name and version. Not so much interesting not important.
 */
$application = new Application("Simple Cli App", "1.0.0");
/**
 * This one is quite interesting:
 * - we want to create commands be a (php-di) container, thus it's necessary to use container based command loader
 * - here we can simply define command on the left side and php-di entry on the right side; good practice is to use
 *        PHP ::class notation
 */
$application->setCommandLoader(new ContainerCommandLoader($containerBuilder->build(), [
	'claim:register' => RegisterCommand::class,
]));
/**
 * Exit with application run will respect output status code.
 */
exit($application->run());
