<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/detail.css">
    <title>Document</title>
</head>

<body>

    <!-- back end -->
    <?php
include 'config.php';

session_start();

if (isset($_GET['id_question']) ) {
    // display data from table question
    $stmt = $bd->prepare('SELECT * FROM question WHERE id_question = ?');
    $stmt->execute([$_GET['id_question']]);
    $question = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$question) {
        exit('question doesn\'t exist with that ID!');
    }

    error_reporting(E_ERROR | E_PARSE);

    //insert data for table "reponse"
    $text_reponse = htmlspecialchars($_POST['text']);
    $req = $bd->exec("INSERT INTO `reponse` (`question_id`, `text_reponse`) VALUES ('".$_GET['id_question']."', '$text_reponse')");

    if (!$req) {
        // continue;
    }
}
else {
    exit('Not found');
    }

$response = "SELECT * from reponse WHERE question_id = '".$_GET['id_question']."'";
?>

    <!-- end back -->

    <header>
        <nav>
            <a href="./index.html">home</a>
        </nav>

        <nav class="right">
            <a href="./create_question.html">posez une question</a>
            <a href="./read.php">questions</a>
        </nav>
    </header>
    <div class="container">
        <div class="card">
            <h2><?=$question['title_question']?></h2>
            <hr>
            <p><?=$question['text_question']?> </p>
        </div>
        <p style="font-size:24px ;">Reponses</p>
        <?php foreach ($bd->query($response) as $reponse): ?>
        <div style="width: 70%;">

            <p class="reponse"><?=$reponse['text_reponse']?></p>
        </div>


        <?php endforeach; ?>
        <hr>
        <form action="detail.php?id_question=<?=$question['id_question']?>" method="post">
            <!-- <label for="text">Text reponse</label> -->
            <textarea name="text" id="text" required>

        </textarea>

            <input type="submit" value="Create" >
        </form>

    </div>
</body>

</html>


<!-- side client -->