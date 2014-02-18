/* -------------------------------- *\
 * Main JavaScript - Nicholas Moore *
\* -------------------------------- */

window.onload = init;

function init() {
    if(loadingContainer) loadingContainer.className = 'hidden';
    clearInterval(loading);
    generateFact();
    titleColor();
    generateProgress();
    homeMenu.init();
}

function index(value) {
    return Math.floor(Math.random() * value);
}

/* -------------------------------- *\
 * Random Fact Generator            *
\* -------------------------------- */

function generateFact() {
    var titlePhrase = elementID('titlePhrase');
	i = index(factList.length);
    
    titlePhrase.innerHTML = '';
	titlePhrase.innerHTML = '<span id="factHolder">' + factList[i] + '</span>';
}

/* -------------------------------- *\
 * Skill Progress Bars              *
\* -------------------------------- */

function generateProgress() {
    for(var i = 0; i < skillProgress.length; i++) {
        var progressBar = elementID('bar' + i),
            j = index(skillProgress[i].length);
                progressBar.innerHTML = skillProgress[i][j][0];
        progressBar.style.width = skillProgress[i][j][1] + '%';
    }
}

/* -------------------------------- *\
 * Main Header Color                *
\* -------------------------------- */

function titleColor() {
    var titleBrand = elementID('titleBrand'),
        titleArray = titleBrand.innerText.split('');

    titleBrand.innerHTML = '';
    for(i = 0; i < titleArray.length; i++) {
        titleBrand.innerHTML += '<span style="color:' + titleRainbow[i] + '">' + titleArray[i] + '</span>';
    }
}