<?php

namespace src\vendor\smarty\smarty\src;

/**
 * Smarty exception class
 */
class Exception extends \Exception {

	/**
	 * @return string
	 */
	public function __toString() {
		return ' --> Smarty: ' . $this->message . ' <-- ';
	}
}
