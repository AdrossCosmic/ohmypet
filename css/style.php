<?php
    session_start();
    header("Content-type: text/css; charset:UTF-8");
?>


:root {
    --primary: #2A2A2A;
    --secondary: #363636; 
    --opaque: #D9D9D9;
    --color1: #9698e1;
    --color2: #93c5ed;
    --color3: #c193ed; 
    --color4: #ED93E3; 
    --color5: #EDA29F; 
    
}

* {
    padding: 0;
    marging: 0;
    list-style: none;
    text-decoration: none;
    font-family: 'Mali', cursive;
}

body {
    scroll-behavior: smooth;
    background-image: url("../img/background.png");
    background-size: cover;
    background-position: center;

}

body::-webkit-scrollbar {
  display: none;
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
}

.scroll-view::-webkit-scrollbar {
   background-color: var(--opaque);
   height: 10px;
}

.scroll-view::-webkit-scrollbar-thumb{
    background-color: var(--color1);
    border-radius: 20px;
}

.item-store {
    width: 14rem;
    height: 22rem;
    margin: 10px 15px !important;
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
    border: var(--color1) solid 2px;
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

.item-store:nth-child(2n+1){
    background: var(--color4);
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

.button:hover{
    color: black;
    -webkit-box-shadow: 0px 2px 7px 0px rgba(66,66,66,1);
    -moz-box-shadow: 0px 2px 7px 0px rgba(66,66,66,1);
    box-shadow: 0px 2px 7px 0px rgba(66,66,66,1);
}

.icon{
    color: black;
    transition: 0.2s;
}


    