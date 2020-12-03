<?php

namespace Marsh\Claim\Register;

use Marsh\Database\DatabaseConfigTrait;

class RegisterService {
	use DatabaseConfigTrait;

	public function doSomething(): string {
		var_dump($this->databaseConfig->getConfig());
		return "wololooo!";
	}
}
