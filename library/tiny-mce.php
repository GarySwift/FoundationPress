<?php
/**
 * Add Zurb Foundation formats and extra buttons to Tiny MCE
 *
 * @package FoundationPress
 */

/*
 * Filters the second-row list of TinyMCE buttons (Visual tab)
 *
 * @link https://developer.wordpress.org/reference/hooks/mce_buttons_2/
 */
function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');


/*
 * Callback function to filter the MCE settings
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/tiny_mce_before_init
 */
function foundationpress_before_tiny_mce_init_insert_formats( $init_array ) {  

	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Lead Paragraph',  
			'block' => 'div',  
			'classes' => 'lead',
			'wrapper' => true,
		),
		array(  
			'title' => 'Callout Primary',  
			'block' => 'div',  
			'classes' => 'callout primary',
			'wrapper' => true,
		),
		array(  
			'title' => 'Callout Secondary',  
			'block' => 'div',  
			'classes' => 'callout secondary',
			'wrapper' => true,
		),
		array(  
			'title' => 'Label Primary',  
			'inline' => 'span',  
			'classes' => 'label primary',
			'wrapper' => false,
		),	
		array(  
			'title' => 'Label Secondary',  
			'inline' => 'span',  
			'classes' => 'label secondary',
			'wrapper' => false,
		),				
		array(  
			'title' => 'Statistics',  
			'block' => 'div',  
			'classes' => 'stat',
			'wrapper' => true,
		),
		array(  
			'title' => 'Small',  
			'inline' => 'small',
		),		
	);  

	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );
	return $init_array;
} 
/*
 * Attach callback to 'tiny_mce_before_init' 
 */
add_filter( 'tiny_mce_before_init', 'foundationpress_before_tiny_mce_init_insert_formats' ); 


/*
 * Add a <hr> button to the TinyMCE Editor
 *
 * @link https://codex.wordpress.org/TinyMCE_Custom_Buttons
 */
function enable_more_buttons($buttons) {
	/*
	 * Add in a core button that's disabled by default
	 */	
	$buttons[] = 'hr';
	/* 
		Repeat with any other buttons you want to add, e.g.
		$buttons[] = 'fontselect';
		$buttons[] = 'superscript';
		$buttons[] = 'subscript';
	*/
  return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");