<?php
// 【4/12】このsession_start()でセッションというサーバー側にデータを保存する箱を作る（または再開する）
// →$_SESSIONを使えるようになる
session_start();
$_SESSION["answers"][] = $_POST['answer'];

$smarty->assign('filename', 'diagnosis/diagnosis_q4.html');
$smarty->display('template.html');