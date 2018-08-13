
// Initiate foundation
jQuery(document).ready(function($) {
    $(document).foundation();
});

// init Masonry after all images have loaded
var $grid = $('.post-list-container').imagesLoaded( function() {
	$('.post-list-container').masonry({
		itemSelector: '.post-list-item',
	});
});
