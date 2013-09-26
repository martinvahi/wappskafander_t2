<?php
//=========================================================================
// Author: martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// This file is in public domain.
//=========================================================================
// Sirel PHP library setup:
$s_fp_angervaks_entry_parent_dir=realpath('./');
$s_path_lib_sirel=realpath('./../../../');
define('s_path_lib_sirel',$s_path_lib_sirel);  // A compulsory step.

//require_once($s_path_lib_sirel.'/src/src/sirel.php'); // loads the whole library
require_once($s_path_lib_sirel.'/src/src/sirel_relay_t1.php'); // a bit more efficient

sirelSiteConfig::$s_fp_angervaks_entry_parent_dir=$s_fp_angervaks_entry_parent_dir;
sirelSiteConfig::$site_titleprefix='Sirel Example 03';
//-------------------------------------------------------------------------
// Example specific code:

try {
	$s_fp_console_application=realpath('./web_app_starter.bash');
	sirel_relay_t1::run_and_if_a_file_is_returned_then_exit($s_fp_console_application);
}catch (Exception $err_exception) {
	sirelDisplayException_t2($err_exception,
		"GUID='4441f034-d871-4f2d-aa36-405300418dd7'");
} // catch


//=========================================================================
// Any bytes outside the PHP start-end tags is appended to the
// file that is offered for download, effectively corrupting the
// download copy of the file.
// http://stackoverflow.com/questions/8041564/php-readfile-adding-extra-bytes-to-downloaded-file
?>