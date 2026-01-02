<?php
/**
 * Smarty Internal Plugin Compile Foreach
 * Compiles the {foreach} {foreachelse} {/foreach} tags
 *


 * @author     Uwe Tews
 */

namespace src\vendor\smarty\smarty\src\Compile\Tag;

use src\vendor\smarty\smarty\src\Compile\Base;

/**
 * Smarty Internal Plugin Compile Foreachclose Class
 *


 */
class ForeachClose extends Base {

	/**
	 * Compiles code for the {/foreach} tag
	 *
	 * @param array $args array with attributes from parser
	 * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler compiler object
	 *
	 * @return string compiled code
	 * @throws \src\vendor\smarty\smarty\src\CompilerException
	 */
	public function compile($args, \src\vendor\smarty\smarty\src\Compiler\Template $compiler, $parameter = [], $tag = null, $function = null): string
	{
		$compiler->loopNesting--;

		[$openTag, $nocache_pushed, $localVariablePrefix, $item, $restore] = $this->closeTag($compiler, ['foreach', 'foreachelse']);

		if ($nocache_pushed) {
			// pop the pushed virtual nocache tag
			$this->closeTag($compiler, 'nocache');
			$compiler->tag_nocache = true;
		}

		$output = "<?php\n";
		if ($restore) {
			$output .= "\$_smarty_tpl->setVariable('{$item}', {$localVariablePrefix}Backup);\n";
		}
		$output .= "}\n";
		/* @var \src\vendor\smarty\smarty\src\Compile\Tag\ForeachTag $foreachCompiler */
		$foreachCompiler = $compiler->getTagCompiler('foreach');
		$output .= $foreachCompiler->compileRestore(1);
		$output .= "?>";
		return $output;
	}
}
