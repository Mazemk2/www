// Funktion, um sechs einzigartige und aufsteigend sortierte Zufallszahlen zu generieren
function generateLottoNumbers() {
    let numbers = [];
    while (numbers.length < 6) {
        let randomNumber = Math.floor(Math.random() * 49) + 1;
        if (!numbers.includes(randomNumber)) {
            numbers.push(randomNumber);
        }
    }
    numbers.sort((a, b) => a - b);
    return numbers;
}

// Lottozahlen generieren und im <p>-Element anzeigen
function displayLottoNumbers() {
    const lottoNumbers = generateLottoNumbers();
    document.getElementById('lotto-numbers').textContent = `Ihre Lottozahlen: ${lottoNumbers.join(', ')}`;
}

// Schriftgrößenänderung basierend auf dem Range-Input
document.getElementById('font-size-range').addEventListener('input', function () {
    const fontSize = this.value + 'px';
    document.body.style.fontSize = fontSize;
});

// Zahlenfelder für 6 aus 49 generieren
function generateNumberGrid() {
    const gridContainer = document.querySelector('.number-grid');
    for (let i = 1; i <= 49; i++) {
        let numberButton = document.createElement('button');
        numberButton.textContent = i;
        numberButton.classList.add('number-button');
        numberButton.addEventListener('click', function () {
            this.classList.toggle('selected');
        });
        gridContainer.appendChild(numberButton);
    }
}

// Seite initialisieren
document.addEventListener('DOMContentLoaded', function () {
    displayLottoNumbers();
    generateNumberGrid();
});
