<?php

namespace src\vendor\smarty\smarty\src\FunctionHandler;

use src\vendor\smarty\smarty\src\Template;

interface FunctionHandlerInterface {
	public function handle($params, Template $template);
	public function isCacheable(): bool;
}