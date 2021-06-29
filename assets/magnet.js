button = document.getElementById('button-magnet');
xavier = document.getElementById('xddl');


button.addEventListener('click', async e => {
        xavier.classList.toggle('shaky');
        xavier.classList.toggle('xavier-magnet');
});