const sliderImg = document.querySelector("#slider img");
const prev = document.getElementById("prev");
const next = document.getElementById("next");

const urlImg = [
    "./assets/image/one-piece.jpg",
    "./assets/image/death-note.jpg",
    "./assets/image/moriarty.jpg",
    
];
// 1ere étape : je déclare un index
let i = 0;
sliderImg.src = urlImg[i];
next.addEventListener(
    "click",
    function () {
        
        // 3eme étape : limité index à la taille de mon tableau -1
        if(i === urlImg.length-1){
            i = 0;
            sliderImg.src = urlImg[i];
        }else{
            // 2nd étape : j'incrémente mon index
        //i = i+1;
        i++; //incrémentation
        // je dois réaffecter src avec la nouvelle valeur de i
            sliderImg.src = urlImg[i];
    }
}
)
prev.addEventListener(
    "click",
    function() {
        if (i === 0) {
            i = urlImg.length-1;
            sliderImg.src = urlImg[i];
        }else{
            i--;
            sliderImg.src = urlImg[i];
        }
    }
)
setInterval(
    function(){
        if(i === urlImg.length-1){
            i = 0;
            sliderImg.src = urlImg[i];
        }else{
        i++; 
            sliderImg.src = urlImg[i];
    }
    },
    4000
)