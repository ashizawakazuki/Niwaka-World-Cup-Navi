<?php
/**
 * Smarty Internal Plugin Compile Capture
 * Compiles the {capture} tag
 *


 * @author     Uwe Tews
 */

namespace src\vendor\smarty\smarty\src\Compile\Tag;

use src\vendor\smarty\smarty\src\Compile\Base;

/**
 * Smarty Internal Plugin Compile Captureclose Class
 *


 */
class CaptureClose extends Base {

	/**
	 * Compiles code for the {/capture} tag
	 *
	 * @param array $args array with attributes from parser
	 * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler compiler object
	 * @param null $parameter
	 *
	 * @return string compiled code
	 */
	public function compile($args, \src\vendor\smarty\smarty\src\Compiler\Template $compiler, $parameter = [], $tag = null, $function = null): string
	{

		if (array_pop($compiler->_cache['capture_stack'])) {
			// pop the virtual {nocache} tag from the stack.
			$compiler->closeTag('nocache');
			$compiler->tag_nocache = true;
		}

		return "<?php \$_smarty_tpl->getSmarty()->getRuntime('Capture')->close(\$_smarty_tpl);?>";
	}
}
