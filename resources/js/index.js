leftArrow.onclick = function(){
    alert("la");
}
rightArrow.onclick = function(){
    alert("ra");
}
let prods = document.getElementsByClassName("prodDiv");
let modals = document.getElementsByClassName("modal");
let closes = document.getElementsByClassName("close");
let curProdsIndex;

prods[0].onclick = function(){
    curProdsIndex = 0;
    modals[curProdsIndex].style.display = "flex";
}
prods[1].onclick = function(){
    curProdsIndex = 1;
    modals[curProdsIndex].style.display = "flex";
}
prods[2].onclick = function(){
    curProdsIndex = 2;
    modals[curProdsIndex].style.display = "flex";
}
prods[3].onclick = function(){
    curProdsIndex = 3;
    modals[curProdsIndex].style.display = "flex";
}
prods[4].onclick = function(){
    curProdsIndex = 4;
    modals[curProdsIndex].style.display = "flex";
}
prods[5].onclick = function(){
    curProdsIndex = 5;
    modals[curProdsIndex].style.display = "flex";
}
prods[6].onclick = function(){
    curProdsIndex = 6;
    modals[curProdsIndex].style.display = "flex";
}
prods[7].onclick = function(){
    curProdsIndex = 7;
    modals[curProdsIndex].style.display = "flex";
}
prods[8].onclick = function(){
    curProdsIndex = 8;
    modals[curProdsIndex].style.display = "flex";
}
prods[9].onclick = function(){
    curProdsIndex = 9;
    modals[curProdsIndex].style.display = "flex";
}
prods[10].onclick = function(){
    curProdsIndex = 10;
    modals[curProdsIndex].style.display = "flex";
}
prods[11].onclick = function(){
    curProdsIndex = 11;
    modals[curProdsIndex].style.display = "flex";
}
prods[12].onclick = function(){
    curProdsIndex = 12;
    modals[curProdsIndex].style.display = "flex";
}
document.onclick = function(e){
    if(e.target == modals[curProdsIndex]||e.target == closes[curProdsIndex]){
        modals[curProdsIndex].style.display = "none";
    }
}

