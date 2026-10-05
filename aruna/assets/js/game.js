// ============================
// DATA SAMPAH
// ============================

const wastes = [

{ emoji:"🍌", name:"Kulit Pisang", type:"organik" },
{ emoji:"🥬", name:"Sayuran", type:"organik" },
{ emoji:"🍎", name:"Sisa Buah", type:"organik" },
{ emoji:"🍚", name:"Sisa Makanan", type:"organik" },
{ emoji:"🍂", name:"Daun Kering", type:"organik" },

{ emoji:"🧴", name:"Botol Plastik", type:"anorganik" },
{ emoji:"🥫", name:"Kaleng", type:"anorganik" },
{ emoji:"📄", name:"Kertas", type:"anorganik" },
{ emoji:"🍾", name:"Botol Kaca", type:"anorganik" },
{ emoji:"🥤", name:"Gelas Plastik", type:"anorganik" },

{ emoji:"🔋", name:"Baterai", type:"b3" },
{ emoji:"💡", name:"Lampu Neon", type:"b3" },
{ emoji:"🛢️", name:"Oli Bekas", type:"b3" },
{ emoji:"🧪", name:"Cat", type:"b3" },
{ emoji:"☠️", name:"Limbah Kimia", type:"b3" }

];

// ============================

let score = 0;
let benar = 0;
let salah = 0;
let time = 60;

let currentWaste;
let timer;

// ============================

const startScreen = document.getElementById("startScreen");
const gameArea = document.getElementById("gameArea");
const resultScreen = document.getElementById("resultScreen");

const timerText = document.getElementById("timer");
const scoreText = document.getElementById("score");
const progressBar = document.getElementById("progressBar");

const wasteEmoji = document.getElementById("wasteEmoji");
const wasteName = document.getElementById("wasteName");

const status = document.getElementById("status");

const startBtn = document.getElementById("startBtn");

const finalScore = document.getElementById("finalScore");
const accuracy = document.getElementById("accuracy");
const correct = document.getElementById("correct");
const wrong = document.getElementById("wrong");
const finalStars = document.getElementById("finalStars");

// ============================

function randomWaste(){

currentWaste = wastes[Math.floor(Math.random()*wastes.length)];

wasteEmoji.innerHTML = currentWaste.emoji;
wasteName.innerHTML = currentWaste.name;

wasteEmoji.classList.remove("show");
void wasteEmoji.offsetWidth;
wasteEmoji.classList.add("show");

}

// ============================

function updateProgress(){

progressBar.style.width = (time/60)*100 + "%";

}

// ============================

function finishGame(){

clearInterval(timer);

gameArea.classList.add("d-none");

resultScreen.classList.remove("d-none");

finalScore.innerHTML = score;

correct.innerHTML = benar;

wrong.innerHTML = salah;

let total = benar+salah;

let persen = total==0 ? 0 : Math.round((benar/total)*100);

accuracy.innerHTML = persen+"%";

if(score>=180){

finalStars.innerHTML="⭐⭐⭐⭐⭐";

}else if(score>=140){

finalStars.innerHTML="⭐⭐⭐⭐";

}else if(score>=100){

finalStars.innerHTML="⭐⭐⭐";

}else if(score>=60){

finalStars.innerHTML="⭐⭐";

}else{

finalStars.innerHTML="⭐";

}

}

// ============================

function startGame(){

startScreen.classList.add("d-none");

gameArea.classList.remove("d-none");

randomWaste();

timer=setInterval(()=>{

time--;

timerText.innerHTML=time;

updateProgress();

if(time<=0){

finishGame();

}

},1000);

}

// ============================

startBtn.onclick=function(){

startGame();

};

// ============================

document.querySelectorAll(".answer-btn").forEach(button=>{

button.onclick=function(){

let answer=this.dataset.answer;

if(answer===currentWaste.type){

score+=10;

benar++;

status.innerHTML="✅ Benar!";

status.className="status-box correct";

}else{

score-=5;

salah++;

status.innerHTML="❌ Salah!";

status.className="status-box wrong";

document.querySelector(".waste-card").classList.add("shake");

setTimeout(()=>{

document.querySelector(".waste-card").classList.remove("shake");

},400);

}

scoreText.innerHTML=score;

randomWaste();

};

});