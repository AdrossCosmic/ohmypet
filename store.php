<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tienda</title>

    <?php include("header.php");?>

    <section class="col-12 store">
        <div class="items-container ">
            <div class="bg-light">
                <h4 class="text-center py-3">Productos destacados</h4>
                <div class="scroll-view">



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


                </div>
            </div>
            <div class="my-5 list-view row justify-content-center col-12">
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


            </div>
        </div>
    </section>

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