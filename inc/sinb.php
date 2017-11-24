<?php

/**
 * Customisations and Art Direction for SiNB
 * 
 * @subpackage: opening_times
 */

/**
 * Filter the markup after Reading title.
 * 
 * @return string The new markup.
 *
 * @since opening_times 1.0.0
 */

add_filter( 'reading_title_before', 'opening_times_sinb_reading_title_markup_before' );
function opening_times_sinb_reading_title_markup_before( $before ) {
	global $post;

	if ( $post->post_name === 'summer-2017' ) {
		$src = '\'http://otdac.org/main/wp-content/uploads/2017/05/Leahs-Vid-Of-Celine-Dancing-web.mp4\'';
		$template = '\'<div class="popover popover--large" role="tooltip" style="width: 400px;"><div class="popover-content"></div></div>\'';

	    $before_title = '<span class="issue-title__sub" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-html="true" data-template=' . $template . ' data-content="<div class=\'popover__media-container\'><video preload=\'meta\' src=' . $src . ' loop autoplay muted></video></div>">';
	    
	    return $before_title;
	} else {
		return $before;
	}
     
}
