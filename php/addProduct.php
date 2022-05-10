<?php

  session_start(); require("db.php");

  if (isset($_POST["send"])) {

    $category = $_POST['category'];
    $img = $_FILES['img']['name'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $pet = $_POST['pet'];
    $rute = "imgUploaded/$pet"."Products/$category/$img";
    
    if (!empty($_POST['description'])){
      $description = $_POST['description'];
    } else {
      $description = "empty";
    }

    if (isset($img) && $img != "") {

      $type = $_FILES['img']['type'];
      $temp = $_FILES['img']['tmp_name'];

      if (!((strpos($type, 'jpg') || strpos($type, 'jpeg') || strpos($type, 'webp') || strpos($type, 'png')))) {

        $_SESSION['error'] = 1; # Formato de archivo no admitido

      } else {
        
        $loadItem = "INSERT INTO products (img, title, descrip, price, available, pet, category) values (?, ?, ?, ?, ?, ?, ?)";
        $uploadItem = $pdo->prepare($loadItem);
        $uploadItem->execute(array($rute, $title, $description, $price, 1, $pet, $category));
          
        move_uploaded_file($temp, $rute);
        header("Location: ../store.php"); 

      }
    }
  }
