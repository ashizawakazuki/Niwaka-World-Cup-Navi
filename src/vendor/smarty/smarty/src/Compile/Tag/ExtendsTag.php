<?php
/**
 * Smarty Internal Plugin Compile extend
 * Compiles the {extends} tag
 *


 * @author     Uwe Tews
 */

namespace src\vendor\smarty\smarty\src\Compile\Tag;

use src\vendor\smarty\smarty\src\Compile\Tag\Inheritance;
use src\vendor\smarty\smarty\src\Resource\BasePlugin;

/**
 * Smarty Internal Plugin Compile extend Class
 *


 */
class ExtendsTag extends Inheritance {

	/**
	 * Attribute definition: Overwrites base class.
	 *
	 * @var array
	 * @see BasePlugin
	 */
	protected $required_attributes = ['file'];

	/**
	 * Array of names of optional attribute required by tag
	 * use array('_any') if there is no restriction of attributes names
	 *
	 * @var array
	 */
	protected $optional_attributes = [];

	/**
	 * Attribute definition: Overwrites base class.
	 *
	 * @var array
	 * @see BasePlugin
	 */
	protected $shorttag_order = ['file'];

	/**
	 * Compiles code for the {extends} tag extends: resource
	 *
	 * @param array $args array with attributes from parser
	 * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler compiler object
	 *
	 * @return string compiled code
	 * @throws \src\vendor\smarty\smarty\src\CompilerException
	 * @throws \src\vendor\smarty\smarty\src\Exception
	 */
	public function compile($args, \src\vendor\smarty\smarty\src\Compiler\Template $compiler, $parameter = [], $tag = null, $function = null): string
	{
		// check and get attributes
		$_attr = $this->getAttributes($compiler, $args);
		if ($_attr['nocache'] === true) {
			$compiler->trigger_template_error('nocache option not allowed', $compiler->getParser()->lex->line - 1);
		}
		if (strpos($_attr['file'], '$_tmp') !== false) {
			$compiler->trigger_template_error('illegal value for file attribute', $compiler->getParser()->lex->line - 1);
		}
		// add code to initialize inheritance
		$this->registerInit($compiler, true);
		$this->compileEndChild($compiler, $_attr['file']);
		return '';
	}

	/**
	 * Add code for inheritance endChild() method to end of template
	 *
	 * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler
	 * @param null|string $template optional inheritance parent template
	 *
	 * @throws \src\vendor\smarty\smarty\src\CompilerException
	 * @throws \src\vendor\smarty\smarty\src\Exception
	 */
	private function compileEndChild(\src\vendor\smarty\smarty\src\Compiler\Template $compiler, $template = null) {
		$compiler->getParser()->template_postfix[] = new \src\vendor\smarty\smarty\src\ParseTree\Tag(
			$compiler->getParser(),
			'<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl' .
			(isset($template) ?	", {$template}, \$_smarty_current_dir" : '') . ");\n?>"
		);
	}
}
