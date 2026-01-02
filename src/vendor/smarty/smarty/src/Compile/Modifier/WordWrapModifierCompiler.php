<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty wordwrap modifier plugin
 * Type:     modifier
 * Name:     wordwrap
 * Purpose:  wrap a string of text at a given length
 *
 * @author Uwe Tews
 */

class WordWrapModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		if (!isset($params[ 1 ])) {
			$params[ 1 ] = 80;
		}
		if (!isset($params[ 2 ])) {
			$params[ 2 ] = '"\n"';
		}
		if (!isset($params[ 3 ])) {
			$params[ 3 ] = 'false';
		}
		return 'smarty_mb_wordwrap(' . $params[ 0 ] . ',' . $params[ 1 ] . ',' . $params[ 2 ] . ',' . $params[ 3 ] . ')';
	}

}