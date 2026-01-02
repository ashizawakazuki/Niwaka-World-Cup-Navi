<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty from_charset modifier plugin
 * Type:     modifier
 * Name:     from_charset
 * Purpose:  convert character encoding from $charset to internal encoding
 *
 * @author Rodney Rehm
 */

class FromCharsetModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		if (!isset($params[ 1 ])) {
			$params[ 1 ] = '"ISO-8859-1"';
		}
		return 'mb_convert_encoding(' . $params[ 0 ] . ', "' . addslashes(\src\vendor\smarty\smarty\src\Smarty::$_CHARSET) . '", ' . $params[ 1 ] . ')';
	}

}