roue1 = document.getElementById('roue1');
roue2 = document.getElementById('roue2');
arrowR = document.getElementById('arrowR');
rocket  = document.getElementById('rocket')
buttonFire = document.getElementById('buttonFire');

arrowR.addEventListener('click', async e => {
   e.preventDefault();
   roue1.classList.toggle('roueOn')
   roue2.classList.toggle('roueOn')
   rocket.classList.toggle('moveRocket')
   arrowR.classList.toggle('dNone')
   await sleep(3000)
   buttonFire.classList.toggle('dNone')
   buttonFire.classList.toggle('fadeIn')

});

function sleep(ms)
{
   return new Promise(resolve => setTimeout(resolve, ms));
}


buttonFire.addEventListener('click', async e => {
   
})
