<?php
/**
 * Smarty Internal Plugin Compile Setfilter
 * Compiles code for setfilter tag
 *


 * @author     Uwe Tews
 */

namespace src\vendor\smarty\smarty\src\Compile\Tag;

use src\vendor\smarty\smarty\src\Compile\Base;

/**
 * Smarty Internal Plugin Compile Setfilterclose Class
 *


 */
class SetfilterClose extends Base {

	/**
	 * Compiles code for the {/setfilter} tag
	 * This tag does not generate compiled output. It resets variable filter.
	 *
	 * @param array $args array with attributes from parser
	 * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler compiler object
	 *
	 * @return string compiled code
	 */
	public function compile($args, \src\vendor\smarty\smarty\src\Compiler\Template $compiler, $parameter = [], $tag = null, $function = null): string
	{
		$this->getAttributes($compiler, $args);

		// reset variable filter to previous state
		$compiler->getSmarty()->setDefaultModifiers(
			count($compiler->variable_filter_stack) ? array_pop($compiler->variable_filter_stack) : []
		);

		return '';
	}
}
