<?php

session_start();

$current_question_index = $_SESSION['current_question'];
$question = $_SESSION['quiz_questions'][$current_question_index];

$user_answer = trim($_POST['answer'] ?? '');
$correct_answer = $question['answer'];

$is_correct = ($user_answer === $correct_answer);

if ($is_correct) {
    $_SESSION['score']++;
}

$_SESSION['current_question']++;

$is_last_question = $_SESSION['current_question'] >= count($_SESSION['quiz_questions']);

$smarty->assign('filename', 'tamai_quiz/answer.html');
$smarty->assign('is_correct', $is_correct);
$smarty->assign('user_answer', $user_answer);
$smarty->assign('correct_answer', $correct_answer);
$smarty->assign('is_last_question', $is_last_question);

$smarty->display('tamai_template.html');