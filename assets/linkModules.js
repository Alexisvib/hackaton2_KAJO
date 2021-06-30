let blocks = document.getElementsByClassName('right-module');
let upLinks = document.getElementsByClassName('link-up');
let downLinks = document.getElementsByClassName('link-down');
let eraseUpLinks = [];
let eraseDownLinks = [];
let linkNotLight = 'white';
let linkLight = 'greenyellow';

for (block of blocks) {
    block.addEventListener('mouseover', function () {
        console.log(blocks.length);
        if (block.dataset.module === 'seo1') {
            if (this.dataset.islightening == 1) {
                for (upLink of upLinks) {
                    if (upLink.dataset.islightening == 2) {
                        upLink.style.borderLeftColor = linkLight;
                        eraseUpLinks.push(upLink);
                    }
                }
                for (downLink of downLinks) {
                    if (downLink.dataset.islightening <= 2) {
                        downLink.style.borderLeftColor = linkLight;
                        eraseDownLinks.push(downLink);
                    }
                }
            } else if (this.dataset.islightening == 2) {
                for (downLink of downLinks) {
                    if (downLink.dataset.islightening == 2) {
                        downLink.style.borderLeftColor = linkLight;
                        eraseDownLinks.push(downLink);
                    }
                }
            } else if (this.dataset.islightening == 3) {
                for (upLink of upLinks) {
                    if (upLink.dataset.islightening == 3) {
                        console.log('coucou');
                        upLink.style.borderLeftColor = linkLight;
                        eraseUpLinks.push(upLink);
                    }
                }
            } else if (this.dataset.islightening == 4) {
                for (upLink of upLinks) {
                    if (upLink.dataset.islightening >= 3) {
                        upLink.style.borderLeftColor = linkLight;
                        eraseUpLinks.push(upLink);
                    }
                }
                for (downLink of downLinks) {
                    if (downLink.dataset.islightening == 3) {
                        downLink.style.borderLeftColor = linkLight;
                        eraseDownLinks.push(downLink);
                    }
                }
            }
        } /*else if (blocks.length === 3) {
            if (this.dataset.islightening == 1) {
                for (upLink of upLinks) {
                    if (upLink.dataset.islightening == 2) {
                        upLink.style.borderLeftColor = linkLight;
                        eraseUpLinks.push(upLink);
                    }
                }
                for (downLink of downLinks) {
                    if (downLink.dataset.islightening <= 1) {
                        downLink.style.borderLeftColor = linkLight;
                        eraseDownLinks.push(downLink);
                    }
                }
            } else if (this.dataset.islightening == 3) {
                for (upLink of upLinks) {
                    if (upLink.dataset.islightening == 3) {
                        upLink.style.borderLeftColor = linkLight;
                        eraseUpLinks.push(upLink);
                    }
                }
                for (downLink of downLinks) {
                    if (downLink.dataset.islightening == 2) {
                        downLink.style.borderLeftColor = linkLight;
                        eraseDownLinks.push(downLink);
                    }
                }
            }
        } else if (blocks.length === 2) {
            if (this.dataset.islightening == 1) {
                for (downLink of downLinks) {
                    if (downLink.dataset.islightening <= 1) {
                        downLink.style.borderLeftColor = linkLight;
                        eraseDownLinks.push(downLink);
                    }
                }
            } else if (this.dataset.islightening == 2) {
                for (upLink of upLinks) {
                    if (upLink.dataset.islightening == 2) {
                        upLink.style.borderLeftColor = linkLight;
                        eraseUpLinks.push(upLink);
                    }
                }
            }
        }*/
    });

    block.addEventListener('mouseout', function () {
        for (upLink of eraseUpLinks) {
            upLink.style.borderLeftColor = linkNotLight;
        }
        for (downLink of eraseDownLinks) {
            downLink.style.borderLeftColor = linkNotLight;
        }
    });
}