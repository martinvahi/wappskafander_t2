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
require_once($s_path_lib_sirel.'/src/src/sirel.php');
sirelSiteConfig::$s_fp_angervaks_entry_parent_dir=$s_fp_angervaks_entry_parent_dir;
sirelSiteConfig::$site_titleprefix='Sirel Example 03';
//-------------------------------------------------------------------------
try {
	// Example specific code:
	$s_fp_metadata=$argv[1];
	$s_progfte=sirelFS::file2str($s_fp_metadata);
	$arht_metadata_in=sireProgFTE::ProgFTE2ht($s_progfte);
	$arht_metadata_out=array();
	$arht_metadata_out['s_response_type']='text';
	$arht_metadata_out['s_response']='Greetings!';
	//$arht_metadata_out['s_response']='Greetings! s_progfte_in=='.$s_progfte;
	if ($arht_metadata_in['sb_file_uplad_attempted']=='t') {
		if ($arht_metadata_in['sb_file_upload_failed']=='f') {
			$arht_metadata_out['s_response_type']='file';
			$s_fp_out=$arht_metadata_in['s_fp_tmp_uploaded_file'];
			$arht_metadata_out['s_fp_response_file']=$s_fp_out;
		} // if
	} // if
	$s_progfte_out=sireProgFTE::ht2ProgFTE($arht_metadata_out);
	sirelFS::str2file($s_progfte_out,$s_fp_metadata);
} catch (Exception $err_exception) {
	sirelDisplayException_t2($err_exception,
		"GUID='104c1323-4c5e-4fd0-b134-a34300418dd7'");
} // catch

//=========================================================================
?>