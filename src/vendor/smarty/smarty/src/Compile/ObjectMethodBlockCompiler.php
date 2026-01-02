<?php
/**
 * Smarty Internal Plugin Compile Object Block Function
 * Compiles code for registered objects as block function
 *


 * @author     Uwe Tews
 */

namespace src\vendor\smarty\smarty\src\Compile;

use src\vendor\smarty\smarty\src\Compile\BlockCompiler;

/**
 * Smarty Internal Plugin Compile Object Block Function Class
 *


 */
class ObjectMethodBlockCompiler extends BlockCompiler {

	/**
	 * @inheritDoc
	 */
	protected function getIsCallableCode($tag, $function): string {
		$callbackObject = "\$_smarty_tpl->getSmarty()->registered_objects['{$tag}'][0]";
		return "(isset({$callbackObject}) && is_callable(array({$callbackObject}, '{$function}')))";
	}

	/**
	 * @inheritDoc
	 */
	protected function getFullCallbackCode($tag, $function): string {
		$callbackObject = "\$_smarty_tpl->getSmarty()->registered_objects['{$tag}'][0]";
		return "{$callbackObject}->{$function}";
	}

	/**
	 * @inheritDoc
	 */
	protected function blockIsCacheable(\src\vendor\smarty\smarty\src\Smarty $smarty, $function): bool {
		return true;
	}

}
