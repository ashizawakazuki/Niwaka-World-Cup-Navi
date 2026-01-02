<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty string_format modifier plugin
 * Type:     modifier
 * Name:     string_format
 * Purpose:  format strings via sprintf
 *
 * @author Uwe Tews
 */

class StringFormatModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		return 'sprintf(' . $params[ 1 ] . ',' . $params[ 0 ] . ')';
	}

}