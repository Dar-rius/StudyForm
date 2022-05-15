<!-- Page pour mettre a jour les donnees-->

<?php
    /* importation du fichier de connexion vers la base de
     Donnee */
    include '../config.php';

    /* Une condition permettant de retrouver l'id de la question afin de 
     voir son contenu */
    if (isset($_GET['id_question'])) {
        $stmt = $bd->prepare('SELECT * FROM question WHERE id_question = ?');
        $stmt->execute([$_GET['id_question']]);

        $question = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$question) {
            exit('Impossible de mettre a jour');
        }
    } else {
        exit('La Question n\'existe pas');
    }
?>


<!-- side client -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/updates.css">

</head>
<body>
    <header>
        <nav>
            <a href="../index.html">Home</a>
        </nav>

        <nav>
            <a href="./admin.php">Questions</a>
        </nav>
    </header>
    <div class="center">
        <div class="container">
            <h2>Modifiez la question</h2>
            <form action="updateConfig.php?id_question=<?=$question['id_question']?>" method="post">
                <label for="title">Sujet</label>
                <input type="text" name="title" id="title" value= "<?= $question['title_question'] ?>" >
                
                <label class="big-M" for="text">Description</label>
                <textarea 
                    maxlength="700"
                    name="text" required id="text" >
                    <?= $question['text_question'] ?>
                </textarea>

                <input type="submit" value="Changer" class="create">
            </form>
        </div>
    </div>
</body>
</html>
