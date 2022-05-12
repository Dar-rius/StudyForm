<?php
include '../config.php';

if (isset($_GET['id_question'])) {

    // Get the question from the questions table
    $stmt = $bd->prepare('SELECT * FROM question WHERE id_question = ?');
    $stmt->execute([$_GET['id_question']]);

    $question = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$question) {
        exit('Impossible de mettre a jour');
    }
} else {
    exit('La Question n\'existe pas');
}
?>


<!-- side client -->
<div >
	<h2>Update</h2>
    <form action="updateConfig.php?id_question=<?=$question['id_question']?>" method="post">
        <label for="title">Title question</label>
        <input type="text" name="title" id="title" value= "<?= $question['title_question'] ?>" >
        
        <label for="text">Text question</label>
        <textarea name="text" id="text"  >
        <?= $question['text_question'] ?>
        </textarea>

        <input type="submit" value="Create">
    </form>
</div>
