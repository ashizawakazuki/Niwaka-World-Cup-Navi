<?php
/**
 * Smarty Resource Plugin
 *


 * @author     Rodney Rehm
 */

namespace src\vendor\smarty\smarty\src\Resource;

use src\vendor\smarty\smarty\src\Template;
use src\vendor\smarty\smarty\src\Resource\BasePlugin;

/**
 * Smarty Resource Plugin
 * Base implementation for resource plugins that don't compile cache
 *


 */
abstract class RecompiledPlugin extends BasePlugin {

	/**
	 * Flag that it's an recompiled resource
	 *
	 * @var bool
	 */
	public $recompiled = true;

	/**
	 * Flag if resource does allow compilation
	 *
	 * @return bool
	 */
	public function supportsCompiledTemplates(): bool {
		return false;
	}

	/*
	   * Disable timestamp checks for recompiled resource.
	   *
	   * @return bool
	   */
	/**
	 * @return bool
	 */
	public function checkTimestamps() {
		return false;
	}
}
