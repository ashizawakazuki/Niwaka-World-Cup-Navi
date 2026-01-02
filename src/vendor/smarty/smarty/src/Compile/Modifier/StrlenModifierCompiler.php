<?php

namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty strlen modifier plugin
 * Type:     modifier
 * Name:     strlen
 * Purpose:  return the length of the given string
 *
 */

class StrlenModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		return 'strlen((string) ' . $params[0] . ')';
	}

}