<?php

namespace src\vendor\smarty\smarty\src\Extension;

use src\vendor\smarty\smarty\src\Exception;

class CallbackWrapper {

	/**
	 * @var callback
	 */
	private $callback;
	/**
	 * @var string
	 */
	private $modifierName;

	/**
	 * @param string $modifierName
	 * @param callback $callback
	 */
	public function __construct(string $modifierName, $callback) {
		$this->callback = $callback;
		$this->modifierName = $modifierName;
	}

	public function handle(...$params) {
		try {
			return ($this->callback)(...$params);
		} catch (\ArgumentCountError $e) {
			throw new Exception("Invalid number of arguments to modifier " . $this->modifierName);
		}
	}

}