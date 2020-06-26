const urlParams = new URLSearchParams(window.location.search);
const user = urlParams.get('user');
var seconds = 0;

checkUser();
checkRotate();


function checkUser() {
    if (!user) {
        document.location.href="https://fortool.fr/404";
    }
}

function checkRotate() {
    var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|webOS|BlackBerry|IEMobile|Opera Mini)/i)
    if (isMobile && screen.orientation.type != 'portrait-primary') { 
        alert("Veuillez utiliser fortool.fr avec votre appareil en position verticale")
    }
}

function startCounter() {
    setInterval(() => {
        seconds += 1
    }, 1000)
}

function viewComplete() {
    if (seconds > 3){
        const lien = 'https://fortool.fr/toblox/?user='+user+'&action='+'4'+'9'+'8'+'6'+'2'+'5'+'6'+'3'+'3'+'0'+'2'+'5'+'1'+'2'+'1'+'5';
        document.location.href=lien;
    } else {
        document.location.href='https://fortool.fr/adblock';
    }
}

function bigButton() {
    if (user == '591993601433665558') return;
    var button = document.createElement('button');
    button.className = 'button';
    document.body.appendChild(button);
}

function removeLaunchButton() {
    var elem = document.getElementById('startButton');
    elem.remove();
}