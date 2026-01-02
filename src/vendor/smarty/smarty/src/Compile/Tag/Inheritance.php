<?php

namespace src\vendor\smarty\smarty\src\Compile\Tag;

use src\vendor\smarty\smarty\src\Compile\Base;

/**
 * Smarty Internal Plugin Compile Shared Inheritance
 * Shared methods for {extends} and {block} tags
 *


 * @author     Uwe Tews
 */

/**
 * Smarty Internal Plugin Compile Shared Inheritance Class
 *


 */
abstract class Inheritance extends Base
{
    /**
     * Compile inheritance initialization code as prefix
     *
     * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler
     * @param bool|false                            $initChildSequence if true force child template
     */
    public static function postCompile(\src\vendor\smarty\smarty\src\Compiler\Template $compiler, $initChildSequence = false)
    {
        $compiler->prefixCompiledCode .= "<?php \$_smarty_tpl->getInheritance()->init(\$_smarty_tpl, " .
                                         var_export($initChildSequence, true) . ");\n?>\n";
    }

    /**
     * Register post compile callback to compile inheritance initialization code
     *
     * @param \src\vendor\smarty\smarty\src\Compiler\Template $compiler
     * @param bool|false                            $initChildSequence if true force child template
     */
    public function registerInit(\src\vendor\smarty\smarty\src\Compiler\Template $compiler, $initChildSequence = false)
    {
        if ($initChildSequence || !isset($compiler->_cache[ 'inheritanceInit' ])) {
            $compiler->registerPostCompileCallback(
                array(self::class, 'postCompile'),
                array($initChildSequence),
                'inheritanceInit',
                $initChildSequence
            );
            $compiler->_cache[ 'inheritanceInit' ] = true;
        }
    }
}
