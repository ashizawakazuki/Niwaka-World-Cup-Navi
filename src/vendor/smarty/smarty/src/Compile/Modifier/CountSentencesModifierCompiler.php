<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty count_sentences modifier plugin
 * Type:     modifier
 * Name:     count_sentences
 * Purpose:  count the number of sentences in a text
 *
 * @author Uwe Tews
 */

class CountSentencesModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		// find periods, question marks, exclamation marks with a word before but not after.
		return 'preg_match_all("#\w[\.\?\!](\W|$)#S' . \src\vendor\smarty\smarty\src\Smarty::$_UTF8_MODIFIER . '", ' . $params[ 0 ] . ', $tmp)';
	}

}