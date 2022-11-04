<?php
//=========================================================================
// Author: martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// This file is in public domain.
//=========================================================================
require_once('./etc/site_configuration.php');

$ob_html=new sirelHTMLPage();

// The generated HTML will contain the list of CSS files before
// the list of JavaScript files, i.e. It's OK to mix and match the
// CSS and JavaScript insertion clauses. The order
// amongst JavaScript files and CSS files is preserved.
raudrohi_support::set_CSS_and_JavaScript_includes($ob_html);

$s_img_path='./var/site_resources/images'.
		'/a_slightly_modified_image_from_et_wikipedia_org.jpg';

$ob_html->add_2_ar_css('./etc/css/sitespecific_v1.css');
$ob_html->add_2_ar_javascript('./lib/sitespecific/'.
		'sitespecific_javascript_all_in_one_v1.js');
$ob_html->add_2_ar_body('<center>'.
		'<p>Hello from the Sirel PHP library!</p>'.
		'<br/>' .
		'<a href="http://et.wikipedia.org/wiki/Pilt:Fleurs_jardin_dorian_2.JPG">'.
		'<img src="'.$s_img_path.'" /></a>'.
		'<br/>'."\n".
		'<br/><br/>'."\n".
		'<div id="for_javascript"></div>'."\n".
		'</center>');
echo($ob_html->to_s());
//=======================================================================
?>
