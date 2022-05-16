<?php
    session_start();
    header("Content-type: text/css; charset:UTF-8");
?>



 /***** Estilos Generales *****/

:root {
    --primary: #2A2A2A;
    --secondary: #363636; 
    --opaque: #D9D9D9;
    --color1: #E1ADDF; 
    --color2: #FECB84;
    --color3: #96F7B2;
    --color4: #70E5DD; 
    --color5: #EDA29F; 
    
}

* {
    padding: 0;
    marging: 0;
    list-style: none;
    text-decoration: none;
    font-family: 'Ubuntu', sans-serif;
}

.bg-color1 {
    background-color: var(--color1);
}
.bg-color2 {
    background-color: var(--color2);
}
.bg-color3 {
    background-color: var(--color3);
}
.bg-color4 {
    background-color: var(--color4);
}
.bg-color5 {
    background-color: var(--color5);
}

.button{
    cursor: pointer;
    color: black;
    text-decoration: none;
    padding: 10px;
    background: var(--color3);
    transition: 0.5s ease;
    -webkit-box-shadow: 0px 2px 2px 0px rgba(66,66,66,1);
    -moz-box-shadow: 0px 2px 2px 0px rgba(66,66,66,1);
    box-shadow: 0px 2px 2px 0px rgba(66,66,66,1);
}

.button-black{
    background: var(--primary);
    color: white;
    border: none;
}
.button-color1{
    background: var(--color1);
    color: black;
    border: none;
}
.button-color2{
    background: var(--color2);
    color: black;
    border: none;
}
.button-color3{
    background: var(--color3);
    color: black;
    border: none;
}
.button-color4{
    background: var(--color4);
    color: black;
    border: none;
}
.button-color5{
    background: var(--color5);
    color: black;
    border: none;
}

.Accesorios:hover{
    border: var(--color1) solid 2px;
}

.Alimento:hover{
    border: var(--color2) solid 2px;
}

.Deporte:hover{
    border: var(--color3) solid 2px;
}

.Salud:hover{
    border: var(--color4) solid 2px;
}

.button:hover{
    color: black;
    -webkit-box-shadow: 0px 2px 7px 0px rgba(66,66,66,1);
    -moz-box-shadow: 0px 2px 7px 0px rgba(66,66,66,1);
    box-shadow: 0px 2px 7px 0px rgba(66,66,66,1);
}

.button-black:hover{
    color: white;
}

body {
    scroll-behavior: smooth;
    background-image: url("../img/background.png");
    background-size: cover;
    background-position: center;

}

body::-webkit-scrollbar {
   background-color: var(--opaque);
   width: 6px;
}

body::-webkit-scrollbar-thumb{
    background-color: var(--color5);
    border-radius: 20px;
}


h5, h4, h3, h2, h1 {
    font-family: 'Josefin Sans', sans-serif;
}



/***** Navbar *****/

.header {
    height: 20vh;
    background: #fff;
}

.nav-item {
    color: var(--opaque); 
    transition: 0.2s;
}

.nav-item:hover{
    font-weight: 500;
    color: var(--secondary);
}

.active {
    font-weight: 500;
    font-size: 1.1rem;
    color: var(--color5);
}




/***** Index *****/


h2{
    animation: img-index 1s;
    animation-fill-mode: forwards; 
    animation-delay: 0.3s;
    opacity: 0%;
    transform: translateY(0);
}

.img1 {

    animation: img-index 2s;
    animation-delay: 0.5s;
    animation-fill-mode: forwards; 
    transform: translateY(0);
    opacity: 0%;
}

.img2 {

    animation: img-index 2s;
    animation-delay: 0.8s;
    animation-fill-mode: forwards; 
    transform: translateY(0);
    opacity: 0%;
}

@keyframes img-index{
    0%{
        transform: translateY(100px);
        opacity: 0%;
        display: none;
    }
    100%{
        transform: translateY(0);
        opacity: 100%;
    }
}

.separador {
    border-bottom: var(--primary) solid 2px;
    border-radius: 50px;
    animation: separador 2s;
    animation-fill-mode: forwards;
    animation-delay: 1s;
    opacity: 0%; 
    margin: 10% 0;
}

@keyframes separador {
    0%{
        opacity: 0%;
        width: 10%; 
    }
    100%{
        opacity: 100%;
        width: 75%;
    }
}

.ofert {

    animation: ofert 2s;
    animation-delay: 0.8s;
    animation-fill-mode: forwards; 
    transform: translateX(0);
    opacity: 0%;
}

