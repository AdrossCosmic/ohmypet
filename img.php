
<?php 

if(isset($_POST['enviar'])){

    $img = $_FILES['img']['name'];
    $type = $_FILES['img']['type'];
    $temp = $_FILES['img']['tmp_name'];
    $name = "akjsdjkajksjkda";
    
    if (strpos($type, 'jpeg')){
        $newFileName = $name .".jpeg";

    } else {
        echo " no </br>";
    }

    echo $img ."</br>";
    echo $type ."</br>";
    echo $temp ."</br>";
    echo $name ."</br>";
    echo $newFileName ."</br>";

    $rute = "img/$newFileName";

    // move_uploaded_file($temp, $rute);

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $name = substr(str_shuffle($permitted_chars), 0, 12);

    if (strpos($type, 'jpg')){
        $type = ".jpg";
    } else if (strpos($type, 'jpeg')){
        $type = ".jpeg";
    } else if (strpos($type, 'png')){
        $type = ".png";
    } else if (strpos($type, 'webp')){
        $type = ".webp";
    } else {
        $type = "formato no permitido";
    }
    $name = $name .$type;
    echo $name;


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="img.php" method="post" enctype="multipart/form-data">
        <input type="file" name="img">
        <input type="submit" name="enviar" value="enviar">
    </form>
</body>
</html>