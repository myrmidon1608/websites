/* -------------------------------- *\
 * Global Variables                 *
\* -------------------------------- */

var factList = new Array(
	"Unconventionally Creative",
	"Expert Googler",
	"Internet Culture Aficionado",
	"Photoshop Wizard",
	"Gaming Connoisseur",
	"Programming Guru",
    "Professionally Ametuer"
),

skillProgress = new Array(
    new Array(["JavaScript", 60], ["PHP", 60], ["ActionScript", 40]),
    new Array(["Illustrator", 40], ["CSS", 90]),
    new Array(["Photoshop", 90], ["Maya", 50])
),

titleRainbow = ['#3C504C', '#355651', '#2E5E56', '#27655B', '#206C60', '#197365', '#127A69', '#0B816E', '#048873', '#048873'],

imgPath   = 'core/img/logos/',
menuImage = ['empty-spaces', 'aztec', 'zen-tuo'/*, 'jaguaro', 'medicine-man', 'pietro', 'tiki', 'witch-doctor', 'zen-tuo'*/],
pagePath  = 'portfolio/index.php?section=';
menuUrl   = ['blog', 'b', 'c'],

i = 1;

/* -------------------------------- *\
 * Loading Animation                *
\* -------------------------------- */

var loadingContainer = document.getElementById('loading'),
    loading = (loadingContainer !== null)
        ? setInterval(function() {
            var loadingIcon = loadingContainer.getElementsByTagName('div')[0],
            loadingCycle = -135 * i;
	
            loadingIcon.style.backgroundPosition = '0 ' + loadingCycle + 'px';
            if(i < 3) {
                i++;
            } else {
                return i = 0;
            }
        }, 1000)
        : '';
        
function elementID(IDName) {
    var newIDName = document.getElementById(IDName);
    return newIDName;
};

function getClassElements(className) {
    var classElement = (document.all) ? document.querySelectorAll('.' + className) : document.getElementsByClassName(className);
    return classElement;
};

function splitString(stringToSplit, separator) {
    var splitString = (!stringToSplit || stringToSplit.length === 0 || stringToSplit.indexOf(separator) === -1)
        ? []
        : stringToSplit.split(separator);
        
    return splitString;
};