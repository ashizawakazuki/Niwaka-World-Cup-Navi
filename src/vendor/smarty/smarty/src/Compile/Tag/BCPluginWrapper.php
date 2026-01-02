<?php

namespace src\vendor\smarty\smarty\src\Compile\Tag;

use src\vendor\smarty\smarty\src\Compile\Base;

class BCPluginWrapper extends Base {

	/**
	 * Attribute definition: Overwrites base class.
	 *
	 * @var array
	 * @see Smarty_Internal_CompileBase
	 */
	public $optional_attributes = array('_any');

	private $callback;

	public function __construct($callback, bool $cacheable = true) {
		$this->callback = $callback;
		$this->cacheable = $cacheable;
	}

	/**
	 * @inheritDoc
	 */
	public function compile($args, \src\vendor\smarty\smarty\src\Compiler\Template $compiler, $parameter = [], $tag = null, $function = null): string
	{
		return call_user_func($this->callback, $this->getAttributes($compiler, $args), $compiler->getSmarty());
	}
}