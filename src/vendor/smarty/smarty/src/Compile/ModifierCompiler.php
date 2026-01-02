<?php
/**
 * Smarty Internal Plugin Compile Modifier
 * Compiles code for modifier execution
 *


 * @author     Uwe Tews
 */

namespace src\vendor\smarty\smarty\src\Compile;

use src\vendor\smarty\smarty\src\Compile\Base;
use src\vendor\smarty\smarty\src\Compiler\Template;
use src\vendor\smarty\smarty\src\CompilerException;

/**
 * Smarty Internal Plugin Compile Modifier Class
 *


 */
class ModifierCompiler extends Base {

	/**
	 * Compiles code for modifier execution
	 *
	 * @param array $args array with attributes from parser
	 * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler compiler object
	 * @param array $parameter array with compilation parameter
	 *
	 * @return string compiled code
	 * @throws \src\vendor\smarty\smarty\src\CompilerException
	 * @throws \src\vendor\smarty\smarty\src\Exception
	 */
	public function compile($args, \src\vendor\smarty\smarty\src\Compiler\Template $compiler, $parameter = [], $tag = null, $function = null): string
	{

		$output = $parameter['value'];

		// loop over list of modifiers
		foreach ($parameter['modifierlist'] as $single_modifier) {
			/* @var string $modifier */
			$modifier = $single_modifier[0];


			$modifier_params = array_values($single_modifier);

			$modifier_params[0] = $output;
			$params = implode(',', $modifier_params);

			if (!is_object($compiler->getSmarty()->security_policy)
				|| $compiler->getSmarty()->security_policy->isTrustedModifier($modifier, $compiler)
			) {

				if ($handler = $compiler->getModifierCompiler($modifier)) {
					$output = $handler->compile($modifier_params, $compiler);
				} elseif ($compiler->getSmarty()->getModifierCallback($modifier)) {
					$output = sprintf(
							'$_smarty_tpl->getSmarty()->getModifierCallback(%s)(%s)',
							var_export($modifier, true),
							$params
						);
				} elseif ($callback = $compiler->getPluginFromDefaultHandler($modifier, \src\vendor\smarty\smarty\src\Smarty::PLUGIN_MODIFIERCOMPILER)) {
					$output = (new \src\vendor\smarty\smarty\src\Compile\Modifier\BCPluginWrapper($callback))->compile($modifier_params, $compiler);
				} elseif ($function = $compiler->getPluginFromDefaultHandler($modifier, \src\vendor\smarty\smarty\src\Smarty::PLUGIN_MODIFIER)) {
					if (!is_array($function)) {
						$output = "{$function}({$params})";
					} else {
						$operator = is_object($function[0]) ? '->' : '::';
						$output =  $function[0] . $operator . $function[1] . '(' . $params . ')';
					}
				}  else {
					$compiler->trigger_template_error("unknown modifier '{$modifier}'", null, true);
				}
			}
		}
		return (string)$output;
	}

	/**
	 * Wether this class will be able to compile the given modifier.
	 * @param string $modifier
	 * @param Template $compiler
	 *
	 * @return bool
	 * @throws CompilerException
	 */
	public function canCompileForModifier(string $modifier, \src\vendor\smarty\smarty\src\Compiler\Template $compiler): bool {
		return $compiler->getModifierCompiler($modifier)
			|| $compiler->getSmarty()->getModifierCallback($modifier)
			|| $compiler->getPluginFromDefaultHandler($modifier, \src\vendor\smarty\smarty\src\Smarty::PLUGIN_MODIFIERCOMPILER)
			|| $compiler->getPluginFromDefaultHandler($modifier, \src\vendor\smarty\smarty\src\Smarty::PLUGIN_MODIFIER);
	}
}
