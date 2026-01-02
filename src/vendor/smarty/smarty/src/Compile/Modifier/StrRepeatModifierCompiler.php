<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty str_repeat modifier plugin
 * Type:     modifier
 * Name:     str_repeat
 * Purpose:  returns string repeated times times
 *
 */

class StrRepeatModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		return 'str_repeat((string) ' . $params[0] . ', (int) ' . $params[1] . ')';
	}

}