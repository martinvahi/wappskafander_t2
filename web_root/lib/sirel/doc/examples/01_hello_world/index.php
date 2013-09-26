<?php
//=========================================================================
// Author: martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// This file is in public domain.
//=========================================================================
// The next line is compulsory:
$s_fp_angervaks_entry_parent_dir=realpath('./');
$s_path_lib_sirel=realpath($s_fp_angervaks_entry_parent_dir.'/../../../');

define('s_path_lib_sirel',$s_path_lib_sirel);  // A compulsory step.

// In practice one should include only those parts of
// the Sirel that one needs, but the sirel.php includes
// the whole Sirel PHP library.
require_once($s_path_lib_sirel.'/src/src/sirel.php');

// The next line is compulsory:
sirelSiteConfig::$s_fp_angervaks_entry_parent_dir=$s_fp_angervaks_entry_parent_dir;


sirelSiteConfig::$site_titleprefix='Sirel Example 1';
$s_img_path='./a_slightly_modified_image_from_et_wikipedia_org.jpg';
$ob_html=new sirelHTMLPage();
$ob_html->add_2_ar_css('./sitespecific_v1.css');
$ob_html->add_2_ar_body('<center>'.
	'<p>Hello World from the Sirel PHP library!</p><br/>' .
	'<a href="http://et.wikipedia.org/wiki/Pilt:Fleurs_jardin_dorian_2.JPG">'.
	'<img src="'.$s_img_path.'" /></a><br/>'.
	'</center>');
echo($ob_html->to_s());
//=======================================================================
?>
