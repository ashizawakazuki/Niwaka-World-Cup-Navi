<?php

session_start();

$score = $_SESSION['score'] ?? 0;
$total_question_count = count($_SESSION['quiz_questions'] ?? []);

$score_point = $score * 20;

$smarty->assign('filename', 'tamai_quiz/result.html');
$smarty->assign('score', $score);
$smarty->assign('score_point', $score_point);
$smarty->assign('total_question_count', $total_question_count);

$smarty->display('tamai_template.html');