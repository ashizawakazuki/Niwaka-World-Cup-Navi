<?php

namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty round modifier plugin
 * Type:     modifier
 * Name:     round
 * Purpose:  Returns the rounded value of num to specified precision (number of digits after the decimal point)
 *
 */

class RoundModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		return 'round((float) ' . $params[0] . ', (int) ' . ($params[1] ?? 0) . ', (int) ' . ($params[2] ?? PHP_ROUND_HALF_UP) . ')';
	}

}