<?php
    session_start();
    header("Content-type: text/css; charset:UTF-8");
?>


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


.header {
    height: 20vh;
    background: #fff;
}

.nav-item {
    color: var(--opaque); 
}

.nav-item:hover{
    font-weight: 500;
    color: var(--secondary);
}

.active {
    font-weight: 500;
    color: var(--primary);
}

.notify p{
    font-family: 'Rancho', cursive;
    color: var(--secondary);
}




.index div:first-child{
    height: 70vh;
}

h2{
    animation: img-index 1s;
    animation-fill-mode: forwards; 
    animation-delay: 0.3s;
    opacity: 0%;
    transform: translateY(0);
}

.index div img {
    padding-right: 10% !important;
    margin-top: 10vh;
    display: inline-block;
    animation: img-index 1s;
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
    border-bottom: var(--primary) solid 1.2px;
    width: 10%;
    animation: separador 2s;
    animation-fill-mode: forwards;
    animation-delay: 0.8s;
    opacity: 0%; 
    margin: 2% 0;
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


.addProducts {
    z-index: 2;
    position: fixed;
    margin: 30% 0 2% 2%; 
    transition: 0.2s;
}

.addProducts i:hover{
    cursor: pointer;
    -webkit-box-shadow: 0px 16px 37px -14px rgba(42,42,42,0.56);
    -moz-box-shadow: 0px 16px 37px -14px rgba(42,42,42,0.56);
    box-shadow: 0px 16px 37px -14px rgba(42,42,42,0.56);

}

.input{
    height: 50px;
    padding: 5px 15px;
    margin: 10px auto;
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

.scroll-view{
    width: 100%;
    height: 72vh;
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


.item-store:hover{
    cursor: pointer;
    -webkit-box-shadow: 0px 16px 37px -14px rgba(42,42,42,0.56);
    -moz-box-shadow: 0px 16px 37px -14px rgba(42,42,42,0.56);
    box-shadow: 0px 16px 37px -14px rgba(42,42,42,0.56);
}

.Accesorios:hover{
    border: var(--color1) solid 2px;
}

.Alimento:hover{
    border: var(--color2) solid 2px;
}

.Deporte{
    border: var(--color3) solid 2px;
}

.Salud{
    border: var(--color4) solid 2px;
}


.front, .back{
	width: 100%;
	height: 100%;
	position: absolute;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    border-radius: 10px 10px 0 0;
}


.back{
    display: flex;
    flex-direction: column !important;
    justify-content: center;
    -webkit-transform: rotateY(180deg);
	transform: rotateY(180deg);
}

.description{

}

.item-store img{
    padding: 10%;
    background: white;
    border-radius: 10px 10px 0 0px;
    border: solid 0px var(--color1);
    transition: 0.2s;
}

.cardTitle{
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.button{
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

.button:hover{
    color: black;
    -webkit-box-shadow: 0px 2px 7px 0px rgba(66,66,66,1);
    -moz-box-shadow: 0px 2px 7px 0px rgba(66,66,66,1);
    box-shadow: 0px 2px 7px 0px rgba(66,66,66,1);
}

.button-black:hover{
    color: white;
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


    