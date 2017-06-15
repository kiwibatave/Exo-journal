<?php

include("connect.php");

$id = $_POST["id"];
$title = $_POST['title'];
$image = $_FILES['image']["name"];
$content = $_POST['content'];
$date = date("d/m/y H:i:s");

$req = $bdd->prepare('UPDATE content SET (title, image, content, date)
  VALUES (:title, :image, :content, :date) WHERE id=?');

$req -> execute(array($_POST['id']));


 ?>
 <html>

 <head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="./style.css">
   <script src="jquery.js"></script>
   <title>EDIT</title>
 </head>
 <body>
 <a href="index.php">Edit</a>
 </body>
 </html>
