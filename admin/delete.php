<!-- Cote serveur pour supprimer les donnees-->

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
            header('Location: admin.php');
        } else {
            // User clicked the "No" button, redirect them back to the read page
            exit('Impossible de supprimer la question');
        }
    }
} else {
    exit('La question est introuvable');
}
?>