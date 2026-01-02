<?php

namespace src\vendor\smarty\smarty\src\Extension;

use src\vendor\smarty\smarty\src\Extension\ExtensionInterface;
use src\vendor\smarty\smarty\src\FunctionHandler\FunctionHandlerInterface;

class Base implements ExtensionInterface {

	public function getTagCompiler(string $tag): ?\src\vendor\smarty\smarty\src\Compile\CompilerInterface {
		return null;
	}

	public function getModifierCompiler(string $modifier): ?\src\vendor\smarty\smarty\src\Compile\Modifier\ModifierCompilerInterface {
		return null;
	}

	public function getFunctionHandler(string $functionName): ?\src\vendor\smarty\smarty\src\FunctionHandler\FunctionHandlerInterface {
		return null;
	}

	public function getBlockHandler(string $blockTagName): ?\src\vendor\smarty\smarty\src\BlockHandler\BlockHandlerInterface {
		return null;
	}

	public function getModifierCallback(string $modifierName) {
		return null;
	}

	public function getPreFilters(): array {
		return [];
	}

	public function getPostFilters(): array {
		return [];
	}

	public function getOutputFilters(): array {
		return [];
	}

}