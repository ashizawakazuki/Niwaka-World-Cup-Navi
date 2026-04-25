<?php

use country\CountryRepository;

session_start();
// 【4/12】このsession_start()でセッションというサーバー側にデータを保存する箱を作る（または再開する）
// →$_SESSIONを使えるようになる

$_SESSION["answers"][] = $_POST['answer'];
$answers = $_SESSION["answers"];

// 【4/12】「攻撃」「守備」「バランス」それぞれの配列に出場国をいれている
$attack = ['ブラジル','アルゼンチン','フランス','イングランド','ポルトガル','スペイン','オランダ','ベルギー','コロンビア','エクアドル','メキシコ','トルコ','ガーナ','セネガル'];
$defense = ['ドイツ','クロアチア','ウルグアイ','モロッコ','スイス','チュニジア','アルジェリア','パラグアイ','イラン','サウジアラビア','日本','韓国','オーストラリア'];
$balance = ['アメリカ','カナダ','パナマ','キュラソー','ハイチ','ウズベキスタン','ヨルダン','カタール','イラク','エジプト','南アフリカ','カーボベルデ','コートジボワール','ニュージーランド','スコットランド','オーストリア','ノルウェー','ボスニア・ヘルツェゴビナ','スウェーデン','チェコ'];

// 【4/12】array_count_valuesで、配列の中の「値をキー、出現回数を値」として、新しい配列を返す
//例　["A" => 3, "B" => 1, "C" => 1]
$most_answer = array_count_values($answers);

//【4/12】arsortで値で降順に並び変える
//→つまりキーの数字が一番大きい要素を一番前にもってこれる(破壊的メソッド）
arsort($most_answer);

//【4/12】配列の最初の要素（回答が一番多かったもの）がAかBかそれ以外（C)で表示する国（と説明文）を決めている
if(array_key_first($most_answer) === "A"){
    // 【4/12】array_rand()で配列の中の要素のキーをランダムで返す（以下同）
    $attack_key = array_rand($attack);
    $diagnosis_result = $attack[$attack_key];
    $type = "攻めることが好きな「攻撃タイプ」";
    $country_feature = "この国は攻めるプレーが得意で、見ていて盛り上がるのが特徴です";
} elseif(array_key_first($most_answer) === "B") {
    $defense_key = array_rand($defense);
    $diagnosis_result = $defense[$defense_key];
    $type = "守ることが好きな「守備タイプ」";
    $country_feature = "この国はしっかり守って勝つのが特徴です";
} else {
    $balance_key = array_rand($balance);
    $diagnosis_result = $balance[$balance_key];
    $type = "バランスを大切にする「バランスタイプ」";
    $country_feature = "この国は攻撃も守備も安定しているのが特徴";
}

// 【4/12】$diagnosis_resultには国名が入っている
// 【4/12】CountryRepositoryのgetCountryByNameメソッドに国名を渡して、国のオブジェクトをもってきている
$country= CountryRepository::getCountryByName($diagnosis_result);

$smarty->assign('filename', 'diagnosis/diagnosis_result.html');
$smarty->assign('country', $country);
$smarty->assign('country_feature', $country_feature);
$smarty->assign('type', $type);
$smarty->display('template.html');

// [4/12]ここでセッションに入っているものを削除する（unsetは変数を削除する。スーパーグローバル変数の場合は中身のみ削除）
unset($_SESSION['answers']);