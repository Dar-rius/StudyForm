<?php
include '../config.php';

if (isset($_GET['id_question'])) {
    // Select the record that is going to be deleted
    $stmt = $bd->prepare('SELECT * FROM question WHERE id_question = ?');
    $stmt->execute([$_GET['id_question']]);
    $question = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$question) {
        exit('Cette question n\'hesiste pas');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $bd->prepare('DELETE FROM reponse');
            $stmt->execute();

            $stmt = $bd->prepare('DELETE FROM question WHERE id_question = ?');
            $stmt->execute([$_GET['id_question']]);
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: admin.php');
            exit;
        }
    }
} else {
    exit('La question est introuvable');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="content delete">
    <h2>Suprimer la question <?=$question['title_question']?></h2>
    <div class="yesno">
        <a href="delete.php?id_question=<?=$question['id_question']?>&confirm=yes">Supprimer</a>
    </div>
    </div>
</body>
</html>