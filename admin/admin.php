<!-- La page pernettant a l'admin d'effectuer des modif sur la 
    les donnees enregistrer -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admins.css">
</head>

<body>
    <header>
        <nav>
            <a href="../index.html" class="home">Home</a>
        </nav>
    </header>
    <?php
    include '../config.php';

    $requete = 'SELECT * FROM question';
    ?>

        <p class="text">Effectuer les changements</p>

    <div class="container">
        <?php foreach ($bd->query($requete) as $row): ?>

            <div  class="card">
                <a href="../detail.php?id_question=<?= $row['id_question'] ?>" > 
                    <p><?= $row['title_question'] ?></p>
                </a>
                <div class="admini">
                    <a href="update.php?id_question=<?= $row['id_question'] ?>">
                        <p>Modifier</p>
                    </a>
                    <a href="delete.php?id_question=<?= $row['id_question'] ?>&confirm=yes">
                        <p>Supprimer</p>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>