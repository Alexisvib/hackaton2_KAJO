const button = document.getElementById('button-advice');
const instruction = document.getElementById('advice');

button.addEventListener('click', (e)=> {
    e.preventDefault();
    const url = 'https://api.adviceslip.com/advice';
    fetch(url)
        .then(function(response){
            return response.json();
        })
        .then(function(advice){
           instruction.innerHTML = advice.slip.advice;
        })
});

