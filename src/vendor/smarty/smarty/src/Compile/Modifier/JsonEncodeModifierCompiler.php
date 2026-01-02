<?php

namespace src\vendor\smarty\smarty\src\Compile\Modifier;

use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty json_encode modifier plugin
 */
class JsonEncodeModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		return 'json_encode(' . $params[0] . (isset($params[1]) ? ', (int) ' . $params[1] : '') . ')';
	}

}