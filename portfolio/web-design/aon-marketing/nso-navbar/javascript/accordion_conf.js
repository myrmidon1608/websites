//  Load them when page loads
Event.observe(window, 'load', loadAccordions, false);

//	Set up both accordions(Vertical, Horizontal)
function loadAccordions() {
	var HorizontalAccordion = new accordion('horizontal_container', {
		resizeSpeed : 10, 		// Change the speed of the menu
		classNames : {
			toggle : 'horizontal_accordion_toggle',
			toggleActive : 'horizontal_accordion_toggle_active',
			content : 'horizontal_accordion_content'
		},
		defaultSize : {
			width : 547			// Change the width of the menu. Recommended not to change this.
		},
		direction : 'horizontal',
		onEvent : 'click'		// Add a different event for the menu to open/close (click, mouseover, ...)
	});
	
	var VerticalAccordion = new accordion('vertical_container', {
			resizeSpeed : 9,		// Change the speed of the menu
			onEvent : 'click'		// Add a different event for the menu to open/close (click, mouseover, ...)
			});
	
	// Open first one onload [0], Open second one onload [1], Open third one onload [2], ...
	VerticalAccordion.activate($$('#vertical_container .accordion_toggle')[0]);
	
	// Open first one onload [0], Open second one onload [1]
	HorizontalAccordion.activate($$('#horizontal_container .horizontal_accordion_toggle')[0]);
}