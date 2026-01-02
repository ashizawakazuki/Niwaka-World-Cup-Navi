<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;
use src\vendor\smarty\smarty\src\CompilerException;

/**
 * Smarty isset modifier plugin
 */
class IssetModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {

		$params = array_filter($params, function($v) { return !empty($v); });

		if (count($params) < 1) {
			throw new CompilerException("Invalid number of arguments for isset. isset expects at least one parameter.");
		}

		$tests = [];
		foreach ($params as $param) {
			$tests[] = 'null !== (' . $param . ' ?? null)';
		}
		return '(' . implode(' && ', $tests) . ')';
	}

}