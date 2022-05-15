<?php
    
    if (isset($_POST['title']) && isset($_POST['text'])) 
        {
        $title = htmlspecialchars($_POST['title']);
        $text = htmlspecialchars($_POST['text']);
    }
    else {
        echo "Veuillez remplir tous les champs";
    }

    include 'config.php';

    $req = $bd->exec("INSERT INTO `question` (`title_question`, `text_question`) VALUES ('$title', '$text')");
    if ($req) {
        header('Location: read.php');
    }
    else {
        echo 'Error!';
    }
?>