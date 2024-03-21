function verif(obj) {
    var text = document.getElementById(obj.id).textContent;
    window.addEventListener('mouseenter',
        play(text));
}

function verif1() {
    var text = document.getElementById('h2').textContent;
    window.addEventListener('load',
        play(text));
}

function play(text) {
    const alternance = new SpeechSynthesisUtterance(text);
    //alternance.rate = 1
    alternance.addEventListener('end', () => {
        text.disabled = true
    })
    text.disabled = true
    speechSynthesis.speak(alternance)
}