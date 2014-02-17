
var homeMenu = {
    
    menu: elementID('homeMenu'),
            
    current:  elementID('currentItem'),
    previous: elementID('previousItem'),
    next:     elementID('nextItem'),
    
    arrowNav: getClassElements('arrows'),
    
    init: function() {
        this.placeImage(this.current, 0);
        this.placeImage(this.previous, menuImage.length - 1);
        this.placeImage(this.next, 1);
        
        this.addArrowHandle(this.arrowNav);
    },
            
    addArrowHandle: function(arrows) {
        for (i = 0; i < arrows.length; i++) {
            arrows[i].onclick = this.navigateMenu;
        }
    },
            
    placeImage: function(item, imgIndex) {
        var imgTag   = '<img src="' + imgPath + menuImage[imgIndex] + '.png" alt="" />',
            menuItem = (item.id === 'currentItem')
                ? '<a href="../' + pagePath + menuUrl[imgIndex] + '">' + imgTag + '</a>'
                : imgTag;

        item.innerHTML = menuItem;
        item.dataset.index = imgIndex;
    },
            
    navigateMenu: function(e) {
        var id        = e.target.id,
            menuItems = homeMenu.menu.getElementsByTagName('section');

        for(i = 0; i < menuItems.length; i++) {
            var menuIndex = parseInt(menuItems[i].dataset.index);

            if(id == 'leftArrow') {
                menuItems[i].dataset.index = (menuIndex == 0) ? menuImage.length - 1 : menuIndex - 1;
            } else if(id == 'rightArrow') {
                menuItems[i].dataset.index = (menuIndex == (menuImage.length - 1)) ? 0 : menuIndex + 1;
            }
            //console.log(menuIndex, menuItems[i].dataset.index)
            homeMenu.placeImage(menuItems[i], menuItems[i].dataset.index);
        }
    }
    
};