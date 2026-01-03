<?php
require_once __DIR__ . '/vendor/autoload.php';

$smarty = new Smarty\Smarty();   // ← ここが v5 の正式な書き方

// テンプレートが入っている場所
$smarty->setTemplateDir(__DIR__ . '/templates');

// コンパイルしたテンプレートを置く場所
$smarty->setCompileDir(__DIR__ . '/templates_c');

// index.htmlを表示
$smarty->display('index.html');
