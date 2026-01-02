<?php
/**
 * Smarty Internal Plugin Compile Rdelim
 * Compiles the {rdelim} tag
 *


 * @author     Uwe Tews
 */

namespace src\vendor\smarty\smarty\src\Compile\Tag;

use src\vendor\smarty\smarty\src\Compile\Tag\Ldelim;

/**
 * Smarty Internal Plugin Compile Rdelim Class
 *


 */
class Rdelim extends Ldelim {

	/**
	 * Compiles code for the {rdelim} tag
	 * This tag does output the right delimiter.
	 *
	 * @param array $args array with attributes from parser
	 * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler compiler object
	 *
	 * @return string compiled code
	 * @throws \src\vendor\smarty\smarty\src\CompilerException
	 */
	public function compile($args, \src\vendor\smarty\smarty\src\Compiler\Template $compiler, $parameter = [], $tag = null, $function = null): string
	{
		parent::compile($args, $compiler);
		return $compiler->getTemplate()->getRightDelimiter();
	}
}
