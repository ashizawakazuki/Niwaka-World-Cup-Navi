<?php
/**
 * Smarty Internal Plugin Compile While
 * Compiles the {while} tag
 *


 * @author     Uwe Tews
 */

namespace src\vendor\smarty\smarty\src\Compile\Tag;

use src\vendor\smarty\smarty\src\Compile\Base;

/**
 * Smarty Internal Plugin Compile Whileclose Class
 *


 */
class WhileClose extends Base {

	/**
	 * Compiles code for the {/while} tag
	 *
	 * @param array $args array with attributes from parser
	 * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler compiler object
	 *
	 * @return string compiled code
	 */
	public function compile($args, \src\vendor\smarty\smarty\src\Compiler\Template $compiler, $parameter = [], $tag = null, $function = null): string
	{
		$compiler->loopNesting--;

		$nocache_pushed = $this->closeTag($compiler, ['while']);

		if ($nocache_pushed) {
			// pop the pushed virtual nocache tag
			$this->closeTag($compiler, 'nocache');
			$compiler->tag_nocache = true;
		}

		return "<?php }?>\n";
	}
}
