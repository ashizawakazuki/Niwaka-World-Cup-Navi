<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty upper modifier plugin
 * Type:     modifier
 * Name:     lower
 * Purpose:  convert string to uppercase
 *
 * @author Uwe Tews
 */

class UpperModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		return 'mb_strtoupper((string) ' . $params[ 0 ] . ' ?? \'\', \'' . addslashes(\src\vendor\smarty\smarty\src\Smarty::$_CHARSET) . '\')';
	}

}
