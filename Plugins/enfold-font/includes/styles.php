<?php

function fu_output_css()	{

$g_font_urls = get_option('fu_google_font_urls');
if( $g_font_urls ) {
	echo strip_tags(stripslashes($g_font_urls), '<link>');
}

echo '<style type="text/css" media="screen">';
if (get_option('fu_header_font') != 'Choose a font' && get_option('fu_header_font') != null)
{	echo '
	@font-face {
	  font-family: "header-font";
	  src: url("'; echo fu_get_font_url( get_option('fu_header_font') ); echo '");
	}';
}
if (get_option('fu_body_font') != 'Choose a font'  && get_option('fu_body_font') != null)
{	echo '
	@font-face {
	  font-family: "body-font";
	  src: url("'; echo fu_get_font_url( get_option('fu_body_font') ); echo '");
	}';
}
if (get_option('fu_lists_font') != 'Choose a font'  && get_option('fu_lists_font') != null)
{	echo '
	@font-face {
	  font-family: "lists-font";
	  src: url("'; echo fu_get_font_url( get_option('fu_lists_font') ); echo '");
	}';
}
if (get_option('fu_custom_one_font') != 'Choose a font'  && get_option('fu_custom_one') != null)			
{	echo '
	@font-face {
	  font-family: "custom-one";
	  src: url("'; echo fu_get_font_url( get_option('fu_custom_one_font') ); echo '");
	}';
}
if (get_option('fu_custom_two_font') != 'Choose a font'  && get_option('fu_custom_two') != null)			
{	echo '
	@font-face {
	  font-family: "custom-two";
	  src: url("'; echo fu_get_font_url( get_option('fu_custom_two_font') ); echo '");
	}';
}
if (get_option('fu_custom_three_font') != 'Choose a font'  && get_option('fu_custom_three') != null)			
{	echo '
	@font-face {
	  font-family: "custom-three";
	  src: url("'; echo fu_get_font_url( get_option('fu_custom_three_font') ); echo '");
	}';
}
if (get_option('fu_custom_four_font') != 'Choose a font'  && get_option('fu_custom_four') != null)			
{	echo '
	@font-face {
	  font-family: "custom-four";
	  src: url("'; echo fu_get_font_url( get_option('fu_custom_four_font') ); echo '");
	}';
}
if (get_option('fu_custom_five_font') != 'Choose a font'  && get_option('fu_custom_five') != null)			
{	echo '
	@font-face {
	  font-family: "custom-five";
	  src: url("'; echo fu_get_font_url( get_option('fu_custom_five_font') ); echo '");
	}';
}
if (get_option('fu_header_font') != 'Choose a font' && get_option('fu_header_font') != null)
{
	echo	'h1, h2, h3, h4, h5, h6, h7	{
	font-family: "header-font"!important;
	}';
}
if (get_option('fu_body_font') != 'Choose a font'  && get_option('fu_body_font') != null)
{
	echo 'p, em, div	{
		font-family: "body-font"!important;
	}';
}
if (get_option('fu_lists_font') != 'Choose a font'  && get_option('fu_lists_font') != null)
{
	echo '
	li	{
		font-family: "lists-font"!important;
	}';
}

if (get_option('fu_custom_one_font') != 'Choose a font'  && get_option('fu_custom_one') != null)			
{
	echo get_option('fu_custom_one'); echo '	{
		font-family: "custom-one"!important;
	}';
}
if (get_option('fu_custom_two_font') != 'Choose a font'  && get_option('fu_custom_two') != null)			
{
	echo get_option('fu_custom_two'); echo '	{
		font-family: "custom-two"!important;
	}';
}
if (get_option('fu_custom_three_font') != 'Choose a font'  && get_option('fu_custom_three') != null)			
{
	echo get_option('fu_custom_three'); echo '	{
		font-family: "custom-three"!important;
	}';
}
if (get_option('fu_custom_four_font') != 'Choose a font'  && get_option('fu_custom_four') != null)			
{
	echo get_option('fu_custom_four'); echo '	{
		font-family: "custom-four"!important;
	}';
}
if (get_option('fu_custom_five_font') != 'Choose a font'  && get_option('fu_custom_five') != null)			
{
	echo get_option('fu_custom_five'); echo '	{
		font-family: "custom-five"!important;
	}';
}

