<?php

  session_start(); require("db.php");

  if (isset($_POST["send"])) {

    $category = $_POST['category'];
    $img = $_FILES['img']['name'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $pet = $_POST['pet'];

    // Genera un nombre aleatorio para reemplazar el del archivo
    $permittedChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $name = substr(str_shuffle($permittedChars), 0, 12);

    // Verifica si se agregó una descripción 
    if (!empty($_POST['description'])){
      $description = $_POST['description'];
    } else {
      $description = "empty";
    }
    
    // Verifica si se añadió una foto
    if (isset($img) && $img != "") {

      // Alamecena tipo/extención del archivo
      $type = $_FILES['img']['type'];
      // Almacena el nombre temporal del archivo (generado por php)
      $temp = $_FILES['img']['tmp_name'];

      // Reemplaza el tipo/extención por únicamente la extención
      // Busca si la combinación de carácteres existe en el argimento
      if (strpos($type, 'jpg')){
          $type = ".jpg";
      } else if (strpos($type, 'jpeg')){
          $type = ".jpeg";
      } else if (strpos($type, 'png')){
          $type = ".png";
      } else if (strpos($type, 'webp')){
          $type = ".webp";
      } else {
        
        $_SESSION['error'] = 2;
        header("Location: ../store.php");
      }

      // Concatena el nombre generado y la extención del archivo
      $name = $name .$type;
      // Almacena la ruta en la que se guardará el archivo 
      $rute = "imgUploaded/$pet"."Products/$category/$name";

      $loadItem = "INSERT INTO products (img, title, descrip, price, available, pet, category) values (?, ?, ?, ?, ?, ?, ?)";
      $uploadItem = $pdo->prepare($loadItem);
      $uploadItem->execute(array($rute, $title, $description, $price, 1, $pet, $category));
      
      // Mueve el archivo a la ruta especificada
      move_uploaded_file($temp, $rute);
      header("Location: ../store.php"); 

    }

    $_SESSION['error'] = 1;
    header("Location: ../store.php");

  }
