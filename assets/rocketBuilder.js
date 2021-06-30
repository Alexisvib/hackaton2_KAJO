const modules = document.getElementsByClassName('module');


for (const module of modules) {
    module.addEventListener('click',()=>{
        const toDisplay = document.getElementById(module.dataset.link);
        const sections = document.getElementsByClassName('section');
        for (const section of sections) {
            if(!section.classList.contains('d-none')){
             section.classList.add('d-none');
            }
        }
        toDisplay.classList.toggle('d-none');
    })
}
const devPicture =document.getElementById('devPicture-2');
devPicture.addEventListener('click',(e)=>{
    e.preventDefault();
    const devPhoto = document.getElementById('chosen-1');
    devPhoto.classList.toggle('d-none');
    const red = document.getElementById('red-1');
    red.classList.toggle('dot-0');
    const yellow = document.getElementById('yellow-1')
    yellow.classList.toggle('dot-1');
})
const marketPicture =document.getElementById('marketPicture');
marketPicture.addEventListener('click',(e)=>{
    e.preventDefault();
    const marketPhoto = document.getElementById('chosen-2');
    marketPhoto.classList.toggle('d-none');
    const red = document.getElementById('red-2');
    red.classList.toggle('dot-0');
    const yellow = document.getElementById('yellow-2')
    yellow.classList.toggle('dot-1');
})
const seoPicture =document.getElementById('SEOPicture-0');
seoPicture.addEventListener('click',(e)=>{
    e.preventDefault();
    const seoPhoto = document.getElementById('chosen-3');
    seoPhoto.classList.toggle('d-none');
    const red = document.getElementById('red-3');
    red.classList.toggle('dot-0');
    const yellow = document.getElementById('yellow-3')
    yellow.classList.toggle('dot-1');
})
