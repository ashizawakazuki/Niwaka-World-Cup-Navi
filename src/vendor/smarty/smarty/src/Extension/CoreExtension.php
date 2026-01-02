<?php

namespace src\vendor\smarty\smarty\src\Extension;

use src\vendor\smarty\smarty\src\Extension\Base;

class CoreExtension extends Base {
	public function getTagCompiler(string $tag): ?\src\vendor\smarty\smarty\src\Compile\CompilerInterface {
		switch ($tag) {
			case 'append': return new \src\vendor\smarty\smarty\src\Compile\Tag\Append();
			case 'assign': return new \src\vendor\smarty\smarty\src\Compile\Tag\Assign();
			case 'block': return new \src\vendor\smarty\smarty\src\Compile\Tag\Block();
			case 'blockclose': return new \src\vendor\smarty\smarty\src\Compile\Tag\BlockClose();
			case 'break': return new \src\vendor\smarty\smarty\src\Compile\Tag\BreakTag();
			case 'call': return new \src\vendor\smarty\smarty\src\Compile\Tag\Call();
			case 'capture': return new \src\vendor\smarty\smarty\src\Compile\Tag\Capture();
			case 'captureclose': return new \src\vendor\smarty\smarty\src\Compile\Tag\CaptureClose();
			case 'config_load': return new \src\vendor\smarty\smarty\src\Compile\Tag\ConfigLoad();
			case 'continue': return new \src\vendor\smarty\smarty\src\Compile\Tag\ContinueTag();
			case 'debug': return new \src\vendor\smarty\smarty\src\Compile\Tag\Debug();
			case 'eval': return new \src\vendor\smarty\smarty\src\Compile\Tag\EvalTag();
			case 'extends': return new \src\vendor\smarty\smarty\src\Compile\Tag\ExtendsTag();
			case 'for': return new \src\vendor\smarty\smarty\src\Compile\Tag\ForTag();
			case 'foreach': return new \src\vendor\smarty\smarty\src\Compile\Tag\ForeachTag();
			case 'foreachelse': return new \src\vendor\smarty\smarty\src\Compile\Tag\ForeachElse();
			case 'foreachclose': return new \src\vendor\smarty\smarty\src\Compile\Tag\ForeachClose();
			case 'forelse': return new \src\vendor\smarty\smarty\src\Compile\Tag\ForElse();
			case 'forclose': return new \src\vendor\smarty\smarty\src\Compile\Tag\ForClose();
			case 'function': return new \src\vendor\smarty\smarty\src\Compile\Tag\FunctionTag();
			case 'functionclose': return new \src\vendor\smarty\smarty\src\Compile\Tag\FunctionClose();
			case 'if': return new \src\vendor\smarty\smarty\src\Compile\Tag\IfTag();
			case 'else': return new \src\vendor\smarty\smarty\src\Compile\Tag\ElseTag();
			case 'elseif': return new \src\vendor\smarty\smarty\src\Compile\Tag\ElseIfTag();
			case 'ifclose': return new \src\vendor\smarty\smarty\src\Compile\Tag\IfClose();
			case 'include': return new \src\vendor\smarty\smarty\src\Compile\Tag\IncludeTag();
			case 'ldelim': return new \src\vendor\smarty\smarty\src\Compile\Tag\Ldelim();
			case 'rdelim': return new \src\vendor\smarty\smarty\src\Compile\Tag\Rdelim();
			case 'nocache': return new \src\vendor\smarty\smarty\src\Compile\Tag\Nocache();
			case 'nocacheclose': return new \src\vendor\smarty\smarty\src\Compile\Tag\NocacheClose();
			case 'section': return new \src\vendor\smarty\smarty\src\Compile\Tag\Section();
			case 'sectionelse': return new \src\vendor\smarty\smarty\src\Compile\Tag\SectionElse();
			case 'sectionclose': return new \src\vendor\smarty\smarty\src\Compile\Tag\SectionClose();
			case 'setfilter': return new \src\vendor\smarty\smarty\src\Compile\Tag\Setfilter();
			case 'setfilterclose': return new \src\vendor\smarty\smarty\src\Compile\Tag\SetfilterClose();
			case 'while': return new \src\vendor\smarty\smarty\src\Compile\Tag\WhileTag();
			case 'whileclose': return new \src\vendor\smarty\smarty\src\Compile\Tag\WhileClose();
		}
		return null;
	}

}