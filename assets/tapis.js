roue1 = document.getElementById('roue1');
roue2 = document.getElementById('roue2');
arrowR = document.getElementById('arrowR');
rocket  = document.getElementById('rocket')

arrowR.addEventListener('click', (e) => {
   e.preventDefault();
   roue1.classList.toggle('roueOn')
   roue2.classList.toggle('roueOn')
   rocket.classList.toggle('moveRocket')
   arrowR.classList.toggle('dNone')
});
