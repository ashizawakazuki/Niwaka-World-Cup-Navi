<?php

namespace src\vendor\smarty\smarty\src\Compile\Modifier;

use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

class BCPluginWrapper extends Base {

	private $callback;

	public function __construct($callback) {
		$this->callback = $callback;
	}

	/**
	 * @inheritDoc
	 */
	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		return call_user_func($this->callback, $params, $compiler);
	}
}