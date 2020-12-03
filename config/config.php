<?php

use Marsh\Database\DatabaseConfig;
use Psr\Container\ContainerInterface;

/**
 * If we have some services which is not possible to create by a standard autoloading, this is the place where
 * tu put service definition; key on the left, service definition on the right.
 *
 * https://php-di.org/doc/php-definitions.html
 */
return [
	'env' => 'prod',
	DatabaseConfig::class => function (ContainerInterface $container) {
		return new DatabaseConfig($container->get('database'));
	},
];
