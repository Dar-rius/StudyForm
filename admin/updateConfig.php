<?php
include '../config.php';

if (isset($_GET['id_question'])) {
    if (!empty($_POST)) {
        // insert de valeur 
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $text = isset($_POST['text']) ? $_POST['text'] : '';

        // Update des donnees 
        $stmt = $bd->prepare('UPDATE question SET title_question = ?, text_question = ? WHERE id_question = ?');
        $stmt->execute([$title, $text, $_GET['id_question']]);
        header('Location: admin.php');

    }
} else {
    exit('La Question n\'existe pas');
}
?>