@keyframes ofert{
    0%{
        transform: translateX(-110px);
        opacity: 0%;
        display: none;
    }
    100%{
        transform: translateX(0);
        opacity: 100%;
    }
}



/***** Store *****/

.addProducts {
    z-index: 2;
    position: fixed;
    margin: 65vh 0 2% 2%; 
    transition: 0.2s;
}

.addProducts > i:hover{
    cursor: pointer;
}

.scroll-view{
    width: 100%;
    height: auto;
    -webkit-perspective: 800;
	perspective: 800;
    display: flex;
    flex-direction: row;
    wrap: no-wrap !important;
    overflow: auto;
    -webkit-box-shadow: 0px 15px 26px -15px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 15px 26px -15px rgba(0,0,0,0.75);
    box-shadow: 0px 15px 26px -15px rgba(0,0,0,0.75);
}

.scroll-view::-webkit-scrollbar:vertical{
    display: none;

}
.scroll-view::-webkit-scrollbar {
   background-color: var(--opaque);
   height: 8px;
}

.scroll-view::-webkit-scrollbar-thumb{
    background-color: var(--color5);
    border-radius: 20px;
}

.search{
    border: solid 5px var(--color5);
    border-radius: 10px 10px 0 0;
    -webkit-box-shadow: 0px 15px 26px -15px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 15px 26px -15px rgba(0,0,0,0.75);
    box-shadow: 0px 15px 26px -15px rgba(0,0,0,0.75);
}

.searchInput{
    height: 50px;
    padding: 5px 15px;
    border: solid 2px var(--opaque);
    border-radius: 10px; 
    outline: #00000000; 
    transition: 0.5s;
}
.searchInput:focus{
    border-color: var(--color5);
}



/***** Productos de la tienda *****/

.item-store {
    width: 14rem;
    height: 22rem;
    margin: 10px 15px 40px!important;
    border: var(--opaque) solid 2px;
    border-radius: 10px 10px 0 0;
    background: white;
    padding: 0;
    transition: 0.5s ease;

	-webkit-transform-style: preserve-3d;
	transform-style: preserve-3d;
}


.item-store:hover, .form{
    -webkit-box-shadow: 0px 16px 37px -14px rgba(42,42,42,0.56);
    -moz-box-shadow: 0px 16px 37px -14px rgba(42,42,42,0.56);
    box-shadow: 0px 16px 37px -14px rgba(42,42,42,0.56);
}

.front, .back{
    width: 100%;
	height: 100%;
	position: absolute;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    border-radius: 10px 10px 0 0;
}

.front {
    cursor: pointer;
}

.back{
    display: flex;
    flex-direction: column !important;
    justify-content: center;
    -webkit-transform: rotateY(180deg);
	transform: rotateY(180deg);
}

.item-store img{
    padding: 10%;
    background: white;
    border-radius: 10px 10px 0 0px;
    border: solid 0px var(--color1);
    transition: 0.2s;
}


.icon{
    animation: rainbow 3s;
    animation-timing-funciont: ease-out;
    animation-iteration-count: infinite;
}

@keyframes rainbow {
    0%{
        color: black;
    }
    20%{
        color: var(--color1);
    }
    40%{
        color: var(--color2);
    }
    60%{
        color: var(--color3);
    }
    80%{
        color: var(--color4);
    }
    100%{
        color: black;
    }
}


/***** Formulario *****/

.input{
    height: 50px;
    padding: 5px 15px;
    margin: 10px 0;
    border: none;
    border-bottom: solid 3px var(--color3);
    transition: 0.5s;
    outline: #00000000;
}

.labelRadioInput{
    z-index: 2;
    background: var(--opaque);
    padding: 5px 10px;
    border: solid 2px #00000000;
    border-radius: 5px;
    transition: 0.5s;
}

.radioInput{
    z-index: 0 !important;
    position: absolute;
    display: none;
}

.selected{
    border-color: var(--color1);
    background: var(--color2);

}

.input:focus{
    border-color: var(--color5) !important;
}

/***** Cart *****/

.cardTitle{
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.cartItem{
    transition: 0.2s;
    border: var(--opaque) solid 2px;
    border-radius: 10px 10px 0 0;
}

.cartItem:hover{
    -webkit-box-shadow: 0px 16px 37px -14px rgba(42,42,42,0.56);
    -moz-box-shadow: 0px 16px 37px -14px rgba(42,42,42,0.56);
    box-shadow: 0px 16px 37px -14px rgba(42,42,42,0.56);
}