/* google fonts */

$fu_google_font_header = get_option('fu_google_header_font_name');
if (!empty($fu_google_font_header))
{	echo '		
	h1,h2,h3,h4,h5,h6	{
		font-family: "'; echo str_replace('+', ' ', get_option('fu_google_header_font_name') ); echo '"!important;
	}';
}
$fu_google_font_body = get_option('fu_google_body_font_name');
if (!empty($fu_google_font_body))
{	echo '		
	p, em, div	{
		font-family: "'; echo str_replace('+', ' ', get_option('fu_google_body_font_name') ); echo '"!important;
	}';
}
$fu_google_font_lists = get_option('fu_google_lists_font_name');
if (!empty($fu_google_font_lists))
{	echo '		
	li	{
		font-family: "'; echo str_replace('+', ' ', get_option('fu_google_lists_font_name') ); echo '"!important;
	}';
}
/* end google fonts */

/*font sizes*/
			
if (get_option('fu_header_font_size') != 'Choose a size' && get_option('fu_header_font_size') != null)
{
	echo	'h1, h2, h3, h4, h5, h6, h7	{
		font-size: ' . get_option('fu_header_font_size') . '!important;
	}';
}
if (get_option('fu_body_font_size') != 'Choose a size'  && get_option('fu_body_font_size') != null)
{
	echo 'p, em, div	{
		font-size: ' . get_option('fu_body_font_size') . '!important;
	}';
}
if (get_option('fu_lists_font_size') != 'Choose a size'  && get_option('fu_lists_font_size') != null)
{
	echo '
	li	{
		font-size: ' . get_option('fu_lists_font_size') . '!important;
	}';
}			
if (get_option('fu_custom_one_size_element') != null && get_option('fu_custom_one_size') != 'Choose a size')
{
	echo get_option('fu_custom_one_size_element') . ' {
		font-size: ' . get_option('fu_custom_one_size') . '!important;
	}';
}
if (get_option('fu_custom_two_size_element') != null && get_option('fu_custom_two_size') != 'Choose a size')
{
	echo get_option('fu_custom_two_size_element') . ' {
		font-size: ' . get_option('fu_custom_two_size') . '!important;
	}';
}
if (get_option('fu_custom_three_size_element') != null && get_option('fu_custom_three_size') != 'Choose a size')
{
	echo get_option('fu_custom_three_size_element') . ' {
		font-size: ' . get_option('fu_custom_three_size') . '!important;
	}';
}	
if (get_option('fu_custom_four_size_element') != null && get_option('fu_custom_four_size') != 'Choose a size')
{
	echo get_option('fu_custom_four_size_element') . ' {
		font-size: ' . get_option('fu_custom_four_size') . '!important;
	}';
}	
if (get_option('fu_custom_five_size_element') != null && get_option('fu_custom_five_size') != 'Choose a size')
{
	echo get_option('fu_custom_five_size_element') . ' {
		font-size: ' . get_option('fu_custom_five_size') . '!important;
	}';
}	

/*end sizes*/

echo '
</style>';

/* IE fonts */

