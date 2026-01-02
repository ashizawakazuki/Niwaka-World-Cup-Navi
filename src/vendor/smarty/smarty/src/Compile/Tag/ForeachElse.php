<?php

namespace src\vendor\smarty\smarty\src\Compile\Tag;

use src\vendor\smarty\smarty\src\Compile\Base;

/**
 * Smarty Internal Plugin Compile Foreachelse Class
 *


 */
class ForeachElse extends Base {

	/**
	 * Compiles code for the {foreachelse} tag
	 *
	 * @param array $args array with attributes from parser
	 * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler compiler object
	 *
	 * @return string compiled code
	 */
	public function compile($args, \src\vendor\smarty\smarty\src\Compiler\Template $compiler, $parameter = [], $tag = null, $function = null): string
	{

		[$openTag, $nocache_pushed, $localVariablePrefix, $item, $restore] = $this->closeTag($compiler, ['foreach']);
		$this->openTag($compiler, 'foreachelse', ['foreachelse', $nocache_pushed, $localVariablePrefix, $item, false]);
		$output = "<?php\n";
		if ($restore) {
			$output .= "\$_smarty_tpl->setVariable('{$item}', {$localVariablePrefix}Backup);\n";
		}
		$output .= "}\nif ({$localVariablePrefix}DoElse) {\n?>";
		return $output;
	}
}