const modules = document.getElementsByClassName('module');


for (const module of modules) {
    module.addEventListener('click',()=>{
        console.log(module.dataset.link);
        const toDisplay = document.getElementById(module.dataset.link);
        const sections = document.getElementsByClassName('section');
        console.log(sections);
        for (const section of sections) {
            if(section.classList.contains('d-none')){
             section.classList.add('d-none');
            }
        }
        toDisplay.classList.toggle('d-none');
    })
}