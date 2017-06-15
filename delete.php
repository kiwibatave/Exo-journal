<?php

  include("connect.php");

  $id = $_POST["id"];


  $req = $bdd->prepare('DELETE FROM content WHERE id=?');

  $req->execute(array($_POST['id']));

  ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./style.css">
    <script src="jquery.js"></script>
    <title>DELETE</title>
  </head>
<body>
  <a href="index.php">Supp</a>
</body>
</html>
