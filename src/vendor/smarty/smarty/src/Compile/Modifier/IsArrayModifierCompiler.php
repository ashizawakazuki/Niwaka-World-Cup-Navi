<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;
use src\vendor\smarty\smarty\src\CompilerException;

/**
 * Smarty is_array modifier plugin
 */
class IsArrayModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {

		if (count($params) !== 1) {
			throw new CompilerException("Invalid number of arguments for is_array. is_array expects exactly 1 parameter.");
		}

		return 'is_array(' . $params[0] . ')';
	}

}