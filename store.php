<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tienda</title>

    <?php 
    
        session_start(); 
        include("header.php"); 
        require('php/db.php');


        // Selecciona el último id de la tabla, para usarlo posteriormente con js
        $requestLastElement = "SELECT id FROM products ORDER BY id DESC LIMIT 1";
        $consultLastElement = $pdo->prepare($requestLastElement);
        $consultLastElement->execute();
        $lastElement = $consultLastElement->fetch();

        // Selecciona el primer id de la tabla, para usarlo posteriormente con js
        $requestFirstElement = "SELECT id FROM products LIMIT 1";
        $consultFirstElement = $pdo->prepare($requestFirstElement);
        $consultFirstElement->execute();
        $firstElement = $consultFirstElement->fetch();

        // Buscar productos
        if(isset($_POST['makeSearch'])){

            if (!empty($_POST['search'])){

                $search = $_POST['search'];
    
                $requestSearch = "SELECT * FROM products where title like '%$search%' or category like '%$search%' or pet like '%$search%'";
                $makeSearch = $pdo->prepare($requestSearch);
                $makeSearch->execute();
                $searchResult = $makeSearch->fetchAll();
            }
        }

        // Variable para almacenar posteriormente la url actualizada 
        $updateRute = "";

        // Petición al servidor por defecto
        $requestProducts = "SELECT * FROM products";

        // La variable $i almacena la petición evaluada previamente, el valor $x (where o and) evalúa qué cambios se añadirán a la petición
        // La función evalúa qué items mostrar según la categoría seleccionada.
        function LoadItems ($i, $x){

            // Petición al servidor por defecto
            $requestProducts = "SELECT * FROM products";

            switch ($_GET['option']){

                case 1:
                    // Evalúa la petición establecida con anterioridad (Al llamado de la función), según el valor $x, se añade WHERE o AND a la petición.
                    $requestProducts = $i .$x ."category = 'Accesorios'";
                    break;

                case 2:
                    $requestProducts = $i .$x ."category = 'Alimento'";
                    break;

                case 3:
                    $requestProducts = $i .$x ."category = 'Deporte'";
                    break;

                case 4:
                    $requestProducts = $i .$x ."category = 'Salud'";
                    break;
                    
                default: 
                    header('Location: store.php');
                    break;

                }
                
                // Devuelve la petición actualizada.
                return $requestProducts;
        }

        // Evalúa si se ha seleccionado un tipo de mascota
        if (isset($_GET['pet'])){
            
            // Evalúa la selección (de mascota) y actualiza la petición
            if ($_GET['pet'] === "1"){

                // Actualiza la petición según la selección
                $requestProducts = $requestProducts ." where pet = 'Perro'";

                // Actualiza la url según la petición 
                $updateRute = "store.php?pet=1&";
    
                // Evalúa si se ha seleccionado una categoría LUEGO del tipo de mascota
                if(isset($_GET['option'])){

                    // Actualiza la petición según la categoría seleccionada
                    $requestProducts = LoadItems($requestProducts, " and ");
                } 

            } else if ($_GET['pet'] === "2"){

                $requestProducts = $requestProducts ."  where pet = 'Gato'";
                $updateRute = "store.php?pet=2&";

                if(isset($_GET['option'])){
                    $requestProducts = LoadItems($requestProducts, " and ");
                } 

            } else{
                
                header('Location: store.php');
            }

            $sendRequestProducts = $pdo->prepare($requestProducts);
            $sendRequestProducts->execute();
            $loadProducts = $sendRequestProducts->fetchAll();

        } else {

            if (isset($_GET['option'])){

                $requestProducts = LoadItems($requestProducts, " where ");

            }

            // Consultar productos
    
            $sendRequestProducts = $pdo->prepare($requestProducts);
            $sendRequestProducts->execute();
            $loadProducts = $sendRequestProducts->fetchAll();

        }
        
    ?>

    <div class="addProducts">
        <i class="fa-solid fa-circle-plus fa-4x" data-bs-toggle="modal" data-bs-target="#addProduct"></i>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="php/addProduct.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body col-12">
                        <input class="col-12" type="file" name="img" placeholder="Agregue una imagen de su producto">
                        <input class="col-12 input" type="text" name="title" placeholder="Agergar el nombre de tu producto">
                        <textarea class="col-12 input" name="description" placeholder="Agregar una breve descripción de su producto" cols="10" rows="5"></textarea>
                        <input class="col-12 input" type="text" name="price" placeholder="Agregue el costo de su producto por unidad" id="priceInput">
                        <h5 class="mt-3">Seleccione la categoría de su producto</h5>
                        <div class="row col-12">
                            <div class="col-2 me-4">
                                <input class="radioInput" type="radio" name="category" value="Accesorios" id="category1">
                                <label class="labelRadioInput" for="category1" id="labelCategory1">Accesorios</label>
                            </div>
                            <div class="col-2 ms-4">
                                <input class="radioInput" type="radio" name="category" value="Alimento" id="category2">
                                <label class="labelRadioInput" for="category2" id="labelCategory2">Alimento</label>
                            </div>
                            <div class="col-2 ms-4">
                                <input class="radioInput" type="radio" name="category" value="Deporte" id="category3">
                                <label class="labelRadioInput" for="category3" id="labelCategory3">Deporte</label>
                            </div>
                            <div class="col-2 ms-4">
                                <input class="radioInput" type="radio" name="category" value="Salud" id="category4">
                                <label class="labelRadioInput" for="category4" id="labelCategory4">Salud</label>
                            </div>
                        </div>
                        <h5 class="mt-4">¿A quién está enfocado su producto?</h5>
                        <div class="row col-12">
                            <div class="col-2 me-2">
                                <input class="radioInput" type="radio" name="pet" value="Gato" id="pet1">
                                <label class="labelRadioInput" for="pet1" id="labelPet1">Gatos</label>
                            </div>
                            <div class="col-2">
                                <input class="radioInput" type="radio" name="pet" value="Perro" id="pet2">
                                <label class="labelRadioInput" for="pet2" id="labelPet2">Perros</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" name="send" value="Agregar">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="col-12 store">
        <div class="items-container ">
            <div class="bg-light">
                <h4 class="text-center py-3">Productos destacados</h4>

                <!-- Sección: "Elementos destacados" -->

                <div class="scroll-view">

                    <?php 
                    
                    $requestRandomItem = "SELECT * FROM products order by RAND() LIMIT 10";
                    $getRandomItem = $pdo->prepare($requestRandomItem);
                    $getRandomItem->execute();
                    $randomItem = $getRandomItem->fetchAll();

                    foreach( $randomItem as $j): 
                    
                    // Variables
                    $id = $j['id'];
                    $img = $j['img'];
                    $title = $j['title'];
                    $price = $j['price'];
                    $pet = $j['pet'];
                    $category = $j['category'];
                    $color = 0;
                    
                    if($j['pet'] === "Gato"){ $pet = "gato";} else { $pet = "perro";}
                    if($j['available'] === 1){ $available = "Disponible";} else { $available = "Agotado";}
                    if($j['descrip'] != "empty"){ $description = $j['descrip'];} else { $description = "";}
                    
                    // Definir color del producto   
                    switch ($j['category']){
                        case "Accesorios":
                            $color = 1;
                            break;

                        case "Alimento":
                            $color = 2;
                            break;

                        case "Deporte":
                            $color = 3;
                            break;

                        case "Salud":
                            $color = 4;
                            break;

                        case "Default":
                            $color = 0;
                            break;
                    } ?>

                    

                        <div class="col-4 item-store mx-auto <?php echo $category?>" id="item1.<?php echo $id?>">
                            <div class="front bg-color<?php echo $color;?>" id="front1.<?php echo $id?>">
                                <img class="img-fluid" src="php/<?php echo $img;?>" alt="" id="img1.<?php echo $id?>">
                                <div class="d-flex flex-column justify-content-between" style="height: 35%;">
                                    <div class="mx-3 mt-2">
                                        <h5 class="cardTitle"><?php echo $title;?></h5>
                                        <h5><?php echo $price;?>/u</h5>
                                    </div>
                                    <div class="row ms-2 col-12">
                                        <i class="col-1 my-1 fa-solid fa-cart-plus icon" id="iconoc1.<?php echo $id?>"></i>
                                        <p class="col-10 my-0"><?php echo $available;?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="back" id="back1.<?php echo $id?>">
                                <div class="mx-4">
                                    <h5><?php echo $title;?></h5>
                                    <h5><?php echo $price;?>/u</h5>
                                </div>
                                <div class="row mt-2 ms-2 col-12">
                                    <i class="col-1 my-1 fa-solid fa-cat icon" id="iconoa1.<?php echo $id?>"></i>
                                    <p class="col-10 my-0">Para <?php echo $pet;?>s</p>
                                    <i class="col-1 my-1 fa-solid fa-fish icon" id="iconob1.<?php echo $id?>"></i>
                                    <p class="col-10 my-0"><?php echo $category?></p>
                                </div>
                                <div class="col-12 mx-auto my-4">
                                    <a class="mx-5 button button-color<?php echo $color;?>" href="">Add to cart</a>
                                </div>

                                <?php ?>
                                <div class="row mt-2 ms-0 col-12">
                                   <a class="col-4 mx-auto text-center" href="php/deleteProduct.php?id=<?php echo $id .'&img=' .$img;?>" ><i class="fa-solid fa-trash fa-2x"></i></a>
                                   <a class="col-5 mx-auto text-center" href="" data-bs-toggle="modal" data-bs-target="#updateProduct"><i class="fa-solid fa-pen-to-square fa-2x"></i></a>
                                </div>
                                
                                

                                <?php ?>
                            </div>
                        </div> 

                    <?php endforeach;?>

                </div>
            </div>
            <div class="my-5 justify-content-center col-12">
                <div class="my-3 mx-auto d-flex justify-content-center col-12">
                    <a class="mx-2 button button-color5" href="store.php?pet=1&#items"><i class="fa-solid fa-dog me-2"></i>Para perros</a>
                    <a class="mx-2 button button-color5" href="store.php?pet=2&#items"><i class="fa-solid fa-cat me-2"></i>Para gatos</a>
                </div>
                <div class="my-3 mx-auto d-flex justify-content-center col-12">
                    <a class="mx-2 button button-primary" href="store.php#items">Todo</a>
                    <a class="mx-2 button button-color1" href="<?php if (!empty($updateRute)){ echo $updateRute ."option=1";} else {echo "store.php?option=1";}?>#items">Accesorios</a>
                    <a class="mx-2 button button-color2" href="<?php if (!empty($updateRute)){ echo $updateRute ."option=2";} else {echo "store.php?option=2";}?>#items">Alimento</a>
                    <a class="mx-2 button button-color3" href="<?php if (!empty($updateRute)){ echo $updateRute ."option=3";} else {echo "store.php?option=3";}?>#items">Deporte</a>
                    <a class="mx-2 button button-color4" href="<?php if (!empty($updateRute)){ echo $updateRute ."option=4";} else {echo "store.php?option=4";}?>#items">Salud</a>
                </div>
                <div class="my-4 mx-auto d-flex justify-content-center col-12">
                    <form action="store.php#search" method="POST">
                        <input class="searchInput" type="text" name="search" placehoder="¿Qué estás buscando?">
                        <input class="button button-color5 " type="submit" name="makeSearch" value="Buscar">
                    </form>    
                </div>

                <!-- Sección: "Búsqueda" -->

                <div class="row col-10 mx-auto justify-content-center mt-3 m-0 <?php if  (isset($searchResult)){ echo "search";}?>" id="search">

                    <?php 
                    
                        if  (isset($searchResult)){

                            echo '<h4 class="mt-4 mx-auto text-center">Resultados de la búsqueda:</h4>';

                            foreach( $searchResult as $i):

                                // Variables
                                $id = $i['id'];
                                $img = $i['img'];
                                $title = $i['title'];
                                $price = $i['price'];
                                $pet = $i['pet'];
                                $category = $i['category'];
                                $color = 0;
                                
                                if($i['pet'] === "Gato"){ $pet = "gato";} else { $pet = "perro";}
                                if($i['available'] === 1){ $available = "Disponible";} else { $available = "Agotado";}
                                if($i['descrip'] != "empty"){ $description = $i['descrip'];} else { $description = "";}
                                
                                // Definir color del producto   
                                switch ($i['category']){
                                    case "Accesorios":
                                        $color = 1;
                                        break;
        
                                    case "Alimento":
                                        $color = 2;
                                        break;
        
                                    case "Deporte":
                                        $color = 3;
                                        break;
        
                                    case "Salud":
                                        $color = 4;
                                        break;
        
                                    case "Default":
                                        $color = 0;
                                        break;
                                }
                                
                            ?>
                                
                                <div class="col-4 item-store mx-auto item2 <?php echo $category?>" id="item2.<?php echo $id?>">
                                    <div class="front bg-color<?php echo $color;?>" id="front2.<?php echo $id?>">
                                        <img class="img-fluid" src="php/<?php echo $img;?>" alt="" id="img2.<?php echo $id?>">
                                        <div class="d-flex flex-column justify-content-between" style="height: 35%;">
                                            <div class="mx-3 mt-2">
                                                <h5 class="cardTitle"><?php echo $title;?></h5>
                                                <h5><?php echo $price;?>/u</h5>
                                            </div>
                                            <div class="row ms-2 col-12">
                                                <i class="col-1 my-1 fa-solid fa-cart-plus icon" id="iconoc2.<?php echo $id?>"></i>
                                                <p class="col-10 my-0"><?php echo $available;?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="back" id="back2.<?php echo $id?>">
                                        <div class="mx-4">
                                            <h5><?php echo $title;?></h5>
                                            <h5><?php echo $price;?>/u</h5>
                                        </div>
                                        <div class="row mt-2 ms-2 col-12">
                                            <i class="col-1 my-1 fa-solid fa-cat icon" id="iconoa2.<?php echo $id?>"></i>
                                            <p class="col-10 my-0">Para <?php echo $pet;?>s</p>
                                            <i class="col-1 my-1 fa-solid fa-fish icon" id="iconob2.<?php echo $id?>"></i>
                                            <p class="col-10 my-0"><?php echo $category?></p>
                                        </div>
                                        <div class="col-12 mx-auto my-4">
                                            <a class="mx-5 button button-color<?php echo $color;?>" href="">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
        
                    <?php endforeach;}?>

                </div>

                <!-- Sección: "Todos los elementos" -->

                <div class="row col-12 justify-content-center mt-3 m-0 " id="items">

                    <?php 
                    
                        foreach( $loadProducts as $i):

                        // Variables
                        $id = $i['id'];
                        $img = $i['img'];
                        $title = $i['title'];
                        $price = $i['price'];
                        $pet = $i['pet'];
                        $category = $i['category'];
                        $color = 0;
                        
                        if($i['pet'] === "Gato"){ $pet = "gato";} else { $pet = "perro";}
                        if($i['available'] === 1){ $available = "Disponible";} else { $available = "Agotado";}
                        if($i['descrip'] != "empty"){ $description = $i['descrip'];} else { $description = "";}
                        
                        // Definir color del producto   
                        switch ($i['category']){
                            case "Accesorios":
                                $color = 1;
                                break;

                            case "Alimento":
                                $color = 2;
                                break;

                            case "Deporte":
                                $color = 3;
                                break;

                            case "Salud":
                                $color = 4;
                                break;

                            case "Default":
                                $color = 0;
                                break;
                        }
                        
                    ?>
                        
                        <div class="col-4 item-store mx-auto item3 <?php echo $category?>" id="item3.<?php echo $id?>">
                            <div class="front bg-color<?php echo $color;?>" id="front3.<?php echo $id?>">
                                <img class="img-fluid" src="php/<?php echo $img;?>" alt="" id="img3.<?php echo $id?>">
                                <div class="d-flex flex-column justify-content-between" style="height: 35%;">
                                    <div class="mx-3 mt-2">
                                        <h5 class="cardTitle"><?php echo $title;?></h5>
                                        <h5><?php echo $price;?>/u</h5>
                                    </div>
                                    <div class="row ms-2 col-12">
                                        <i class="col-1 my-1 fa-solid fa-cart-plus icon" id="iconoc3.<?php echo $id?>"></i>
                                        <p class="col-10 my-0"><?php echo $available;?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="back" id="back3.<?php echo $id?>">
                                <div class="mx-4">
                                    <h5><?php echo $title;?></h5>
                                    <h5><?php echo $price;?>/u</h5>
                                </div>
                                <div class="row mt-2 ms-2 col-12">
                                    <i class="col-1 my-1 fa-solid fa-cat icon" id="iconoa3.<?php echo $id?>"></i>
                                    <p class="col-10 my-0">Para <?php echo $pet;?>s</p>
                                    <i class="col-1 my-1 fa-solid fa-fish icon" id="iconob3.<?php echo $id?>"></i>
                                    <p class="col-10 my-0"><?php echo $category?></p>
                                </div>
                                <div class="col-12 mx-auto my-4">
                                    <a class="mx-5 button button-color<?php echo $color;?>" href="">Add to cart</a>
                                </div>
                            </div>
                        </div>

                    <?php endforeach?>

                </div>
            </div>
        </div>
    </section>

    <!-- Añade la animación a cada item -->

    <script>

        // *** Funcionamiento ***

        /* 
            * Para evitar que el script se rompa, este empieza a contar directamente desde el primer id de la tabla, 
            y se ejecuta X cantidad de veces según el id del útlimo elemento de la misma. 
        */
    
        function addAnimation(x, i){
                var carta = document.getElementById('item' + x + "." + i);
                var thatExist = !!document.getElementById('item' + x + "." + i);
                var front = document.getElementById('front' + x + "." + i);
                var back = document.getElementById('back' + x + "." + i);
                var img = document.getElementById('img' + x + "." + i);
                var a1 = document.getElementById('iconoa' + x + "." + i);
                var b1 = document.getElementById('iconob' + x + "." + i);
                var c1 = document.getElementById('iconoc' + x + "." + i);
                
                if (thatExist == true){
                    front.addEventListener('click', function(){
                    carta.style.transform = "rotateY(180deg)";
                    });
                    
                    back.addEventListener('click', function(){
                        carta.style.transform = "rotateY(0deg)";
                    });
        
                    carta.addEventListener('mouseenter', function(){
                        img.style.padding = "8%";
                        a1.classList.add('text-light');
                        b1.classList.add('text-light');
                        c1.classList.add('text-light');
                    });
                    carta.addEventListener('mouseleave', function(){
                        img.style.padding = "10%";
                        a1.classList.remove('text-light');
                        b1.classList.remove('text-light');
                        c1.classList.remove('text-light');
                    });
                }
        }

        // Almacena el id del primer item de la sección de Busqueda
        var relevantSection = !!document.getElementsByClassName('item1');
        var searchSection = !!document.getElementsByClassName('item2');
        var allSection = !!document.getElementsByClassName('item3')
        ;
        // Almacena la cantidad de columnas que existen en la base de datos
        var last = <?php echo $lastElement['id'];?>;
        var first = <?php echo $firstElement['id'];?>; 
        console.log(first);

        // Ejecuta la función addAnimation por cada item de la consulta
        for (var i = 1; i <= last; i++) {
            
            if (first == i){
                
                // Ejecuta la función si se ha realizado una busqueda
                if (searchSection == true){
                    addAnimation(1,i);
                }
                // Ejecuta la función si se ha realizado una busqueda
                if (searchSection == true){
                    addAnimation(2,i);
                }
                // Ejecuta la función si la sección "Todos los items" es visible.
                if (allSection == true){
                    addAnimation(3,i);
                }
                first = first+1;
            }
        }
        
    </script>

    <?php include("footer.php");?>