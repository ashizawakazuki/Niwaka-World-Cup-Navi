<?php
require_once __DIR__ . '/../inc/config.php';


$hoge = $_GET['country_id'];



$country = CountryRepository::getCountryDetail($hoge);
$smarty->assign('filename', 'country_detail.html');
$smarty->assign('country', $country);
$smarty->display('template.html');