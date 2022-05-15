<?php
    include 'config.php';
    session_start();
    
    if (isset($_GET['id_question']) ) {
        // display data from table question
        $stmt = $bd->prepare('SELECT * FROM question WHERE id_question = ?');
        $stmt->execute([$_GET['id_question']]);
        $question = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$question) {
            exit('question n\'hesiste pas!');
        }
    

        $text_reponse = htmlspecialchars($_POST['textReponse']);

        if (empty($text_reponse)){
            header('Location: detail.php?id_question='.$question['id_question']);
        }
        else{

            $req = $bd->exec("INSERT INTO `reponse` (`question_id`, `text_reponse`) VALUES ('".$_GET['id_question']."', '$text_reponse')");
            if ($req) {
                header('Location: detail.php?id_question='.$question['id_question']);
            }
        }
}
else {
    exit('Error');
    }
?>