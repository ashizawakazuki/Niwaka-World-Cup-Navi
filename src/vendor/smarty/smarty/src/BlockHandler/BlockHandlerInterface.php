<?php

namespace src\vendor\smarty\smarty\src\BlockHandler;

use src\vendor\smarty\smarty\src\Template;

interface BlockHandlerInterface {
	public function handle($params, $content, Template $template, &$repeat);
	public function isCacheable(): bool;
}