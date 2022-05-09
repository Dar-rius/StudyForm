<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/read.css">
</head>

<body>
    <header>
        <nav>
            <a href="">home</a>
        </nav>

        <nav>
            <a href="create_question.html">posez une question</a>
            <a href="">questions</a>
        </nav>
    </header>
    <?php
include 'config.php';

$requete = 'SELECT * FROM question';?>


    <!-- side client -->
    <?php foreach($bd->query($requete) as $row): ?>

    <div>
        <div>
            <a href="detail.php?id_question=<?=$row['id_question']?>">
                <div><?=$row['title_question']?></div>
            </a>
            <p><?=$row['text_question']?></p>
        </div>
    </div>
    <?php endforeach; ?>
</body>

</html>