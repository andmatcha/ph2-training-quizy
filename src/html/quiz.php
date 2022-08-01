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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $_SERVER['HTTP_SERVER'] . '/css/destyle.css' ?>">
    <link rel="stylesheet" href="<?= $_SERVER['HTTP_SERVER'] . '/css/style.css' ?>">
</head>

<body>
    <div class="content">
        <h1 class="content__title"><?= $title ?></h1>

        <?php foreach ($questions as $question_index => $question) : ?>
            <div class="quiz">
                <h2 class="quiz__title"><?= $question_index + 1 ?>. この地名なんて読む？</h2>
                <div class="quiz__img-box">
                    <img class="quiz__img" src="<?= $_SERVER['HTTP_SERVER'] . '/images/' . $question['image'] ?>" alt="">
                </div>
                <ul class="quiz__choices js-choices<?= $question_index ?>">

                    <?php foreach ($choices[$question_index] as $choice_index => $choice) : ?>
                        <li class="quiz__choice" id="choice<?= $question_index ?>_<?= $choice_index ?>" onclick="clickFn(<?= $question_index ?>, <?= $choice_index ?>, <?= $choice['valid'] ?>)"><?= $choice['name'] ?></li>
                    <?php endforeach; ?>

                </ul>
                <div class="quiz__comment-box">
                    <h3 class="quiz__comment-title" id="comment_title<?= $question_index ?>"></h3>
                    <p class="quiz__comment-text" id="comment_text<?= $question_index ?>"></p>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <script src="./js/quiz.js"></script>
</body>

</html>
