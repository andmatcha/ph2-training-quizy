<?php
require(dirname(__FILE__, 2) . '/app/db-connect.php');

$big_questions = $db->query("SELECT * FROM big_questions");
$big_questions = $big_questions->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizy</title>
</head>

<body>
    <?php
    foreach ($big_questions as $big_question) :
    ?>
        <p><a href="./quiz.php?id=<?= $big_question['id'] ?>"><?= $big_question['name']; ?></a></p>
    <?php
    endforeach;
    ?>
</body>

</html>
