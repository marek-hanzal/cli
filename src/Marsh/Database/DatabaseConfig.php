<?php

namespace Marsh\Database;

/**
 * This is an example of DTO class holding just plain array; class itself could provide
 * access methods (like `getHost()`) or keep direct access to the array.
 *
 * Also this class could not be autowired, so it must have definition in some config (in this case
 * base definition is in /config/config.php and array literal is in database key in /config/config.local.php).
 */
class DatabaseConfig {
	/** @var array */
	protected $config;

	public function __construct(array $config) {
		$this->config = $config;
	}

	public function getConfig(): array {
		return $this->config;
	}
}
