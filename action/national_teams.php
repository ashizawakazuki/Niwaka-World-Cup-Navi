<?php
require_once __DIR__ . '/../inc/config.php';

$countries = CountryRepository::getCountry();


$smarty->assign('filename', 'national_teams.html');
$smarty->assign('countries', $countries);
$smarty->display('template.html');