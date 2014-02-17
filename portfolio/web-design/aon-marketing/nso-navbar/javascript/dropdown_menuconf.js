// Here are the menu objects
var listMenu = new FSMenu('listMenu', true, 'display', 'block', 'none');
var listMenu2 = new FSMenu('listMenu2', true, 'display', 'block', 'none');
var listMenu3 = new FSMenu('listMenu3', true, 'display', 'block', 'none');

// Uncomment the following lines and change the values to change the speed and functionality of the drop down menu
//listMenu.showDelay = 0;
//listMenu.switchDelay = 125;
//listMenu.hideDelay = 500;
//listMenu.showOnClick = 0; 			// 0 or 1
//listMenu.hideOnClick = true; 		// true or false
//listMenu.animInSpeed = 0.2;
//listMenu.animOutSpeed = 0.2;

//listMenu2.showDelay = 0;
//listMenu2.switchDelay = 125;
//listMenu2.hideDelay = 500;
//listMenu2.showOnClick = 0;		// 0 or 1
//listMenu2.hideOnClick = true;		//true or false
//listMenu2.animInSpeed = 0.2;
//listMenu2.animOutSpeed = 0.2;


// Applying Effect at listMenu and listMenu2.

//Swipe Down Effect - Uncomment the following 2 lines to activate this effect
listMenu.animations[listMenu.animations.length] = FSMenu.animSwipeDown;
listMenu2.animations[listMenu2.animations.length] = FSMenu.animSwipeDown;
listMenu3.animations[listMenu3.animations.length] = FSMenu.animSwipeDown;

//Fade Effect - Uncomment the following 2 lines to activate this effect
//listMenu.animations[listMenu.animations.length] = FSMenu.animFade;
//listMenu2.animations[listMenu2.animations.length] = FSMenu.animFade;

//Clip Down Effect - Uncomment the following 2 lines to activate this effect
//listMenu.animations[listMenu.animations.length] = FSMenu.animClipDown;
//listMenu2.animations[listMenu2.animations.length] = FSMenu.animClipDown;

addEvent(window, 'load', new Function('listMenu.activateMenu("listMenuRoot")'));
addEvent(window, 'load', new Function('listMenu2.activateMenu("listMenuRoot2")'));
addEvent(window, 'load', new Function('listMenu3.activateMenu("listMenuRoot3")'));