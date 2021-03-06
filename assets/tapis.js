roue1 = document.getElementById('roue1');
roue2 = document.getElementById('roue2');
arrowR = document.getElementById('arrowR');
rocket  = document.getElementById('rocket')
buttonFire = document.getElementById('buttonFire');
flame = document.getElementById('rocketFlame')
icon = document.getElementById('rocketIcon')
iconContainer = document.getElementById('iconContainer')

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

buttonFire.addEventListener('click', async e => {
   e.preventDefault();
   buttonFire.classList.toggle('bounceInButton')
   flame.classList.toggle('dNone')
   flame.classList.toggle('bounceIn')
   flame.classList.toggle('fadeIn')
   rocket.classList.toggle('fadeOutUpBig')
   await sleep(4000)
   iconContainer.classList.toggle('dNone')
   iconContainer.classList.toggle('fadeIn')
   icon.classList.toggle('tada')

})


function sleep(ms)
{
   return new Promise(resolve => setTimeout(resolve, ms));
}
