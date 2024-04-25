// Ustaw datę, do której chcesz odliczać czas
const endDate = new Date('2025-04-19T00:00:00');

function updateCountdown() {
    const currentDate = new Date();
    const difference = endDate - currentDate;

    if (difference > 0) {
        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        document.getElementById('licznik').innerHTML = `
            <p>${days} dni ${hours} godzin ${minutes} minut ${seconds} sekund</p>
        `;
    } else {
        document.getElementById('licznik').innerHTML = `<p>To już dzisiaj!</p>`;
    }
}

// Wywołaj funkcję `updateCountdown` co sekundę
setInterval(updateCountdown, 1000);