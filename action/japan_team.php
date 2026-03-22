<?php
require_once __DIR__ . '/../inc/config.php';

use class\player\PlayerRepository;
//④裏側のファイルでクラスからオブジェクトを持ってくる

try {
    $players = PlayerRepository::getJapanPlayer();
    if (empty($players)) {
        throw new PDOException("データベース関係でエラーが出ています");
    }

    // Exceptionクラスのオブジェクトが$eに入っている、そしてそのオブジェクトのメソッドをつかってメッセージなどを出している
} catch(PDOException $e) {
    // よく使われるメソッド上位3つ（AIより）
    echo $e->getMessage()."<br>"; //エラーです
    echo $e->getFile()."<br>"; // /var/www/html/class/player/PlayerRepository.php
    echo $e->getLine()."<br>"; // 17
    echo $e->getFile()."の".$e->getLine()."行目で".$e->getMessage();
    exit; //処理をここで終わらせる(HTMLファイルまでいかないようにしている）
}

$smarty->assign('filename', 'japan_team.html');
$smarty->assign('players', $players);
$smarty->display('template.html');
