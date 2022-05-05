<?php
include 'config.php';

session_start();
$text_reponse ='';

if (isset($_GET['id_question']) ) {
    // display data from table question
    $stmt = $bd->prepare('SELECT * FROM question WHERE id_question = ?');
    $stmt->execute([$_GET['id_question']]);
    $question = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$question) {
        exit('question doesn\'t exist with that ID!');
    }

    //insert data for table "reponse"
    if (empty($_POST)){
        echo "Repondez a la question";
    }
    else 
        {
        $text_reponse = htmlspecialchars($_POST['text']);
    }

    $req = $bd->exec("INSERT INTO `reponse` (`question_id`, `text_reponse`) VALUES ('".$_GET['id_question']."', '$text_reponse')");
    if (!$req) {
        echo 'Error';
    }
}
else {
    exit('Not found');
    }

$response = "SELECT * from reponse WHERE question_id = '".$_GET['id_question']."'";
?>


<!-- side client -->
<div> <?=$question['title_question']?> </div>
<p><?=$question['text_question']?> </p>

<?php foreach ($bd->query($response) as $reponse): ?>

<p><?=$reponse['text_reponse']?></p>

<?php endforeach; ?>

<div class="content update">
    <form action="detail.php?id_question=<?=$question['id_question']?>" method="post">     
        <label for="text">Text reponse</label>
        <textarea name="text" id="text"  >
        </textarea>

        <input type="submit" value="Create">
    </form>
</div>