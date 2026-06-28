<?php
use country\CountryRepository;


$country_id = $_GET['country_id'];


try{
    $country = CountryRepository::getCountryDetail($country_id);
    if (empty($country)) {
        throw new Exception("データベースエラーです。開発者に連絡してください");
    }
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
$_SESSION['name'] = $country->getName();

$smarty->assign('filename', 'country_detail.html');
$smarty->assign('country', $country);
$smarty->display('template.html');