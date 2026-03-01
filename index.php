<?php
//トップ画面（自動で設定されている）

//いろんな設定ファイルを読み込んでいる
require_once __DIR__ . '/inc/config.php';

//データベースに関するファイルを読み込んでいる
require_once __DIR__ . '/inc/dbconfig.php';

//接続したいファイル（クラス）を読み込んでいる
//→3/1にcomposerを記述してクラスは名前空間で読み込むようにしたので、下記はコメントアウトした
//require_once("class/SingletonPDO.class.php");
//require_once("class/country/CountryRepository.php");


//表示したファイルの読み込み
if(isset($_GET['action'])){
    $action = $_GET['action'];
}


if(!empty($action)){
    require_once("action/$action.php");
}else{
    $smarty->assign('filename', 'index.html');
    $smarty->display('template.html');
}