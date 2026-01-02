<?php

namespace src\vendor\smarty\smarty\src\FunctionHandler;

use src\vendor\smarty\smarty\src\FunctionHandler\FunctionHandlerInterface;
use src\vendor\smarty\smarty\src\Template;

class Base implements FunctionHandlerInterface {

	/**
	 * @var bool
	 */
	protected $cacheable = true;

	public function isCacheable(): bool {
		return $this->cacheable;
	}

	public function handle($params, Template $template) {
		// TODO: Implement handle() method.
	}
}