<!-- Cote serveur pour supprimer les donnees-->

<?php
include '../config.php';

if (isset($_GET['reponse_id'])) {
    // Select the record that is going to be deleted
    $stmt = $bd->prepare('SELECT * FROM reponse WHERE reponse_id = ?');
    $stmt->execute([$_GET['reponse_id']]);
    $reponse = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$reponse) {
        exit('Cette reponse n\'hesiste pas');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
           // Update des donnees 
        $stmt = $bd->prepare('UPDATE reponse SET reponse_certifi = ? WHERE reponse_id = ?');
        $stmt->execute(['Certificier', $_GET['reponse_id']]);

            header('Location: admin.php');
        } else {
            // User clicked the "No" button, redirect them back to the read page
            exit('Error');
        }
    }
} else {
    exit('La reponse est introuvable');
}
?>