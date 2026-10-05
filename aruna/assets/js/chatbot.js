const chatBox = document.getElementById("chatBox");
const input = document.getElementById("message");
const sendBtn = document.getElementById("sendBtn");
const quickButtons = document.querySelectorAll(".quick-question button");

// ============================
// Load Chat
// ============================

window.onload = () => {

    const history = localStorage.getItem("aruna_chat");

    if(history){

        chatBox.innerHTML = history;

        chatBox.scrollTop = chatBox.scrollHeight;

    }

}

// ============================
// Save Chat
// ============================

function saveChat(){

    localStorage.setItem("aruna_chat", chatBox.innerHTML);

}

// ============================
// Bubble User
// ============================

function addUser(text){

    chatBox.innerHTML += `
    <div class="user-message">
        <div class="bubble">
            ${text}
        </div>
    </div>
    `;

    saveChat();

    chatBox.scrollTop = chatBox.scrollHeight;

}

// ============================
// Bubble Bot
// ============================

function addBot(text){

    chatBox.innerHTML += `
    <div class="bot-message">
        <div class="bubble botBubble">
            ${text}
        </div>
    </div>
    `;

    saveChat();

    chatBox.scrollTop = chatBox.scrollHeight;

}

// ============================
// Typing Animation
// ============================

function typingAnimation(){

    addBot("●");

    const bubble = document.querySelectorAll(".botBubble");

    const last = bubble[bubble.length-1];

    let i = 0;

    const anim = setInterval(()=>{

        i++;

        if(i==1) last.innerHTML="●";

        if(i==2) last.innerHTML="● ●";

        if(i==3) last.innerHTML="● ● ●";

        if(i==4) i=0;

    },350);

    return {anim,last};

}

// ============================
// Typing Effect
// ============================

function typeText(element,text){

    element.innerHTML="";

    let i=0;

    const typing=setInterval(()=>{

        element.innerHTML+=text.charAt(i);

        i++;

        chatBox.scrollTop=chatBox.scrollHeight;

        if(i>=text.length){

            clearInterval(typing);

            saveChat();

        }

    },15);

}

// ============================
// Dummy AI
// ============================

async function botReply(message){

    const loading = typingAnimation();

    try{

        const response = await fetch("api/chatbot.php",{
            method:"POST",
            headers:{
                "Content-Type":"application/json"
            },
            body:JSON.stringify({
                message:message
            })
        });

        // LIHAT RESPONSE ASLI
        const text = await response.text();

        console.log(text);

        const data = JSON.parse(text);

        console.log(data);

        clearInterval(loading.anim);

        typeText(loading.last,data.reply);

    }

    catch(e){

        clearInterval(loading.anim);

        loading.last.innerHTML=e.message;

    }

}

// ============================
// Send Message
// ============================

function sendMessage(){

    const text=input.value.trim();

    if(text=="") return;

    addUser(text);

    input.value="";

    botReply(text);

}

// ============================
// Event
// ============================

sendBtn.onclick=sendMessage;

input.addEventListener("keypress",(e)=>{

    if(e.key==="Enter"){

        sendMessage();

    }

});

quickButtons.forEach(btn=>{

    btn.onclick=()=>{

        input.value=btn.innerText;

        sendMessage();

    }

});