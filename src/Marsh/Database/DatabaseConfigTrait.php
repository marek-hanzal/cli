<?php

namespace Marsh\Database;

trait DatabaseConfigTrait {
	/** @var DatabaseConfig */
	protected $databaseConfig;

	/**
	 * @Inject()
	 *
	 * @param DatabaseConfig $databaseConfig
	 */
	public function setDatabaseConfig(DatabaseConfig $databaseConfig) {
		$this->databaseConfig = $databaseConfig;
	}
}
