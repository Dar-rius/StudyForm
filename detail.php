<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/detail_styles.css">
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

}
else {
    exit('Not found');
    }

$response = "SELECT * from reponse WHERE question_id = '".$_GET['id_question']."'";
?>

    <!-- end back -->

    <header>
        <nav>
            <a href="./index.html">Home</a>
        </nav>

        <nav class="right">
            <a href="./create_question.html">Posez une question</a>
            <a href="./read.php">Questions</a>
        </nav>
    </header>

    <div class="container">
        <div class="card">
            <h2><?=$question['title_question']?></h2>
            <p><?=$question['text_question']?> </p>
        </div>

        <div class="rep">
            <p>Reponses</p>
        </div>
        
        <?php foreach ($bd->query($response) as $reponse): ?>
            <div style="width: 70%;">
                <p class="reponse"><?=$reponse['text_reponse']?></p>
            </div>
        <?php endforeach; ?>
        
        <form action="detailConfig.php?id_question=<?=$question['id_question']?>" method="post">
            <!-- <label for="text">Text reponse</label> -->
            <textarea 
                name="textReponse" 
                id="text"
                required>
            </textarea>
            <input type="submit" value="Repondre" >
        </form>

    </div>
</body>

</html>