<?php

namespace src\vendor\smarty\smarty\src\ParseTree;

use src\vendor\smarty\smarty\src\ParseTree\Base;

/**
 * Smarty Internal Plugin Templateparser Parse Tree
 * These are classes to build parse tree in the template parser
 *


 * @author     Thue Kristensen
 * @author     Uwe Tews
 */

/**
 * A complete smarty tag.
 *


 * @ignore
 */
class Tag extends Base
{
    /**
     * Saved block nesting level
     *
     * @var int
     */
    public $saved_block_nesting;

    /**
     * Create parse tree buffer for Smarty tag
     *
     * @param \src\vendor\smarty\smarty\src\Parser\TemplateParser $parser parser object
     * @param string                          $data   content
     */
    public function __construct(\src\vendor\smarty\smarty\src\Parser\TemplateParser $parser, $data)
    {
        $this->data = $data;
        $this->saved_block_nesting = $parser->block_nesting_level;
    }

    /**
     * Return buffer content
     *
     * @param \src\vendor\smarty\smarty\src\Parser\TemplateParser $parser
     *
     * @return string content
     */
    public function to_smarty_php(\src\vendor\smarty\smarty\src\Parser\TemplateParser $parser)
    {
        return $this->data;
    }

    /**
     * Return complied code that loads the evaluated output of buffer content into a temporary variable
     *
     * @param \src\vendor\smarty\smarty\src\Parser\TemplateParser $parser
     *
     * @return string template code
     */
    public function assign_to_var(\src\vendor\smarty\smarty\src\Parser\TemplateParser $parser)
    {
        $var = $parser->compiler->getNewPrefixVariable();
        $tmp = $parser->compiler->appendCode('<?php ob_start();?>', (string) $this->data);
        $tmp = $parser->compiler->appendCode($tmp, "<?php {$var}=ob_get_clean();?>");
        $parser->compiler->appendPrefixCode($tmp);
        return $var;
    }
}
