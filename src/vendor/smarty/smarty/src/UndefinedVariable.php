<?php

namespace src\vendor\smarty\smarty\src;

use src\vendor\smarty\smarty\src\Variable;

/**
 * class for undefined variable object
 * This class defines an object for undefined variable handling
 */
class UndefinedVariable extends Variable {

	/**
	 * Always returns an empty string.
	 *
	 * @return string
	 */
	public function __toString() {
		return '';
	}
}
