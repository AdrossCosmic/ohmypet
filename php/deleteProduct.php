<?php 

    require("db.php");

    if(!isset($_SESSION['loggedin'])){
        header("Location: login.php");
    }

    $id = $_GET['id'];
    $img = $_GET['img'];

    $selectItem = "DELETE FROM products where id = ?";
    $deleteItem = $pdo->prepare($selectItem);
    $deleteItem->execute(array($id));

     if ($deleteItem){
         unlink($img);
         header('Location: ../store.php');
    }

?>