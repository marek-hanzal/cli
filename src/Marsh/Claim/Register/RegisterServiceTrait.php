<?php

namespace Marsh\Claim\Register;

/**
 * this is not generally necessary, but one trait will keep call-site code small, simple and readable as
 * with every dependency used it's necessary just to use one line per dependency (like use RegisterServiceTrait).
 */
trait RegisterServiceTrait {
	/** @var RegisterService */
	protected $registerService;

	/**
	 * @Inject()
	 *
	 * @param RegisterService $registerService
	 */
	public function setRegisterService($registerService) {
		$this->registerService = $registerService;
	}
}
