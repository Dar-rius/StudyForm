<!-- side serveur pour la page upade -->

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
        echo '<script>
                    location.href="admin.php";
                </script>';

    }
} else {
    exit('La Question n\'existe pas');
}
?>



