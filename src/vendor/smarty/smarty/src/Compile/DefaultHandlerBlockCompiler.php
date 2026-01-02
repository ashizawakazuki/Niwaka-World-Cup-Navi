<?php

namespace src\vendor\smarty\smarty\src\Compile;

use src\vendor\smarty\smarty\src\Compile\BlockCompiler;

class DefaultHandlerBlockCompiler extends BlockCompiler {
	/**
	 * @inheritDoc
	 */
	protected function getIsCallableCode($tag, $function): string {
		return "\$_smarty_tpl->getSmarty()->getRuntime('DefaultPluginHandler')->hasPlugin(" .
			var_export($function, true) . ", 'block')";
	}

	/**
	 * @inheritDoc
	 */
	protected function getFullCallbackCode($tag, $function): string {
		return "\$_smarty_tpl->getSmarty()->getRuntime('DefaultPluginHandler')->getCallback(" .
			var_export($function, true) . ", 'block')";
	}

	/**
	 * @inheritDoc
	 */
	protected function blockIsCacheable(\src\vendor\smarty\smarty\src\Smarty $smarty, $function): bool {
		return true;
	}

}