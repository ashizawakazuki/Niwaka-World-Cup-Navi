<?php
/**
 * Smarty Internal Plugin Compile Section
 * Compiles the {section} {sectionelse} {/section} tags
 *


 * @author     Uwe Tews
 */

namespace src\vendor\smarty\smarty\src\Compile\Tag;

use src\vendor\smarty\smarty\src\Compile\Base;

/**
 * Smarty Internal Plugin Compile Sectionclose Class
 */
class SectionClose extends Base {

	/**
	 * Compiles code for the {/section} tag
	 *
	 * @param array $args array with attributes from parser
	 * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler compiler object
	 *
	 * @return string compiled code
	 */
	public function compile($args, \src\vendor\smarty\smarty\src\Compiler\Template $compiler, $parameter = [], $tag = null, $function = null): string
	{
		$compiler->loopNesting--;

		[$openTag, $nocache_pushed] = $this->closeTag($compiler, ['section', 'sectionelse']);

		if ($nocache_pushed) {
			// pop the pushed virtual nocache tag
			$this->closeTag($compiler, 'nocache');
		}

		$output = "<?php\n";
		if ($openTag === 'sectionelse') {
			$output .= "}\n";
		} else {
			$output .= "}\n}\n";
		}
		$output .= '?>';
		return $output;
	}
}
