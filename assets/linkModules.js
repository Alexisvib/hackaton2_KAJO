let blocks = document.getElementsByClassName('right-module');
let upLinks = document.getElementsByClassName('link-up');
let downLinks = document.getElementsByClassName('link-down');
let eraseUpLinks = [];
let eraseDownLinks = [];
let linkNotLight = 'white';
let linkLight = 'greenyellow';
for (block of blocks) {
    block.addEventListener('mouseover', function (){
        for (upLink of upLinks) {
            if (upLink.dataset.islightening == 2) {
                upLink.style.borderLeftColor = linkLight;
                eraseUpLinks.push(upLink);
            }
        }
        for (downLink of downLinks) {
            if (downLink.dataset.islightening == 1 || downLink.dataset.islightening == 2 ) {
                downLink.style.borderLeftColor = linkLight;
                eraseDownLinks.push(downLink);
            }
        }
    });

    block.addEventListener('mouseout', function (){
        for (upLink of eraseUpLinks) {
            upLink.style.borderLeftColor = linkNotLight;
        }
        for (downLink of eraseDownLinks) {
            downLink.style.borderLeftColor = linkNotLight;
        }
    });
}