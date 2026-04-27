<?php


use country\CountryRepository;

$matches = [
    [
        'id' => 1,
        'japan' => '日本',
        'opponent' => 'オランダ',
        'date' => '2026年6月15日(月)',
        'time' => '5:00',
        'japan_flag' => 'japan.png',
        'opponent_country_flag' => 'Netherlands.png'
    ],
    [
        'id' => 2,
        'japan' => '日本',
        'opponent' => 'チュニジア',
        'date' => '2026年6月21日(日)',
        'time' => '13:00',
        'japan_flag' => 'japan.png',
        'opponent_country_flag' => 'Tunisia.png'
    ],
    [
        'id' => 3,
        'japan' => '日本',
        'opponent' => 'スウェーデン',
        'date' => '2026年6月26日(金)',
        'time' => '8:00',
        'japan_flag' => 'japan.png',
        'opponent_country_flag' => 'Sweden.png'
    ],
];

$smarty->assign('matches', $matches);
$smarty->assign('filename', 'match_schedule.html');
$smarty->display('template.html');