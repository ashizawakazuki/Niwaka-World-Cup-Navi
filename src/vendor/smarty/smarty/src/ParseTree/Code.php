<?php

namespace src\vendor\smarty\smarty\src\ParseTree;

use src\vendor\smarty\smarty\src\ParseTree\Base;

/**
 * Smarty Internal Plugin Templateparser Parse Tree
 * These are classes to build parse trees in the template parser
 *


 * @author     Thue Kristensen
 * @author     Uwe Tews
 */

/**
 * Code fragment inside a tag .
 *


 * @ignore
 */
class Code extends Base
{
    /**
     * Create parse tree buffer for code fragment
     *
     * @param string $data content
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Return buffer content in parentheses
     *
     * @param \src\vendor\smarty\smarty\src\Parser\TemplateParser $parser
     *
     * @return string content
     */
    public function to_smarty_php(\src\vendor\smarty\smarty\src\Parser\TemplateParser $parser)
    {
        return sprintf('(%s)', $this->data);
    }
}
