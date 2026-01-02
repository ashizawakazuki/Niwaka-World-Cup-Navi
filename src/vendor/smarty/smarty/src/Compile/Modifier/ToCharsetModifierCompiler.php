<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty to_charset modifier plugin
 * Type:     modifier
 * Name:     to_charset
 * Purpose:  convert character encoding from internal encoding to $charset
 *
 * @author Rodney Rehm
 */

class ToCharsetModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		if (!isset($params[ 1 ])) {
			$params[ 1 ] = '"ISO-8859-1"';
		}
		return 'mb_convert_encoding(' . $params[ 0 ] . ', ' . $params[ 1 ] . ', "' . addslashes(\src\vendor\smarty\smarty\src\Smarty::$_CHARSET) . '")';
	}

}