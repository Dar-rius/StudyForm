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
            <a href="./index.html">Home</a>
        </nav>

        <nav class="right">
            <a href="./create_question.html">Posez une question</a>
        </nav>
    </header>
    <?php
    include 'config.php';

    $requete = 'SELECT * FROM question';
    ?>

    <div class="container">
        <p>Trouver la  question qui  vous interesse</p>
        <!-- side client -->
        <?php foreach ($bd->query($requete) as $row): ?>

            <a href="detail.php?id_question=<?= $row['id_question'] ?>"  class="card"> 
                <p><?= $row['title_question'] ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</body>

</html>