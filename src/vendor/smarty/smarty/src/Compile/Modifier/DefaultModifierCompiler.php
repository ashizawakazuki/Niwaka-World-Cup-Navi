<?php
namespace src\vendor\smarty\smarty\src\Compile\Modifier;
use src\vendor\smarty\smarty\src\Compile\Modifier\Base;

/**
 * Smarty default modifier plugin
 * Type:     modifier
 * Name:     default
 * Purpose:  designate default value for empty variables
 *
 * @author Uwe Tews
 */

class DefaultModifierCompiler extends Base {

	public function compile($params, \src\vendor\smarty\smarty\src\Compiler\Template $compiler) {
		$output = $params[ 0 ];
		if (!isset($params[ 1 ])) {
			$params[ 1 ] = "''";
		}
		array_shift($params);
		foreach ($params as $param) {
			$output = '(($tmp = ' . $output . ' ?? null)===null||$tmp===\'\' ? ' . $param . ' ?? null : $tmp)';
		}
		return $output;
	}

}