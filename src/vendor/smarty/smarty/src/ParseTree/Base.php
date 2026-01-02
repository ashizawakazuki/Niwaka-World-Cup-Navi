<?php

namespace src\vendor\smarty\smarty\src\ParseTree;

/**
 * Smarty Internal Plugin Templateparser ParseTree
 * These are classes to build parsetree in the template parser
 *


 * @author     Thue Kristensen
 * @author     Uwe Tews
 */

/**


 * @ignore
 */
abstract class Base
{
    /**
     * Buffer content
     *
     * @var mixed
     */
    public $data;

    /**
     * Subtree array
     *
     * @var array
     */
    public $subtrees = array();

    /**
     * Return buffer
     *
     * @param \src\vendor\smarty\smarty\src\Parser\TemplateParser $parser
     *
     * @return string buffer content
     */
    abstract public function to_smarty_php(\src\vendor\smarty\smarty\src\Parser\TemplateParser $parser);

}
