<!-- ceci est le cote serveur pour la page detail -->
<?php
    /* importation du fichier de connexion vers la base de
     Donnee */
    include 'config.php';
    
    /* Une condition permettant de retrouver l'id de la question afin de 
     voir son contenu */
    if (isset($_GET['id_question']) ) {

        $stmt = $bd->prepare('SELECT * FROM question WHERE id_question = ?');
        $stmt->execute([$_GET['id_question']]);
        $question = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$question) {
            exit('question n\'hesiste pas!');
        }
    
        /*Recuperation des valeurs du formulaire pour la reponse */
        $text_reponse = htmlspecialchars($_POST['textReponse']);

        /*Si la variable est vide elle retournera le user vers la page
        detail */
        $id = $question['id_question'];
        if (empty($text_reponse)){
            echo '<script>
                    location.href="detail.php?id_question='.$id.'"
                </script>';
        }
        else{
            /*Si non la valeur de la variable est enregistrer */
            $req = $bd->exec("INSERT INTO `reponse` (`question_id`, `text_reponse`) VALUES ('".$_GET['id_question']."', '$text_reponse')");
            if ($req) {
                echo '<script>
                    location.href="detail.php?id_question='.$id.'"
                </script>';
            }
        }
}
    /*Si l'ID de la question n'hehiste pas */
    else {
        exit('Error');
        }
?>