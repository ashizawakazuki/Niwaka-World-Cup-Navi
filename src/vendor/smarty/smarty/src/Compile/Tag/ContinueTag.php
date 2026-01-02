<?php
/**
 * Smarty Internal Plugin Compile Continue
 * Compiles the {continue} tag
 *


 * @author     Uwe Tews
 */

namespace src\vendor\smarty\smarty\src\Compile\Tag;

use src\vendor\smarty\smarty\src\Compile\Tag\BreakTag;

/**
 * Smarty Internal Plugin Compile Continue Class
 *


 */
class ContinueTag extends BreakTag {

	/**
	 * Tag name
	 *
	 * @var string
	 */
	protected $tag = 'continue';
}
