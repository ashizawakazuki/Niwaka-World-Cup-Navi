<?php
// ファイル名: ai_match_prediction_result.php
require_once __DIR__ . '/../inc/env.php';

if (!isset($apiKey)) {
    $apiKey = getenv('OPENAI_API_KEY');
}

if ($apiKey === false || $apiKey === '') {
    exit('APIキーが設定されていません。');
}

$opponent = $_POST['opponent'] ?? '';
$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';

if ($opponent === '' || $opponent === '未定') {
    exit('対戦相手が未定のため、AI予想はできません。');
}

$prompt = "
あなたはサッカー初心者向けアプリの解説者です。
日本代表と{$opponent}代表の試合について、初心者向けに勝敗予想をしてください。

条件：
・断定しない
・難しいサッカー用語を使わない
・勝率は日本と{$opponent}の合計が100%になるようにする
・短く、わかりやすくする
・実際の結果を保証しない注意書きを入れる

試合情報：
日本 vs {$opponent}
試合日：{$date}
時間：{$time}

出力形式：
【勝率予想】
日本：○%
{$opponent}：○%

【予想の理由】
・
・
・

【試合の見どころ】
・

【注意書き】
";

$data = [
    'model' => 'gpt-4.1-mini',
    'input' => $prompt,
];

$ch = curl_init('https://api.openai.com/v1/responses');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey,
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE));

$response = curl_exec($ch);

if ($response === false) {
    curl_close($ch);
    exit('AI予想の取得に失敗しました。');
}

curl_close($ch);

$result = json_decode($response, true);

$predictionText = $result['output'][0]['content'][0]['text'] ?? 'AI予想を取得できませんでした。';

$smarty->assign('opponent', $opponent);
$smarty->assign('date', $date);
$smarty->assign('time', $time);
$smarty->assign('predictionText', $predictionText);
$smarty->assign('filename', 'ai_match_prediction_result.html');

$smarty->display('template.html');