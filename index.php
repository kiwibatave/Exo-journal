<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./style.css">
  <script src="jquery.js"></script>
  <title>EXO PHP JOURNAL</title>
</head>
<header>
  <div class="header">
    <img src="./img/deco2.png" alt="">
    <h1>WIKICODA JOURNAL</h1>
    <img src="./img/frise.png" alt="">
  </div>
</header>
<body>
  <form action="mod.php" method="post" enctype="multipart/form-data">
    <input name="title" value="" placeholder="Titre de l'article" required="required">
    <input type="file" name="image" value="" placeholder="IMG">
    <input name="content" value="" placeholder="Ceci est votre article" required="required">
    <input type="submit" name="button" value="Click"></input>
  </form>


<?php  include("display.php");?>
</body>
<!-- <script src="https:code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/script.js"></script> -->

</html>
