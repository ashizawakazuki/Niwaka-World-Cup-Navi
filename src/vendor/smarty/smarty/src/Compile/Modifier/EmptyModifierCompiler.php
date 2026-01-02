<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;
use src\vendor\smarty\smarty\src\CompilerException;

/**
 * Smarty empty modifier plugin
 */
class EmptyModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {

		if (count($params) !== 1) {
			throw new CompilerException("Invalid number of arguments for empty. empty expects exactly 1 parameter.");
		}

		return 'empty(' . $params[0] . ')';
	}

}