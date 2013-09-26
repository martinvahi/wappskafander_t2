<?php
//=========================================================================
// Author: martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// This file is in public domain.
//=========================================================================
$s_fp_angervaks_entry_parent_dir=realpath('./');
$s_path_lib_sirel=realpath($s_fp_angervaks_entry_parent_dir.'/lib/sirel');
define('s_path_lib_sirel',$s_path_lib_sirel);
require_once($s_path_lib_sirel.'/src/src/sirel.php');
sirelSiteConfig::$s_fp_angervaks_entry_parent_dir=$s_fp_angervaks_entry_parent_dir;
//-------------------------------------------------------------------------


sirelSiteConfig::$site_titleprefix='wappskafander_t2 PHP';
$ob_html=new sirelHTMLPage();
$ob_html->add_2_ar_css('./sitespecific_v1.css');
$ob_html->add_2_ar_body('<div style="text-align:center;">'.
	'<p>Hello World from a PHP file!</p><br/>' .
        '<a href="./lib/sirel/src/dev_tools/selftests/run_all_selftests.php">Run</a>'.
        ' all Sirel PHP Library selftests.<br/><br/>'."\n".
        'The original <a href="./index.html">index.html</a><br/>'."\n".
        'A <a href="./php_example_1/">link</a> to another PHP based example.'.
	'</div>');
echo($ob_html->to_s());
//=======================================================================

