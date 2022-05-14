<?php 

    session_start();
    require ("php/db.php");
    include ("header.php");

    if(isset($_GET['item'])){
        $item = $_GET['item'];
        unset($cart[$item]);
        header("Location: cart.php");
        $_SESSION['cart'] = $cart;
    }

    $sumPrice = 0;

    ?>
    <!-- Contenedor -->
    <div class="col-12 d-flex justify-content-center">
        <div class="d-flex flex-column col-8">

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
                    <div class="col-11 mt-3 bg-color<?php echo $product['color'];?> row mx-auto">
                        
                    <?php 
                    
                    $last = end($product);
        
                    foreach($allItems as $key){
                        
                        $id = $key['id'];
                        $title = $key['title'];
                        $price = $key['price'];
                        $img = $key['img']; ?>
        
                        <img class="my-1 px-1 col-2 img-fluid" src="php/<?php echo $img?>" alt="">
                        <div class="col-5">
                            <h4 class="mt-4 col-10"><?php echo $title?></h4>
                            <h5><?php echo $price?>/u</h5>
                        </div>
                        <div class="col-4">
                            <h4 class="mt-4 col-11">Unidades: <?php echo $product['units']?></h4>
                            <h5>Total: <?php $totalUnits = $price * $product['units']; echo $totalUnits?>/u</h5>
                        </div>
                        <div class="col-1">
                            <a href="cart.php?item=<?php echo $item;?>" class="text-dark p-0"><i class="fa-solid fa-xmark ms-4 mt-3"></i></a>
        
                        </div>
        
                    <?php 
                
                        $sumPrice = $sumPrice + $totalUnits;} ?>
        
                    </div>
        
                    <?php endforeach;}?>
        
        </div>
        
        <div class="mt-5 col-2 d-flex flex-column justify-content-center">
            <h3 class="text-center">Precio total:</h3>
            <h5 class="text-center">$<?php echo $sumPrice?></h5>
            <a class="mx-auto text-center button button-color5"href="php/buy.php">Comprar</a>
        </div>
    </div>


<?php include ("footer.php");?>