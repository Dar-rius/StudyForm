<!-- Affichage les differentes question  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/read_styles.css">
</head>

<body>
    <header>
        <nav>
            <a href="./index.html" class="nas">Home</a>
        </nav>

        <nav class="right">
            <a href="./create_question.html" class="nas">Posez une question</a>
        </nav>
    </header>
    <?php
    include 'config.php';

    $requete = 'SELECT * FROM question';
    ?>

    <div class="container">
        <p class="para2">Trouver la  question qui  vous intéresse</p>

        <?php foreach ($bd->query($requete) as $row): ?>

            <div class="card">
                <a href="detail.php?id_question=<?= $row['id_question'] ?>"> 
                    <h3 class="para"><?= $row['title_question'] ?></h3>
                    <p class="para1"><?= $row['text_question'] ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>