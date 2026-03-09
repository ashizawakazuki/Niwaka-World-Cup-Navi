<?php
require_once __DIR__ . '/../inc/config.php';

use class\player\PlayerRepository;
//④裏側のファイルでクラスからオブジェクトを持ってくる
$players = PlayerRepository::getJapanPlayer();

$smarty->assign('filename', 'japan_team.html');
$smarty->assign('players', $players);
$smarty->display('template.html');
