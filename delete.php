<?php

  include("connect.php");

  // $id = $_POST["id"];


  $req = $bdd->prepare('DELETE FROM content WHERE id= ?');

  $req->execute(array($_POST['id']));

header('Location: index.php');
  ?>