echo '<!--[if IE]>';
echo '<style type="text/css" media="screen">';
if (get_option('fu_ie_header_font') != 'Choose a font'  && get_option('fu_ie_header_font') != null)
{	echo '
	@font-face {
	  font-family: "ie-header-font";
	  src: url("'; echo fu_get_font_url( get_option('fu_ie_header_font') ); echo '");
	}';
}
if (get_option('fu_ie_lists_font') != 'Choose a font'  && get_option('fu_ie_lists_font') != null)
{	echo '
	@font-face {
	  font-family: "ie-lists-font";
	  src: url("'; echo fu_get_font_url( get_option('fu_ie_lists_font') ); echo '");
	}
	';
}
if (get_option('fu_ie_body_font') != 'Choose a font'  && get_option('fu_ie_body_font') != null)
{	echo '
	@font-face {
	  font-family: "ie-body-font";
	  src: url("'; echo fu_get_font_url( get_option('fu_ie_body_font') ); echo '");
	}';
}
if (get_option('fu_ie_custom_one_font') != 'Choose a font'  && get_option('fu_ie_custom_one') != null) {
	echo '@font-face { font-family: "ie_custom-one"; src: url("' . fu_get_font_url( get_option('fu_ie_custom_one_font') ) . '"); }';
}
if (get_option('fu_ie_custom_two_font') != 'Choose a font'  && get_option('fu_ie_custom_two') != null)		
{	echo '
	@font-face {
	  font-family: "ie_custom-two";
	  src: url("'; echo fu_get_font_url( get_option('fu_ie_custom_two_font') ); echo '");
	}';
}
if (get_option('fu_ie_custom_three_font') != 'Choose a font'  && get_option('fu_ie_custom_three') != null)		
{	echo '
	@font-face {
	  font-family: "ie_custom-three";
	  src: url("'; echo fu_get_font_url( get_option('fu_ie_custom_three_font') ); echo '");
	}';
}
if (get_option('fu_ie_custom_four_font') != 'Choose a font'  && get_option('fu_ie_custom_four') != null)		
{	echo '
	@font-face {
	  font-family: "ie_custom-four";
	  src: url("'; echo fu_get_font_url( get_option('fu_ie_custom_four_font') ); echo '");
	}';
}
if (get_option('fu_ie_custom_five_font') != 'Choose a font'  && get_option('fu_ie_custom_five') != null)		
{	echo '
	@font-face {
	  font-family: "ie_custom-five";
	  src: url("'; echo fu_get_font_url( get_option('fu_ie_custom_five_font') ); echo '");
	}';
}
if (get_option('fu_ie_header_font') != 'Choose a font'  && get_option('fu_ie_header_font') != null)
{
	echo	'
	h1, h2, h3, h4, h5, h6, h7	{
		font-family: "ie-header-font"!important;
	}';
}
if (get_option('fu_ie_lists_font') != 'Choose a font'  && get_option('fu_ie_lists_font') != null)
{
	echo '
	li	{
		font-family: "ie-lists-font"!important;
	}';
}
if (get_option('fu_ie_body_font') != 'Choose a font'  && get_option('fu_ie_body_font') != null)
{
	echo '
	p, em, div	{
		font-family: "ie-body-font"!important;
	}';
}
if (get_option('fu_ie_custom_one_font') != 'Choose a font'  && get_option('fu_ie_custom_one') != null) {
	echo get_option('fu_ie_custom_one') . '	{ font-family: "ie_custom-one"!important; }';
}
if (get_option('fu_ie_custom_two_font') != 'Choose a font'  && get_option('fu_ie_custom_two') != null) {
	echo get_option('fu_ie_custom_two') . '	{ font-family: "ie_custom-two"!important; }';
}
if (get_option('fu_ie_custom_three_font') != 'Choose a font'  && get_option('fu_ie_custom_three') != null) {
	echo get_option('fu_ie_custom_three') . ' { font-family: "ie_custom-three"!important; }';
}
if (get_option('fu_ie_custom_four_font') != 'Choose a font'  && get_option('fu_ie_custom_four') != null) {
	echo get_option('fu_ie_custom_four') . ' { font-family: "ie_custom-four"!important; }';
}
if (get_option('fu_ie_custom_five_font') != 'Choose a font'  && get_option('fu_ie_custom_five') != null) {
	echo get_option('fu_ie_custom_five') . ' { font-family: "ie_custom-five"!important; }';
}
/*end IE fonts*/
echo '</style><![endif]-->';

}			
add_action('wp_head','fu_output_css');