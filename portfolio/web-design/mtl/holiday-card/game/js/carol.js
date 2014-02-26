var carolA = new Array(
    'Twas the night before Christmas, and all through EchoTL,',
    'Not a developer was stirring, except maybe Bill.',
    'He was stiff, sore and tired, Sencha code in his head,',
    '"Twenty more apps before Christmas!" The client had said.',
    'To finish in time,<br />the whole team was there,',
    'Like Mike, Brian, Rebecca,<br />and Jason, somewhere.',
    'By the light of the desk lamps and glow of the setting sun,',
    'Come meet the team that helps Echo Torre Lazur run.'
);

var carolB = new Array(
    'Now you\'ve met them all, by their computer screens glow,',
    'Giving the lustre of mid-day to their sweat beaded brow.',
    'The scope crept and crept,<br />like their new coming fears,',
    'Would the apps all be finished in time for New Years?',
    'But despite client demands,<br />and many a late night,',
    'The team knows that beta<br />release is in sight.',
    'So Happy Holidays from<br />Javier, Franklin, Liz, and Jen,',
    'Until next year, when it\'ll<br />start all over again.'

);

var carolC = new Array(
    'An epic battle ensued between Doc and the beast,',
    'One fighting for honor, the other, a feast.',
    'It was an awesome sight to see for all who viewed it,',
    'Too bad the developer was too lazy to include it.',
    'But when the dust settled, the dragon had been bested,',
    'Doc the one man whom it should not have tested.',
    'Though many questions remain, I\'ll ask just this one;',
    'Why did clicking Nick\'s mouse cause a dragon to come?'

);

var carols = new Array(carolA, carolB);

var line = 0;

function showCarol(carolIndex) {
    getCookie();
    var arrayIndex = carolIndex - 1;
    $('#carol' + carolIndex + ' p').html(carols[arrayIndex][line] + '<br />' + carols[arrayIndex][line + 1]);
    $('#carol' + carolIndex).delay(2000).fadeIn(1000);
    line = 2;
    
    var interval = setInterval(function() {
        
        if(line < carols[arrayIndex].length) {
            $('#carol' + carolIndex + ' p').fadeOut(1000, function(){
            $('#carol' + carolIndex + ' p').html(carols[arrayIndex][line] + '<br />' + carols[arrayIndex][line + 1]).fadeIn(1000);
            line += 2;
        });
        }
        else {
            closeScrn('carol' + carolIndex);
            line = 0;
            setCookie(arrayIndex);
            clearInterval(interval);
        }
        return line;
    }, 6000);
}
