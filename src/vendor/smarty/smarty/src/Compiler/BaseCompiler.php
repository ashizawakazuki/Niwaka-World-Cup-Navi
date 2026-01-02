<?php

namespace src\vendor\smarty\smarty\src\Compiler;

use src\vendor\smarty\smarty\src\Smarty;

abstract class BaseCompiler {

	/**
	 * Smarty object
	 *
	 * @var Smarty
	 */
	protected $smarty = null;

	/**
	 * @return Smarty|null
	 */
	public function getSmarty(): Smarty {
		return $this->smarty;
	}

}