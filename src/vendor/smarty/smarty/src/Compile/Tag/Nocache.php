<?php

namespace src\vendor\smarty\smarty\src\Compile\Tag;

use src\vendor\smarty\smarty\src\Compile\Base;

/**
 * Smarty Internal Plugin Compile Nocache Class
 *


 */
class Nocache extends Base {

	/**
	 * Array of names of valid option flags
	 *
	 * @var array
	 */
	protected $option_flags = [];

	/**
	 * Compiles code for the {nocache} tag
	 * This tag does not generate compiled output. It only sets a compiler flag.
	 *
	 * @param array $args array with attributes from parser
	 * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler compiler object
	 *
	 * @return string
	 */
	public function compile($args, \src\vendor\smarty\smarty\src\Compiler\Template $compiler, $parameter = [], $tag = null, $function = null): string
	{
		$this->openTag($compiler, 'nocache');
		return '';
	}
}