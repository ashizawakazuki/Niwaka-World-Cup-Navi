<?php

namespace src\vendor\smarty\smarty\src\Compile\Tag;

use src\vendor\smarty\smarty\src\Compile\Base;

/**
 * Smarty Internal Plugin Compile Sectionelse Class
 *


 */
class SectionElse extends Base {

	/**
	 * Compiles code for the {sectionelse} tag
	 *
	 * @param array $args array with attributes from parser
	 * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler compiler object
	 *
	 * @return string compiled code
	 */
	public function compile($args, \src\vendor\smarty\smarty\src\Compiler\Template $compiler, $parameter = [], $tag = null, $function = null): string
	{
		[$openTag, $nocache_pushed] = $this->closeTag($compiler, ['section']);
		$this->openTag($compiler, 'sectionelse', ['sectionelse', $nocache_pushed]);
		return "<?php }} else {\n ?>";
	}
}