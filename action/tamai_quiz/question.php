<?php

session_start();

$questions = [
    [
        'type' => 'choice',
        'question' => 'おぎの先生のなまえは？',
        'choices' => ['おぎのたいき', 'おぎのだいき', 'おぎのまさき'],
        'answer' => 'おぎのだいき',
    ],
    [
        'type' => 'choice',
        'question' => '生徒会の人数は？',
        'choices' => ['4人', '5人', '6人'],
        'answer' => '5人',
    ],
    [
        'type' => 'choice',
        'question' => '自分たちが3年の時の校長先生の名前は？',
        'choices' => ['はせがわ校長', 'しみず校長', 'わたなべ校長'],
        'answer' => 'はせがわ校長',
    ],
    [
        'type' => 'text',
        'question' => 'この場所、なんて呼んでたっけ？',
        'image' => '/templates/images/tamai_quiz/piloti.png',
        'answer' => 'ピロティ',
    ],
    [
        'type' => 'choice',
        'question' => '校歌の2番の最初の歌詞は？',
        'image' => '/templates/images/tamai_quiz/kouka.png',
        'choices' => [ '指さす山河　晴れわたり', '玉なす水に　洗われて','真澄の空の　あるかぎり'],
        'answer' => '指さす山河　晴れわたり',
    ],
    [
        'type' => 'choice',
        'question' => '3年の時、若木祭優勝したクラスは？',
        'choices' => ['1組', '3組', '5組'],
        'answer' => '1組',
    ],
    [
        'type' => 'choice',
        'question' => '技術室は何階？',
        'choices' => ['1階', '2階', '3階'],
        'answer' => '1階',
    ],
    [
        'type' => 'choice',
        'question' => '3年の時、体育祭のスローガンは？？',
        'choices' => ['不撓不屈　～革命起こせ！　玉中維新～', '全身全霊　～今こそ見せろ玉中魂～', '創ろう玉中武勇伝　～頂上までかけぬけろ～'],
        'answer' => '不撓不屈　～革命起こせ！　玉中維新～',
    ],
    [
        'type' => 'choice',
        'question' => '3年の時、学年主任の先生だれだっけ？？',
        'choices' => ['桜庭先生', '長谷川先生', '長谷部先生'],
        'answer' => '長谷部先生',
    ],
    [
        'type' => 'text',
        'question' => "校庭にあったこの森の名前は？\n（ひらがなで「○○のもり」と回答してね）",
        'image' => '/templates/images/tamai_quiz/ikoinomori.png',
        'answer' => 'いこいのもり',
    ],
    [
    'type' => 'text',
    'question' => "生徒会の歌のタイトルは？\n（漢字も含めて正しく回答してね）",
    'image' => '/templates/images/tamai_quiz/wakoudoyo.png',
    'answer' => '若人よ',
    ]
];
if (
    isset($_SESSION['quiz_questions'], $_SESSION['current_question']) &&
    $_SESSION['current_question'] >= count($_SESSION['quiz_questions'])
) {
    unset($_SESSION['quiz_questions']);
    unset($_SESSION['current_question']);
    unset($_SESSION['score']);
}

if (empty($_SESSION['quiz_questions'])) {
    shuffle($questions);

    $_SESSION['quiz_questions'] = array_slice($questions, 0, 5);
    $_SESSION['current_question'] = 0;
    $_SESSION['score'] = 0;
}

$current_question_index = $_SESSION['current_question'];

$question = $_SESSION['quiz_questions'][$current_question_index];

$question_number = $current_question_index + 1;
$total_question_count = count($_SESSION['quiz_questions']);

$smarty->assign('question', $question);
$smarty->assign('filename', 'tamai_quiz/question.html');
$smarty->assign('question_number', $question_number);
$smarty->assign('total_question_count', $total_question_count);

$smarty->display('tamai_template.html');