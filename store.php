<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tienda</title>

    <?php session_start(); include("header.php"); require('php/db.php');
    
    
        // Comsultar productos

        $requestProducts = "SELECT * FROM products";
        $sendRequestProducts = $pdo->prepare($requestProducts);
        $sendRequestProducts->execute();
        $loadProducts = $sendRequestProducts->fetchAll();
    
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
                <div class="scroll-view">
                </div>
            </div>
            <div class="my-5 list-view row justify-content-center col-12">
                <div class="ms-5 d-flex col-12">
                    <a class="mx-2 btn btn-dark" href="">Todo</a>
                    <a class="mx-2 btn btn-warning" href="">Alimento</a>
                    <a class="mx-2 btn btn-primary" href="">Accesorios</a>
                    <a class="mx-2 btn btn-success" href="">Deporte</a>
                    <a class="mx-2 btn btn-danger" href="">Salud</a>
                </div>
                <div class="row col-10 mt-3 mx-auto">
                <input type="button" onClick="validar(<?php echo $num; ?>)">

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
                        
                        <div class="col-4 item-store mx-auto p-0 m-0" id="item<?php echo $id?>">
                            <div class="front bg-color<?php echo $color;?>" id="front<?php echo $id?>">
                                <img class="img-fluid" src="php/<?php echo $img;?>" alt="" id="img<?php echo $id?>">
                                <div class="ms-3 me-1 mt-3">
                                    <h5><?php echo $title;?></h5>
                                    <h5><?php echo $price;?>/u</h5>
                                </div>
                                <div class="row ms-2 col-12 mt-3">
                                    <i class="col-1 my-1 fa-solid fa-cart-plus icon" id="iconoc<?php echo $id?>"></i>
                                    <p class="col-10 my-0"><?php echo $available;?></p>
                                </div>
                            </div>
                            <div class="back" id="back<?php echo $id?>">
                                <div class="row ms-2 col-12 ">
                                    <i class="col-1 my-1 fa-solid fa-cat icon" id="iconoa<?php echo $id?>"></i>
                                    <p class="col-10 my-0">Para <?php echo $pet;?>s</p>
                                    <i class="col-1 my-1 fa-solid fa-fish icon" id="iconob<?php echo $id?>"></i>
                                    <p class="col-10 my-0"><?php echo $category?></p>
                                </div>
                                <div class="col-12 mx-auto my-5">
                                    <a class="mx-5 button" href="">Add to cart</a>
                                </div>
                            </div>
                        </div>

                            <script>
                    
                                for (var i = 0; i <= <?php echo $id?>; i++){

                                    var carta = document.getElementById('item<?php echo $id?>');
                                    var front = document.getElementById('front<?php echo $id?>');
                                    var back = document.getElementById('back<?php echo $id?>');
                                    var img = document.getElementById('img<?php echo $id?>');
                                    var a1 = document.getElementById('iconoa<?php echo $id?>');
                                    var b1 = document.getElementById('iconob<?php echo $id?>');
                                    var c1 = document.getElementById('iconoc<?php echo $id?>');
                        
                                    front.addEventListener('click', function(){
                                        carta.style.transform = "rotateY(180deg)";
                                        console.log(<?php echo $id?>);
                                    });
                                    
                                    back.addEventListener('click', function(){
                                        carta.style.transform = "rotateY(0deg)";
                                        console.log(<?php echo $id?>);
                                    });
                        
                                    carta.addEventListener('mouseenter', function(){
                                        img.style.padding = "8%";
                                        a1.classList.add('text-light');
                                        b1.classList.add('text-light');
                                        c1.classList.add('text-light');
                                        console.log(<?php echo $id?>);
                                    });
                                    carta.addEventListener('mouseleave', function(){
                                        img.style.padding = "10%";
                                        a1.classList.remove('text-light');
                                        b1.classList.remove('text-light');
                                        c1.classList.remove('text-light');
                                        console.log(<?php echo $id?>);
                                    });

                                    
                                }

                                function validar(num){
                                    for(j=1;j<=num;j++){
                                        window['cumple']='cumple'+j;
                                        window['campo']=document.getElementById(cumple).value;/*en la variable campo ya queda el valor de cada campo 'cumple'*/
                                    }
                                }
                    
                            </script>

                    <?php endforeach?>

                </div>
            </div>
        </div>
    </section>



    <!-- <script>
                    
                                var carta = document.getElementById('item<?php echo $id?>');
                                var front = document.getElementById('front<?php echo $id?>');
                                var back = document.getElementById('back<?php echo $id?>');
                                var img = document.getElementById('img<?php echo $id?>');
                                var a1 = document.getElementById('iconoa<?php echo $id?>');
                                var b1 = document.getElementById('iconob<?php echo $id?>');
                                var c1 = document.getElementById('iconoc<?php echo $id?>');
                    
                                front.addEventListener('click', function(){
                                    carta.style.transform = "rotateY(180deg)";
                                    console.log(<?php echo $id?>);
                                });
                                
                                back.addEventListener('click', function(){
                                    carta.style.transform = "rotateY(0deg)";
                                    console.log(<?php echo $id?>);
                                });
                    
                                carta.addEventListener('mouseenter', function(){
                                    img.style.padding = "8%";
                                    a1.classList.add('text-light');
                                    b1.classList.add('text-light');
                                    c1.classList.add('text-light');
                                    console.log(<?php echo $id?>);
                                });
                                carta.addEventListener('mouseleave', function(){
                                    img.style.padding = "10%";
                                    a1.classList.remove('text-light');
                                    b1.classList.remove('text-light');
                                    c1.classList.remove('text-light');
                                    console.log(<?php echo $id?>);
                                });
                    
                            </script> -->
    <!-- <section class="col-12 store">
        <div class="row col-12 items-container">
            <div class="col-4 item-store mx-auto p-0 m-0" id="item1">
                <div class="front" id="front">
                    <img class="img-fluid" src="img/wiskas.jpg" alt="" id="img1">
                    <div class="ms-3 mt-3">
                        <h4>Wiskas 9kg</h4>
                        <h5>150.000</h5>
                    </div>
                    <div class="row ms-2 col-12 mt-3">
                        <i class="col-1 my-1 fa-solid fa-cat icon" id="iconoa1"></i>
                        <p class="col-10 my-0">Para gatos</p>
                        <i class="col-1 my-1 fa-solid fa-fish icon" id="iconob1"></i>
                        <p class="col-10 my-0">Alimento</p>
                        <i class="col-1 my-1 fa-solid fa-cart-plus icon" id="iconoc1"></i>
                        <p class="col-10 my-0" >Disponible</p>
                    </div>
                </div>
                <div class="back" id="back">
                    <div class="col-12 mx-auto my-5">
                        <a class="mx-5 button" href="">Add to cart</a>
                    </div>
                </div>
            </div>

            <script>

                var carta = document.getElementById('item1');
                var front = document.getElementById('front');
                var back = document.getElementById('back');
                var img = document.getElementById('img1');
                var a1 = document.getElementById('iconoa1');
                var b1 = document.getElementById('iconob1');
                var c1 = document.getElementById('iconoc1');

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

            </script>
        </div>
    </section> -->

    <?php include("footer.php");?>