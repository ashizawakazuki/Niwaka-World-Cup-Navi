<?php

namespace src\vendor\smarty\smarty\src\FunctionHandler;

use src\vendor\smarty\smarty\src\FunctionHandler\Base;
use src\vendor\smarty\smarty\src\Template;

class BCPluginWrapper extends Base {

	private $callback;

	public function __construct($callback, bool $cacheable = true) {
		$this->callback = $callback;
		$this->cacheable = $cacheable;
	}

	public function handle($params, Template $template) {
		$func = $this->callback;
		return $func($params, $template);
	}

}