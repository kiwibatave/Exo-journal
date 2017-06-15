<?php

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


include("connect.php");

// Si aucune erreur , on continue ...
if(!isset($errMSG))
{

  $title = $_POST['title'];
  $image = $_FILES['image']["name"];
  $content = $_POST['content'];
  $data = $bdd->prepare('INSERT INTO content (title, image, content) VALUES(:title, :image, :content)');
  $data->bindParam(':title',$title);
  $data->bindParam(':image',$image);
  $data->bindParam(':content',$content);
  if($data->execute())
  {
    $successMSG = "Article ajouté !";
    // header("refresh:5;index.php"); // redirection vue image après 5 secondes
  }
  else
  {
    $errMSG = "Erreur d'insertion !";
  }
}

  //
  // $date = date("d/m/y H:i:s");// tjr insert into dans l'ordre
  // $req = $bdd->prepare("INSERT INTO content (title, image, content, date)
  //   VALUES (:title, :image, :content, :date)");
  // // value = variables
  // $req->execute(array(
  //       'title' => $title,
  //       'image' => $image,
  //       'content' => $content,
  //       'date' => $date
  //   ));

header('Location: index.php');
?>
