<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty noprint modifier plugin
 * Type:     modifier
 * Name:     noprint
 * Purpose:  return an empty string
 *
 * @author Uwe Tews
 */

class NoPrintModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		return "''";
	}

}