<?php
//トップ画面（自動で設定されている）
require_once __DIR__ . '/inc/config.php';


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