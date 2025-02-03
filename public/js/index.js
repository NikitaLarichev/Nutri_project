let nav = document.getElementById("nav");
let main = document.getElementById("main");

// function scrollDown(){
//     let div = document.getElementById("chat_div");
//     div.scrollTo(0, div.scrollHeight);
// }

main.style.paddingTop = nav.offsetHeight + 10 + 'px';

window.addEventListener('resize', (e) => {
    main.style.paddingTop = nav.offsetHeight + 10 + 'px';
    console.log(nav.offsetTop);
});

function getAge(bithday){
    var now = new Date();
    var currentYear = now.getFullYear();
    var bornYear = bithday.getFullYear();
    var age = currentYear - bornYear;
    var month = bithday.getMonth();
    var day = bithday.getDate();
    if(month > now.getMonth()){
        age = age - 1;
    }
    if(month == now.getMonth() && day > now.getDate()){
        age = age - 1;
    }
    var text = "";
    if(age%10==0 || age%10==5 || age%10==6 || age%10==7 || age%10==8 || age%10==9)
        text = " лет";
    else if(age%10==2 || age%10==3 || age%10==4)
        text = " года";
    else
        text = " год";
    return age + text;
}
// window.addEventListener('show-update-form', e => {
//     let form = document.getElementById('productUpdateForm');
//     form.modal('show');
// })
// window.addEventListener('show-update-form', (id) => {
//     // console.log(id);
//     $('#productUpdateForm').modal('show', id);
// })




// leftArrow.onclick = function(){
//     alert("la");
// }
// rightArrow.onclick = function(){
//     alert("ra");
// }
// let prods = document.getElementsByClassName("prodDiv");
// let modals = document.getElementsByClassName("modal");
// let closes = document.getElementsByClassName("close");
// let eee = document.get
// let curProdsIndex;

// prods[0].onclick = function(){
//     curProdsIndex = 0;
//     modals[curProdsIndex].style.display = "flex";
// }
// prods[1].onclick = function(){
//     curProdsIndex = 1;
//     modals[curProdsIndex].style.display = "flex";
// }
// prods[2].onclick = function(){
//     curProdsIndex = 2;
//     modals[curProdsIndex].style.display = "flex";
// }
// prods[3].onclick = function(){
//     curProdsIndex = 3;
//     modals[curProdsIndex].style.display = "flex";
// }
// prods[4].onclick = function(){
//     curProdsIndex = 4;
//     modals[curProdsIndex].style.display = "flex";
// }
// prods[5].onclick = function(){
//     curProdsIndex = 5;
//     modals[curProdsIndex].style.display = "flex";
// }
// prods[6].onclick = function(){
//     curProdsIndex = 6;
//     modals[curProdsIndex].style.display = "flex";
// }
// prods[7].onclick = function(){
//     curProdsIndex = 7;
//     modals[curProdsIndex].style.display = "flex";
// }
// prods[8].onclick = function(){
//     curProdsIndex = 8;
//     modals[curProdsIndex].style.display = "flex";
// }
// prods[9].onclick = function(){
//     curProdsIndex = 9;
//     modals[curProdsIndex].style.display = "flex";
// }
// prods[10].onclick = function(){
//     curProdsIndex = 10;
//     modals[curProdsIndex].style.display = "flex";
// }
// prods[11].onclick = function(){
//     curProdsIndex = 11;
//     modals[curProdsIndex].style.display = "flex";
// }
// prods[12].onclick = function(){
//     curProdsIndex = 12;
//     modals[curProdsIndex].style.display = "flex";
// }
// document.onclick = function(e){
//     if(e.target == modals[curProdsIndex]||e.target == closes[curProdsIndex]){
//         modals[curProdsIndex].style.display = "none";
//     }
// }

