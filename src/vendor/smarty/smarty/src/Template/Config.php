<?php

namespace src\vendor\smarty\smarty\src\Template;

use src\vendor\smarty\smarty\src\Smarty;
use src\vendor\smarty\smarty\src\Template;
use src\vendor\smarty\smarty\src\Exception;
use src\vendor\smarty\smarty\src\Template\Source;

/**
 * Smarty Config Resource Data Object
 * Metadata Container for Config Files
 *
 * @author     Uwe Tews
 */
class Config extends Source {

	/**
	 * Flag that source is a config file
	 *
	 * @var bool
	 */
	public $isConfig = true;

	/**
	 * @var array
	 */
	static protected $_incompatible_resources = ['extends' => true];

	public function createCompiler(): \src\vendor\smarty\smarty\src\Compiler\BaseCompiler {
		return new \src\vendor\smarty\smarty\src\Compiler\Configfile($this->smarty);
	}

	protected static function getDefaultHandlerFunc(Smarty $smarty) {
		return $smarty->default_config_handler_func;
	}
}
