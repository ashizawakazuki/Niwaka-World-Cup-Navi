<?php
//国の詳細画面からメモをデータベースに保存するファイル
//データベースのカラムは追加したからそこにいれる
use country\CountryRepository;

$country_name = $_SESSION['name'];
$country_id = $_GET['country_id'];
$memo = $_POST['memo'];
$country_repository = new CountryRepository();
// データベースエラーが出たら、saveの定義もとに書いてあるエラーメッセージがここに渡されて、Exceptionに入る
try {
    $country_repository->upsert($country_id, $country_name, $memo);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}


$smarty->assign('country_id', $country_id);
$smarty->assign('filename', 'country_detail_db.html');
$smarty->display('template.html');