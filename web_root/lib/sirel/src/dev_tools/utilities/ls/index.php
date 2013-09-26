<?php
// ------------------------------------------------------------------------
// Copyright (c) 2012, martin.vahi@softf1.com that has an
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
$s_path_lib_sirel=realpath('./../../../../');
if(defined('s_path_lib_sirel')!=True) {
	define('s_path_lib_sirel',$s_path_lib_sirel);
} // if
//require_once($s_path_lib_sirel.'/src/sirel.php');
require_once($s_path_lib_sirel.'/src/src/sirel_html.php');
require_once($s_path_lib_sirel.'/src/src/sirel_fs.php');
require_once($s_path_lib_sirel.'/src/src/sirel_text_concatenation.php');
//-------------------------------------------------------------------------
function s2link($s_in) {
	try {
		$s_out='';
		if($s_in!='index.php') {
			$s_out='<a href="./'.$s_in.'">'.$s_in."</a><br/>\n";
		} // if
		return($s_out);
	}catch (Exception $err_exception) {
sirelBubble_t2($err_exception,
" GUID='e0b1212e-e01f-4802-9465-b26121318dd7'");
	} // catch
} // s2link


$arht=sirelFS::ls(realpath('./'));
$i_len=count($arht);
$s_path=NULL;
$arht_list=array();
$s_token=NULL;
// In reality the folder is never empty, because it contains this index.php.
if (($i_len==1)&&($arht[0]=='index.php')) {
	array_push($arht_list, 'The folder is empty.');
} else {
	for($i=0;$i<$i_len;$i++) {
		$s_path=$arht[$i];
		$s_token=s2link($s_path,$i_s_ref_len);
		array_push($arht_list, $s_token);
	} // for
} // else
//-------------------------------------------------------------------------
$s_1=s_concat_array_of_strings($arht_list);
$ob_html=new sirelHTMLPage();
$s_block_start='<div style="position:relative;left:35px;top:35px;">';
$ob_html->add_2_ar_body($s_block_start.'<a href="./../">up</a>'."\n");
$ob_html->add_2_ar_body("</div>\n");
$s_block_start='<div style="position:relative;left:90px;top:70px;font-size:50pt;">';
$ob_html->add_2_ar_body($s_block_start."ls\n");
$ob_html->add_2_ar_body("</div>\n");
$s_block_start='<div style="position:relative;left:200px;top:80px;">';
$ob_html->add_2_ar_body($s_block_start."\n");
$ob_html->add_2_ar_body($s_1);
$ob_html->add_2_ar_body("</div>\n");
$s_html_out=$ob_html->to_s();
echo $s_html_out;
//=========================================================================
?>
