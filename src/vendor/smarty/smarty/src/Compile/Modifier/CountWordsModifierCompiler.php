<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty count_words modifier plugin
 * Type:     modifier
 * Name:     count_words
 * Purpose:  count the number of words in a text
 *
 * @author Uwe Tews
 */

class CountWordsModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		// expression taken from http://de.php.net/manual/en/function.str-word-count.php#85592
		return 'preg_match_all(\'/\p{L}[\p{L}\p{Mn}\p{Pd}\\\'\x{2019}]*/' . \src\vendor\smarty\smarty\src\Smarty::$_UTF8_MODIFIER . '\', ' .
			$params[ 0 ] . ', $tmp)';
	}

}