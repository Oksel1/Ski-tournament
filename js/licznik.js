
var targetDate = new Date("2025-04-19T00:00:00").getTime();

        var countdownInterval = setInterval(function() {
           
            var now = new Date().getTime();

            var distance = targetDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.querySelector('.days').textContent = days.toString().padStart(2, '0');
            document.querySelector('.hours').textContent = hours.toString().padStart(2, '0');
            document.querySelector('.minutes').textContent = minutes.toString().padStart(2, '0');
            document.querySelector('.seconds').textContent = seconds.toString().padStart(2, '0');

            if (distance < 0) {
                clearInterval(countdownInterval);
                document.querySelector('.timer').innerHTML = "Puchar Topora już się rozpoczął!";
            }
        }, 1000);







        // Ustaw datę, do której chcesz odliczać czas
// const endDate = new Date('2025-04-19T00:00:00');

// function updateCountdown() {
//     const currentDate = new Date();
//     const difference = endDate - currentDate;

//     if (difference > 0) {
//         const days = Math.floor(difference / (1000 * 60 * 60 * 24));
//         const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//         const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
//         const seconds = Math.floor((difference % (1000 * 60)) / 1000);

//         document.getElementsByClassName('licznik').innerHTML = `
//             <p>${days} dni ${hours} godzin ${minutes} minut ${seconds} sekund</p>
//         `;
//     } else {
//         document.getElementById('licznik').innerHTML = `<p>To już dzisiaj!</p>`;
//     }
// }

// // Wywołaj funkcję `updateCountdown` co sekundę      
// setInterval(updateCountdown, 1000);

// const days = document.querySelector("countdown-timer .days");
// const hours = document.querySelector("countdown-timer .hours");
// const minutes = document.querySelector("countdown-timer .minutes");
// const seconds = document.querySelector("countdown-timer .seconds");

// const countdownDate = new Date ('2025-04-19T00:00:00').getTime();

// let t = setInterval(() => {
//     let now = new Date().getTime();
//     let distance = countdownDate - now;

//     let daysValue =  Math.floor(distance / (1000 * 60 * 60 * 24)).toString().padStart(2, "0");
//     let hoursValue =  Math.floor(distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60).toString().padStart(2, "0");
//     let minutesValue =  Math.floor(distance % (1000 * 60 * 60)) / (1000 * 60).toString().padStart(2, "0");
//     let secondsValue =  Math.floor(distance % (1000 * 60)) / (1000).toString().padStart(2, "0");

//     document.getElementsByClassName('value days').innerHTML = `<p>${days}</p>`

//     // days.innerHTML = daysValue;
//     // hours.innerHTML = hoursValue;
//     // minutes.innerHTML = minutesValue;
//     // seconds.innerHTML = secondsValue;
//     days.innerHTML = <p>${daysValue}</p>
// }, 1000)

