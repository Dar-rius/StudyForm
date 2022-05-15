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
        if (empty($text_reponse)){
            header('Location: detail.php?id_question='.$question['id_question']);
        }
        else{
            /*Si non la valeur de la variable est enregistrer */
            $req = $bd->exec("INSERT INTO `reponse` (`question_id`, `text_reponse`) VALUES ('".$_GET['id_question']."', '$text_reponse')");
            if ($req) {
                header('Location: detail.php?id_question='.$question['id_question']);
            }
        }
}
    /*Si l'ID de la question n'hehiste pas */
    else {
        exit('Error');
        }
?>