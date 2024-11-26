
let dayOfweek = document.getElementById("dayOfWeek");
let date = document.getElementById("date");
var week = ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"];

function scrollDown(){
    let div = document.getElementById("chat_div");
    div.scrollTo(0, div.scrollHeight);
}

// window.addEventListener('show-update-form', e => {
//     let form = document.getElementById('productUpdateForm');
//     form.modal('show');
// })
// window.addEventListener('show-update-form', (id) => {
//     // console.log(id);
//     $('#productUpdateForm').modal('show', id);
// })
// if(date.value != null){
//     dayOfweek.value = week[date.valueAsDate.getUTCDay()];
// }
// date.onchange = function(){
//     var d = date.valueAsDate.getUTCDay()
//     dayOfweek.value = week[d];
// }



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

