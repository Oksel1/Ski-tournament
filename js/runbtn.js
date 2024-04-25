const yesButton = document.querySelector('#przyciskTak');
const noButton = document.querySelector('#przyciskNie');

const moveNoButton = () => {
var x = Math.random() * (window.innerWidth - przyciskNie.offsetWidth);
var y = Math.random() * (window.innerHeight - przyciskNie.offsetHeight);

przyciskNie.style.position = 'absolute';
przyciskNie.style.left = `${x}px`;
przyciskNie.style.top = `${y}px`;
}

przyciskTak.addEventListener('click', () => {
window.location.assign('tak.html');
})

przyciskNie.addEventListener('click', moveNoButton);
przyciskNie.addEventListener('mouseenter', moveNoButton);       