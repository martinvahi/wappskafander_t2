<?php
//=========================================================================
// Copyright (c) 2011, martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// All rights reserved.

// Redistribution and use in source and binary forms, with or
// without modification, are permitted provided that the following
// conditions are met:

// * Redistributions of source code must retain the above copyright
// notice, this list of conditions and the following disclaimer.
// * Redistributions in binary form must reproduce the above copyright
// notice, this list of conditions and the following disclaimer
// in the documentation and/or other materials provided with the
// distribution.
// * Neither the name of the Martin Vahi nor the names of its
// contributors may be used to endorse or promote products derived
// from this software without specific prior written permission.

// THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND
// CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES,
// INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
// MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
// DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR
// CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
// SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
// BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
// SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
// INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
// WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
// NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
// OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
//=========================================================================
require_once('php_shell_config.php');
$s_path_lib_sirel=php_shell_config::$s_path_lib_sirel;
if(defined('s_path_lib_sirel')!=True) {
	define('s_path_lib_sirel',$s_path_lib_sirel);
} // if
require_once($s_path_lib_sirel.'/src/src/sirel.php');
require_once($s_path_lib_sirel.'/src/src/sirel_core_configuration.php');
//=========================================================================

//-------------------------------------------------------------------------
function sirel_php_shell_inbound_source_execution_result(&$s_src,
		&$s_path_lib_sirel) {
	$s_cdfragment=''.
			'$s_path_lib_sirel="'.$s_path_lib_sirel.'";'."\n".
			"if(defined('s_path_lib_sirel')!=True) {\n".
			"	define('s_path_lib_sirel',".'$s_path_lib_sirel'.");\n".
			"} // if\n";

	$s_php_requires='';
	$s_php_file_existence_checks='';
	$i_len=count(php_shell_config::$ar_paths_to_PHP_files_that_get_loaded_by_default);
	$s='';
	if(0<$i_len) {
		foreach (php_shell_config::$ar_paths_to_PHP_files_that_get_loaded_by_default as $s_path) {
			// The 's_fp_1 is needed to cope with possible linebreaks
			// that the $s_path might contain.
			$s='$s_fp_1=\''.$s_path.'\';'."\n";
			$s=$s.'if(file_exists($s_fp_1)==False) {'."\n".
					'throw new Exception(\'<br/>The default inclusion file, <br/>\'.'.
					'$s_fp_1.\'<br/> does not exist.<br/>\');'."\n".
					"   \$b_inclusion_ok=False;\n".
					"} // if\n";
			$s_php_file_existence_checks=$s_php_file_existence_checks.$s;
			$s_php_requires=$s_php_requires."require_once('".$s_path."');\n";
		} // foreach
	} // if
	$s_php_requires=$s_php_requires."\n";

	$s_tmpfile_content="<?php\n".$s_cdfragment.
			"\$b_inclusion_ok=True;\n".
			"try {\n".
			$s_php_file_existence_checks."\n".
			$s_php_requires."\n".
			"}catch (Exception \$err_exception) {\n".
			"   \$b_inclusion_ok=False;\n".
			"	echo('<br/>Inclusion of a PHP file that is described '.\n".
			"        'in the php_shell_config.php failed. The fault:<br/>'.\n".
			"			\$err_exception->getMessage().'<br/>');\n".
			"} // catch\n".
			"if(\$b_inclusion_ok==True){\n".
			"try {\n".$s_php_requires.
			"	echo('<br/>----PHP--shell--output--start------<br/>'.\"\\n\");\n".
			$s_src.
			"\n	echo('<br/>----PHP--shell--output--end--------<br/>'.\"\\n\");\n".
			"}catch (Exception \$err_exception) {\n".
			"	echo('<br/>The script was faulty. The fault:<br/>'.\n".
			"			\$err_exception->getMessage().'<br/>');\n".
			"} // catch\n".
			"} // if\n".
			"?>";
	$s_result=sirel_eval::s_php($s_tmpfile_content);
	return($s_result);
} // sirel_php_shell_inbound_source_execution_result

//-------------------------------------------------------------------------
$s_php_exec_output="\n".'For security reasons, the shell has been <br/>'."\n".
		'turned off. It can be turned back on by editing the <br/>'."\n".
		'php_shell_config.php and making sure that the <br/>'."\n".
		'php_shell_config::\$b_activated==True. <br/>'.
		"<br/>\n".
		'';
if(sirelSiteConfig::$debug_PHP==False) {
	// One might forget to turn the PHP shell
	// off in the production mode.
	php_shell_config::$b_activated=False;
	$s_php_exec_output=$s_php_exec_output.
			'Currently the sirelSiteConfig::\$debug_PHP==False and <br/> '.
			'if the sirelSiteConfig::\$debug_PHP==False, then '.
			'the php_shell_config::\$b_activated:= False; <br/>'."\n".
			'The sirelSiteConfig::\$debug_PHP can be edited from '.
			'\$SIREL_HOME/src/sirel_core_configuration.php<br/>'.
			'';
} // if
$s_security_mode=php_shell_config::$s_security_mode;
$b_exec_php=False;
if(php_shell_config::$b_activated==True) {
	if ($s_security_mode=='naive_password_authentication') {
		$s=$_POST['textarea_2'];
		$s=mb_ereg_replace("\\\\",'',$s);
		$s_password=mb_ereg_replace("\n",'',$s);
		if (sirelLang::str1EqualsStr2($s_password, php_shell_config::$s_password)==True) {
			$b_exec_php=True;
		} else {
                        sleep(10);
			$s_php_exec_output="\n".'<br/>Wrong password.<br/>'."\n";
		} // else
	} else {
		if ($s_security_mode=='public_access') {
			$b_exec_php=True;
		} else {
			$s_php_exec_output="\n".
					'<br/>There is a flaw in the configuration of '.
					'the sirel PHP shell.<br/>'.
					'$s_php_exec_output=='.$s_php_exec_output.
					' is not supported. <br/>'."\n";
		} // else
	} // else
} // if
$s=$_POST['the_php_source'];
$s_src=mb_ereg_replace("\\\\","",$s);
$s_src=sirelLang::mb_trim($s_src);
if ($b_exec_php==True) {
	$s_php_exec_output=sirel_php_shell_inbound_source_execution_result($s_src,
			$s_path_lib_sirel);
} // if
//-------------------------------------------------------------------------
$s_file_path=realpath('./').'/index.php';
$f=fopen($s_file_path,'r');
$i_file_size=filesize($s_file_path);
$s_index_php=fread($f,$i_file_size);
fclose($f);
$s_php_out=$s_index_php;
//-------------------------------------------------------------------------
$s_php_out=mb_ereg_replace('<!-- EXECUTION_RESULT -->',
		$s_php_exec_output,$s_php_out);
$s_php_out=mb_ereg_replace('[<]'.'[?]php','',$s_php_out);
$s_php_out=mb_ereg_replace('[?]'.'[>]','',$s_php_out);
$s_php_out="\ndefine('sb_sirel_php_shell_action','t');\n".$s_php_out;

// The textarea must not be filled with the PHP before 
// executing the eval, because otherwise the code in the 
// textarea will also get executed.
$s_html_out=eval($s_php_out);
$s_html_out=mb_ereg_replace('<!-- THE_SOURCE -->',$s_src,$s_html_out);
$s_html_out=sirelLang::mb_trim($s_html_out);
echo($s_html_out);
//=========================================================================
?>
