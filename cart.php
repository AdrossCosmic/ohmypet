<?php 

    session_start();
    $_SESSION['pageActive'] = "cart";
    include ("header.php");
    require ("php/db.php");

    if(!isset($_SESSION['loggedin'])){
        header("Location: login.php");
    }

    if(isset($_GET['item'])){
        $item = $_GET['item'];
        unset($cart[$item]);
        header("Location: cart.php");
        $_SESSION['cart'] = $cart;
    }

    $sumPrice = 0;

    ?>
    <!-- Contenedor -->
    <div class="col-12 d-md-flex justify-content-center">
        <div class="d-flex flex-column col-sm-12 col-md-8">

            <?php

            // La función realiza una consulta según el id almacenado en el carrito de compras. 
            // Es necesario pasar como argumento la variable que almacena la base de datos ($pdo).

            function request($id, $pdo){

                $requestProducts = "SELECT * FROM products WHERE id = ?";
                $consultProducts = $pdo->prepare($requestProducts);
                $consultProducts->execute(array($id));
                $result = $consultProducts->fetchAll();

                return($result);
            }

            // La varioable Cart almacena Arreglos, clada arreglo contiene un Id y la cantidad de productos agregados
            // Es necesario asignarle un nombre clave a cada Arreglo para luego acceder a sus claves propias.

            /* Ejemplo: 

                Cart { 
                    Product1 {
                        id = N;
                        units = N;
                    }
                    Product2 {
                        id = N;
                        units = N;
                    }
                }
            */

            if(isset($_SESSION['cart'])){
                foreach($cart as $item => $product):

                    $allItems = request($product['id'], $pdo); ?>

                    
        
                    <!-- Contenedor de cada item -->
                    <div class="cartItem col-11 mt-3 bg-color<?php echo $product['color'];?> d-flex mx-auto">
                        
                    <?php 
                    
                    $last = end($product);
        
                    foreach($allItems as $key){
                        
                        $id = $key['id'];
                        $title = $key['title'];
                        $price = $key['price'];
                        $img = $key['img']; ?>
                        
        
                        <div class="col-2">
                            <img class="my-1 px-1 img-fluid" src="php/<?php echo $img?>" alt="">
                        </div>
                        <div class="col-5">
                            <h4 class="ms-2 mt-2 col-8"><?php echo $title?></h4>
                            <h5 class="ms-2 "><?php echo $price?>/u</h5>
                        </div>
                        <div class="col-4">
                            <h4 class="ms-2 mt-2 col-11">Unidades: <?php echo $product['units']?></h4>
                            <h5 class="ms-2">Total: <?php $totalUnits = $price * $product['units']; echo $totalUnits?>/u</h5>
                        </div>
                        <div class="col-1">
                            <a href="cart.php?item=<?php echo $item;?>" class="text-dark p-0"><i class="fa-solid fa-xmark ms-4 mt-1"></i></a>
        
                        </div>
        
                    <?php 
                
                        $sumPrice = $sumPrice + $totalUnits;} ?>
        
                    </div>
        
                    <?php endforeach;}?>
        
        </div>
        
        <div class="my-5 col-sm-12 col-md-2 d-flex flex-column justify-content-center">
            <h3 class="text-center">Precio total:</h3>
            <h5 class="text-center">$<?php echo $sumPrice?></h5>
            <a class="mx-auto text-center button button-color5"href="php/buy.php">Comprar</a>
        </div>
    </div>


<?php include ("footer.php");?>