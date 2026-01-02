<?php

namespace src\vendor\smarty\smarty\src\BlockHandler;

use src\vendor\smarty\smarty\src\BlockHandler\BlockHandlerInterface;
use src\vendor\smarty\smarty\src\Template;

abstract class Base implements BlockHandlerInterface {

	/**
	 * @var bool
	 */
	protected $cacheable = true;

	abstract public function handle($params, $content, Template $template, &$repeat);

	public function isCacheable(): bool {
		return $this->cacheable;
	}
}