<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty indent modifier plugin
 * Type:     modifier
 * Name:     indent
 * Purpose:  indent lines of text
 *
 * @author Uwe Tews
 */

class IndentModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		if (!isset($params[ 1 ])) {
			$params[ 1 ] = 4;
		}
		if (!isset($params[ 2 ])) {
			$params[ 2 ] = "' '";
		}
		return 'preg_replace(\'!^!m\',str_repeat(' . $params[ 2 ] . ',' . $params[ 1 ] . '),' . $params[ 0 ] . ')';
	}

}