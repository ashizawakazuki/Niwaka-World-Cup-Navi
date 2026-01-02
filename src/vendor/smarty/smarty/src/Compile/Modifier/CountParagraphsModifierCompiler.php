<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty count_paragraphs modifier plugin
 * Type:     modifier
 * Name:     count_paragraphs
 * Purpose:  count the number of paragraphs in a text
 *
 * @author Uwe Tews
 */

class CountParagraphsModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		// count \r or \n characters
		return '(preg_match_all(\'#[\r\n]+#\', ' . $params[ 0 ] . ', $tmp)+1)';
	}

}