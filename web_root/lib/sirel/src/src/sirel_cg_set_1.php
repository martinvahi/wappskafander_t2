<?php
//=========================================================================
// Copyright (c) 2013, martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// All rights reserved.
//
// Redistribution and use in source and binary forms, with or
// without modification, are permitted provided that the following
// conditions are met:
//
// * Redistributions of source code must retain the above copyright
// notice, this list of conditions and the following disclaimer.
// * Redistributions in binary form must reproduce the above copyright
// notice, this list of conditions and the following disclaimer
// in the documentation and/or other materials provided with the
// distribution.
// * Neither the name of the Martin Vahi nor the names of its
// contributors may be used to endorse or promote products derived
// from this software without specific prior written permission.
//
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
require_once('sirel_lang.php');

//-------------------------------------------------------------------------

// The "cg" in the name of the class sirel_cg_set_1 stands 
// for "code generation". 
class sirel_cg_set_1 {

//-------------------------------------------------------------------------

	// Returns HTML-string, where the image has been embedded
	// to the img tag parameters.
	public static function s_img_fp_2_armoured_img_tag($s_fp) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_mbstring',$s_fp,
					"\n GUID='ff6f8b5d-7091-4d57-b5d0-612021318dd7'");
			} // if
			if(file_exists($s_fp)!==true) {
				sirelThrowLogicException(__FILE__, __LINE__,
					__CLASS__.'->'.__FUNCTION__.': '.
					"File with the path of \n".$s_fp.
					"\ndoes not exist.".
					"\nGUID='2b3edb94-8747-46c8-b3d0-612021318dd7'");
			} // if
			$arht_s_out=array();
			array_push($arht_s_out,'<img src="data:');
			$s_mimetype=sirelLang::s_mime_type($s_fp);
			array_push($arht_s_out, $s_mimetype);
			array_push($arht_s_out,';base64,');
			$x=file_get_contents($s_fp);
			$s_data=base64_encode($x);
			array_push($arht_s_out, $s_data);
			array_push($arht_s_out, '" />');
			$s_html=s_concat_array_of_strings($arht_s_out);
			return $s_html;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='99453422-43d3-411a-81d0-612021318dd7'");
		} // catch
	} // s_img_fp_2_armoured_img_tag

//------------------------------------------------------------

	public static function s_txt_2_verbatim_html($s_in) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_mbstring',$s_in,
					"\n GUID='fc327c50-12e3-4068-81d0-612021318dd7'");
			} // if
			// http://php.net/manual/en/function.htmlentities.php
			$i_flags=ENT_QUOTES|ENT_HTML5;
			$s_encoding='UTF-8';
			$s_0=htmlentities($s_in,$i_flags,$s_encoding);
			$s_html="<pre>\n".$s_0."\n</pre>\n";
			return $s_html;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='25b7712a-cd12-4430-a9c0-612021318dd7'");
		} // catch
	} // s_txt_2_verbatim_html

//------------------------------------------------------------

	public static function s_js_fp_2_embedded_js_script_tag($s_fp) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_mbstring',$s_fp,
					"\n GUID='f2e69f10-86e3-4fdc-82c0-612021318dd7'");
			} // if
			if(file_exists($s_fp)!==true) {
				sirelThrowLogicException(__FILE__, __LINE__,
					__CLASS__.'->'.__FUNCTION__.': '.
					"File with the path of \n".$s_fp.
					"\ndoes not exist.".
					"\nGUID='c8089620-be1d-4156-a2c0-612021318dd7'");
			} // if
			$arht_s_out=array();
			array_push($arht_s_out,
				"<script type=\"text/javascript\">\n");
			$s_file_content=sirelFS::file2str($s_fp);
			array_push($arht_s_out, $s_file_content);
			array_push($arht_s_out,"\n<script>\n");
			$s_html=s_concat_array_of_strings($arht_s_out);
			return $s_html;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='35852248-197d-49e9-92c0-612021318dd7'");
		} // catch
	} // s_js_fp_2_embedded_js_script_tag

//-------------------------------------------------------------------------
} // sirel_cg_set_1

