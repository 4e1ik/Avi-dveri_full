'use strict'

let num;
function getNum  (min, max){
    while (!(num >= min && num < max)){
        num = min + Math.random() * (max - min);
    }
    return num;
}

// alert(getNum(1, 5));