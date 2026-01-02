<?php

namespace src\vendor\smarty\smarty\src\Compile\Modifier;

use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty cat modifier plugin
 * Type:     modifier
 * Name:     cat
 * Date:     Feb 24, 2003
 * Purpose:  catenate a value to a variable
 * Input:    string to catenate
 * Example:  {$var|cat:"foo"}
 *
 * @author Uwe Tews
 */

class CatModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		return '(' . implode(').(', $params) . ')';
	}

}


