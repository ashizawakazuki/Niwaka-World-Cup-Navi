<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty lower modifier plugin
 * Type:     modifier
 * Name:     lower
 * Purpose:  convert string to lowercase
 *
 * @author Monte Ohrt <monte at ohrt dot com>
 * @author Uwe Tews
 */

class LowerModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		return 'mb_strtolower((string) ' . $params[ 0 ] . ', \'' . addslashes(\src\vendor\smarty\smarty\src\Smarty::$_CHARSET) . '\')';
	}

}