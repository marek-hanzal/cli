<?php

namespace Marsh\Claim;

use Marsh\Claim\Register\RegisterServiceTrait;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * This is plain good old Symfony command.
 *
 * https://symfony.com/doc/current/console.html#creating-a-command
 */
class RegisterCommand extends Command {
	use RegisterServiceTrait;

	protected static $defaultName = 'claim:register';

	protected function execute(InputInterface $input, OutputInterface $output) {
		$output->writeln($this->registerService->doSomething());
		return self::SUCCESS;
	}
}
