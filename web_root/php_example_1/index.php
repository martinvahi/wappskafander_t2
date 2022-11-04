<?php
//=========================================================================
// Author: martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// This file is in public domain.
//=========================================================================
$s_fp_angervaks_entry_parent_dir=realpath('./');
$s_path_lib_sirel=realpath($s_fp_angervaks_entry_parent_dir.'/../lib/sirel');
define('s_path_lib_sirel',$s_path_lib_sirel);
require_once($s_path_lib_sirel.'/src/src/sirel_fs.php');
sirelSiteConfig::$s_fp_angervaks_entry_parent_dir=$s_fp_angervaks_entry_parent_dir;
//-------------------------------------------------------------------------

$s_fp_output=sirelFS::s_gen_tmpfilename();
$s_cmd=$s_fp_angervaks_entry_parent_dir.'/the_application.bash > '.$s_fp_output;
shell_exec($s_cmd);
readfile($s_fp_output);
unlink($s_fp_output);

//=======================================================================

