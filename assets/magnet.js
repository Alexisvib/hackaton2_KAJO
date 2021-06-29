button = document.getElementById('button-magnet');
xavier = document.getElementById('xddl');
result = document.getElementById('result');
loading = document.getElementById('loading');

button.addEventListener('click', async e => {
        xavier.classList.toggle('shaky');
        xavier.classList.toggle('xavier-magnet');
        await sleep(1200);
        loading.classList.toggle('result');
        await sleep(3000);
        loading.classList.toggle('result');
        result.classList.toggle('result');
});

function sleep(ms)
{
        return new Promise(resolve => setTimeout(resolve, ms));
}