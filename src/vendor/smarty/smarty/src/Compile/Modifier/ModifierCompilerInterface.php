<?php

namespace src\vendor\smarty\smarty\src\Compile\Modifier;

interface ModifierCompilerInterface {

	/**
	 * Compiles code for the modifier
	 *
	 * @param array $params array with attributes from parser
	 * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler compiler object
	 *
	 * @return string compiled code
	 * @throws \src\vendor\smarty\smarty\src\CompilerException
	 */
	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler);
}