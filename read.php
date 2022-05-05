<?php
include 'config.php';

$requete = 'SELECT * FROM question';?> 


<!-- side client -->
<?php foreach($bd->query($requete) as $row): ?>
<div>
    <div>
        <a href="detail.php?id_question=<?=$row['id_question']?>">  
            <div><?=$row['title_question']?></div>
        </a>
        <p><?=$row['text_question']?></p>
    </div>
</div>
<?php endforeach; ?>
