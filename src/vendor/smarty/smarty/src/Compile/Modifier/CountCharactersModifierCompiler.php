<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty count_characters modifier plugin
 * Type:     modifier
 * Name:     count_characters
 * Purpose:  count the number of characters in a text
 *
 * @author Uwe Tews
 */

class CountCharactersModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		if (!isset($params[ 1 ]) || $params[ 1 ] !== 'true') {
			return 'preg_match_all(\'/[^\s]/' . \src\vendor\smarty\smarty\src\Smarty::$_UTF8_MODIFIER . '\',' . $params[ 0 ] . ', $tmp)';
		}
		return 'mb_strlen((string) ' . $params[ 0 ] . ', \'' . addslashes(\src\vendor\smarty\smarty\src\Smarty::$_CHARSET) . '\')';
	}

}