<?php
// タイトル
$title = $db->prepare("SELECT name FROM big_questions WHERE id = ?");
$title->execute([$_GET['id']]);
$title = $title->fetchColumn();

// 問題のID,画像
$questions = $db->prepare("SELECT id, image FROM questions WHERE big_question_id = ?");
$questions->execute([$_GET['id']]);
$questions = $questions->fetchAll();

// 選択肢
$choices = [];
foreach ($questions as $question) {
    $choice = $db->prepare("SELECT name, valid FROM choices WHERE question_id = ?");
    $choice->execute([$question['id']]);
    $choice = $choice->fetchAll();
    array_push($choices, $choice);
}
