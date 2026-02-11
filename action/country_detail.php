<?php
require_once __DIR__ . '/../inc/config.php';

$smarty->assign('filename', 'country_detail.html');
$smarty->display('template.html');