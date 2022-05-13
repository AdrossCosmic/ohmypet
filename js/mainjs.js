var input1 = document.getElementById("category1");
var input2 = document.getElementById("category2");
var input3 = document.getElementById("category3");
var input4 = document.getElementById("category4");
var input5 = document.getElementById("pet1");
var input6 = document.getElementById("pet2");

var label1 = document.getElementById("labelCategory1");
var label2 = document.getElementById("labelCategory2");
var label3 = document.getElementById("labelCategory3");
var label4 = document.getElementById("labelCategory4");
var label5 = document.getElementById("labelPet1");
var label6 = document.getElementById("labelPet2");

function selected (i){
    switch (i){
        case 1:
        label1.classList.add("selected");
        label2.classList.remove("selected");
        label3.classList.remove("selected");
        label4.classList.remove("selected");
            break;

        case 2:
        label1.classList.remove("selected");
        label2.classList.add("selected");
        label3.classList.remove("selected");
        label4.classList.remove("selected");
            break;

        case 3:
        label1.classList.remove("selected");
        label2.classList.remove("selected");
        label3.classList.add("selected");
        label4.classList.remove("selected");
            break;

        case 4:
        label1.classList.remove("selected");
        label2.classList.remove("selected");
        label3.classList.remove("selected");
        label4.classList.add("selected");
            break;

        case 5:
        label5.classList.add("selected");
        label6.classList.remove("selected");
            break;

        case 6:
        label5.classList.remove("selected");
        label6.classList.add("selected");
            break;

        default:
        label1.classList.remove("selected");
        label2.classList.remove("selected");
        label3.classList.remove("selected");
        label4.classList.remove("selected");
        label5.classList.remove("selected");
        label6.classList.remove("selected");
            break;
    }
}

input1.addEventListener('click', function(){
    selected(1);
});
input2.addEventListener('click', function(){
    selected(2);
});
input3.addEventListener('click', function(){
    selected(3);
});
input4.addEventListener('click', function(){
    selected(4);
});
input5.addEventListener('click', function(){
    selected(5);
});
input6.addEventListener('click', function(){
    selected(6);
});

