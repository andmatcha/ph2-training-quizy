<?php
// ページIDがセットされているかチェック セットされていなかったらindex.phpに飛ばす
if (!isset($_GET['id'])) {
    header('Location: ' . $_SERVER['HTTP_HOST'] . '/quizy/index.php');
}

// DB接続 $db
require(dirname(__FILE__, 2) . '/app/db-connect.php');

/*
クイズのデータを取得
$title: ページタイトル
$questions: array(id: 問題ID, image: 問題の画像ファイル名)
$choices: array(array(name: 選択肢, valid: 正誤[0:不正解 1:正解])[問題毎])
*/
require(dirname(__FILE__, 2) . '/app/get-quiz.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= $_SERVER['HTTP_SERVER'] . '/resources/css/quizy/reset.css' ?>">
    <link rel="stylesheet" href="<?= $_SERVER['HTTP_SERVER'] . '/resources/css/quizy/reset.css' ?>">
</head>

<body>
    <div class="wrapper">
        <h1><?= $title ?></h1>

        <?php foreach ($questions as $question_index => $question) : ?>
            <div class="quiz_box">
                <h2 class="quiz_box__title"><?= $question_index + 1 ?>. この地名なんて読む？</h2>
                <div class="quiz_box__image">
                    <img src="<?= $_SERVER['HTTP_SERVER'] . '/images/' . $question['image'] ?>">
                </div>
                <ul class="quiz_box__choices">

                    <?php foreach ($choices[$question_index] as $choice) : ?>
                        <li class="quiz_box__choices__item"><?= $choice['name'] ?></li>
                    <?php endforeach; ?>

                </ul>
                <div class="quiz_box__comment">
                    <h3 class="quiz_box__comment__title"></h3>
                    <p class="quiz_box__comment__text"></p>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</body>

</html>
