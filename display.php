<?php

include("connect.php");

$reponse = $bdd->query('SELECT * FROM content');
$reponse1 = $reponse->fetchALL();
foreach ($reponse1 as $value) {

?>

<p><?=$value->title?></p>
<img src="./uploads/<?=$value->image?>">
<p><?=$value->content?></p>
<p><?=$value->date?></p>


<form class="" action="delete.php" method="post">
  <button type"submit" name="delete">Supprimer</button>
  <input hidden type="text" name="id" value="<?= $value->id?>">
</form>

<!--création bouton edit -->

<form class="" action="modify.php" method="post">
  <button type"submit" name="moz">Modifier</button>
  <input hidden type="text" name="id" value="<?= $value->id?>">
</form>

<?php
}

?>
