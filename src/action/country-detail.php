<?php
require_once __DIR__ . '/config.php';

$smarty->assign('filename', 'country-detail.html');
$smarty->display('template.html');