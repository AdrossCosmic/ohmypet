<?php

  require("db.php");

  if (isset($_POST["send"])) {

    $pescuet = $_POST['pescuet'];
    $category = $_POST['category'];
    $img = $_FILES['img']['name'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $rute = "imgUploaded/$pescuet"."Products/$category/$img";
    
    if (isset($img) && $img != "") {

      $type = $_FILES['img']['type'];
      $temp = $_FILES['img']['tmp_name'];

      if (!((strpos($type, 'gif')  || strpos($type, 'jpg') || strpos($type, 'jpeg') || strpos($type, 'webp') || strpos($type, 'png')))) {

        echo "Error";

      } else {
        
        $loadItem = "INSERT INTO products (img, title, price, available, pescuet, category) values (?, ?, ?, ?, ?, ?)";
        $uploadItem = $pdo->prepare($loadItem);
        $uploadItem->execute(array($rute, $title, $price, 1, $pescuet, $category));
          
        move_uploaded_file($temp, $rute);
        header("Location: ../profile.php"); 

      }
    }
  }



  /* if (isset($_POST["send"])) {

    $pescuet = $_POST['pescuet'];
    $category = $_POST['category'];
    $img = $_FILES['img']['name'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $rute = "imgUploaded/$pescuet"."Products/$category/$img";

    if (isset($img) && $img != "") {

      $type = $_FILES['img']['type'];
      $temp = $_FILES['img']['tmp_name'];

      if (!((strpos($type, 'gif')  || strpos($type, 'jpg') || strpos($type, 'jpeg') || strpos($type, 'webp') || strpos($type, 'png')))) {

        echo "Error";

      } else {
        
        if ($pescuet === "Gato"){

          $loadItem = "INSERT INTO GatoProducts (img, title, price, available, category) values (?, ?, ?, ?, ?)";
          $uploadItem = $pdo->prepare($loadItem);
          $uploadItem->execute(array($img, $title, $price, 1, $category));
          
        } else if ($pescuet === "Perro") {
          
          $loadItem = "INSERT INTO PerroProducts (img, title, price, available, category) values (?, ?, ?, ?, ?)";
          $uploadItem = $pdo->prepare($loadItem);
          $uploadItem->execute(array($img, $title, $price, 1, $category));
          
        }
        
        move_uploaded_file($temp, $rute);
        header("Location: ../profile.php"); 

      }
    }
  } */
 ?>
