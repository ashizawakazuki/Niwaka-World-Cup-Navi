<?php

namespace src\vendor\smarty\smarty\src\Compile\Modifier;

use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty substr modifier plugin
 */
class SubstrModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		return 'substr((string) ' . $params[0] . ', (int) ' . $params[1] .
			(isset($params[2]) ? ', (int) ' . $params[2] : '') . ')';
	}

}