<?php

namespace src\vendor\smarty\smarty\src\Filter;

use src\vendor\smarty\smarty\src\Filter\FilterInterface;

class FilterPluginWrapper implements FilterInterface {

	private $callback;

	public function __construct($callback) {
		$this->callback = $callback;
	}
	public function filter($code, \src\vendor\smarty\smarty\src\Template $template) {
		return call_user_func($this->callback, $code, $template);
	}
}