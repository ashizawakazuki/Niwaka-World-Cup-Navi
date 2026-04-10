<?php

use country\CountryRepository;

$country_id = $_GET['country_id'];
$memo = $_POST['memo'];

//以下、確認画面で国の名前を表示するために書いている
$country = CountryRepository::getCountryDetail($country_id);
$country_name = $country->getname();

$smarty->assign('memo', $memo);
$smarty->assign('country', $country);
$smarty->assign('country_name', $country_name);
$smarty->assign('filename', 'confirm_country_detail.html');
$smarty->display('template.html');