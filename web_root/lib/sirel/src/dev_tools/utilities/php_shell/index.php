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

if (defined('sb_sirel_php_shell_action')==True) {
} else {
	$s_path_lib_sirel=php_shell_config::$s_path_lib_sirel;
	if(defined('s_path_lib_sirel')!=True) {
		define('s_path_lib_sirel',$s_path_lib_sirel);
	} // if
	require_once($s_path_lib_sirel.'/src/src/sirel.php');
	require_once($s_path_lib_sirel.'/src/src/sirel_core_configuration.php');
} // else

$s_html_txarea_2='<textarea '.
		'name="textarea_2" id="textarea_2" rows="1" cols="75" autocomplete="on">'."\n".
		'</textarea>';
$arht_html_out=array();
$s_0=<<<HEREDOC
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">
<html>
	<head>
		<title>PHP Shell</title>
		<style type="text/css">
			/*According to the Yahoo YUI framework creators,
		the margin and padding on body element
		can introduce errors in determining
		element position and are not recommended;
		we turn them off as a foundation for YUI
		CSS treatments. */
			body {
				margin:0;
				padding:0;
			}
		</style>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body id="the_document_body" class="yui-skin-sam">
		<form action="action.php" id="the_form" method="post">
			<textarea name="the_php_source" id="the_php_source" rows="10" cols="75">
<!-- THE_SOURCE -->
			</textarea>
HEREDOC;
array_push($arht_html_out, $s_0);
if (php_shell_config::$s_security_mode=='naive_password_authentication') {
	array_push($arht_html_out,'<br/>'.$s_html_txarea_2);
};
$s_0=<<<HEREDOC
			<input type="submit" value="Submit" />
		</form>
		<!-- EXECUTION_RESULT -->
		<br/><br/>

	</body>
</html>
HEREDOC;
array_push($arht_html_out, $s_0);
$s_html=s_concat_array_of_strings($arht_html_out);
if (defined('sb_sirel_php_shell_action')==True) {
	return($s_html);
} else {
	echo($s_html);
} // else

//=========================================================================
?>
