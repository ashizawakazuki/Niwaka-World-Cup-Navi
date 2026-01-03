<?php

//smartyを使用するためのファイルを読み込んでいる
//__DIR__はこのファイルまでの絶対パスを省略して書いたもの。DIRはディレクトリの略
//文字列演算子を使って、autoload.php（smartyに関するファイル）を読み込む
require_once __DIR__ . '/../vendor/autoload.php';

//上記で読み込んだsmartyに関するファイルを実際に起動している
$smarty = new Smarty\Smarty();   // ← ここが v5 の正式な書き方

// テンプレート(HTMLファイルがあるディレクトリ)が入っている場所を教えている
$smarty->setTemplateDir(__DIR__ . '/../templates');

// コンパイルしたテンプレートを置く場所
$smarty->setCompileDir(__DIR__ . '/../templates_c');