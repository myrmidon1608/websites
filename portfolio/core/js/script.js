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
    
    getUpdates();
}

/* -------------------------------- *\
 * Random Fact Generator            *
\* -------------------------------- */

function generateFact() {
    var titlePhrase = elementID('titlePhrase');
	i = randomIndex(factList.length);
    
    titlePhrase.innerHTML = '';
	titlePhrase.innerHTML = '<span id="factHolder">' + factList[i] + '</span>';
}

/* -------------------------------- *\
 * Skill Progress Bars              *
\* -------------------------------- */

function generateProgress() {
    for(var i = 0; i < skillProgress.length; i++) {
        var progressBar = elementID('bar' + i),
            j = randomIndex(skillProgress[i].length);
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

/* -------------------------------- *\
 * Updates                          *
\* -------------------------------- */

function getUpdates() {
    $.getJSON( "data/updates.json", function(data) {
        showRecentUpdate(data[data.length - 1]);
    });
}

/* Display Most Recent Update */

function showRecentUpdate(data) {
    var parentNode = elementID('recentUpdate'),
        newNode    = document.createElement('div'),
        update = '';
    
    update += '<img src="core/img/updates/' + data.icon + '" alt="' + data.title + '" />';
    update += '<h5>' + data.title + '</h5>';
    update += '<p>' + data.date + '</p>';
    update += '<p>' + data.summary + '</p>';
    
    newNode.innerHTML = update;
    parentNode.insertBefore(newNode, parentNode.firstChild);
}