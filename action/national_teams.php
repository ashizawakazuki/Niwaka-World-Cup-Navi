<?php
use country\CountryRepository;

$countries = CountryRepository::getCountry();


$smarty->assign('filename', 'national_teams.html');
$smarty->assign('countries', $countries);
$smarty->display('template.html');