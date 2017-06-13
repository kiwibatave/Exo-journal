<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./style.css">
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
  <form action="index.php" method="post" enctype="multipart/form-data">
    <input type="text" name="title" value="" placeholder="Titre de l'article">
    <input type="file" name="image" value="" placeholder="IMG">
    <input type="text" name="content" value="" placeholder="Ceci est votre article">
    <input type="submit" name="button" value="Click"></input>
  </form>


  <?php

  include("connect.php");

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

  $title = $_POST['title'];
  $image = $_FILES['image']["name"];
  $content = $_POST['content'];
  $date = date("d/m/y H:i:s");// tjr insert into dans l'ordre

  $req = $bdd->prepare("INSERT INTO content (title, image, content, date)
    VALUES (:title, :image, :content, :date)");
 // value = variables
  $req->execute(array(
        'title' => $title,
        'image' => $image,
        'content' => $content,
        'date' => $date
    ));

$reponse = $bdd->query('SELECT * FROM content');
$reponse1 = $reponse->fetchALL();
foreach ($response1 as $value) {

  echo '<p>'.$value->title.'</p><img src="./uploads"
}

?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/script.js"></script>

</html>
