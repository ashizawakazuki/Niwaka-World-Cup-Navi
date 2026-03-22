<?php
use country\CountryRepository;

try {
    $countries = CountryRepository::getCountry();
    if(empty($countries)){
        throw new Exception("エラーです。開発者に問い合わせてください。");
    }
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}


$smarty->assign('filename', 'national_teams.html');
$smarty->assign('countries', $countries);
$smarty->display('template.html');