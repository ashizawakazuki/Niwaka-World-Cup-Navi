<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;

use src\vendor\smarty\smarty\src\Compile\Modifier\Base;
use src\vendor\smarty\smarty\src\Exception;

/**
 * Smarty raw modifier plugin
 * Type:     modifier
 * Name:     raw
 * Purpose:  when escaping is enabled by default, generates a raw output of a variable
 *
 * @author Amaury Bouchard
 */

class RawModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		$compiler->setRawOutput(true);
		return ($params[0]);
	}
}
