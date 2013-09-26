<?php
// ========================================================================
// Copyright (c) 2013, martin.vahi@softf1.com that has an
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
// ========================================================================
require_once('sirel_fs.php');

// ------------------------------------------------------------------------

// It's for generating HTML code.
class sirel_htmlcg_funcset_1 {

	private $s_table_style_='border:1px;';
	private $s_table_class_='raudrohi_visible_table';

	public static function s_css_inclusions($s_fp_folder_with_css_files_or_a_file) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_mbstring',
					$s_fp_folder_with_css_files_or_a_file,
					"\n GUID='cea09636-69ff-40ef-a541-638060c18dd7'");
			} // if
			$s_0=mb_ereg_replace('[\n\r]','',
				$s_fp_folder_with_css_files_or_a_file);
			$s_1=mb_ereg_replace('[/]+','/',$s_0);
			// Root folder is also a folder and "/" is a valid path.
			// "./" is also a valid path.
			$s_fp_in=NULL;
			if(1<mb_strlen($s_1)) {
				$s_0=mb_ereg_replace('[.][/]$','',$s_1);
				if(mb_strlen($s_1)!==mb_strlen($s_0)) {
					$s_fp_in=$s_1;
				} else {
					$s_0=mb_ereg_replace('[/]$','',$s_1);
					$s_fp_in=$s_0;
				} // else
			} else {
				// $s_1 might be "/"
				$s_fp_in=$s_1;
			} // else
			if(file_exists($s_fp_in)!=TRUE) {
				sirelThrowLogicException_t2('A file or a folder '.
					'with a path of '."\n".$s_fp_in."\n".
					'does not exist.'.
					"\n GUID='3ae5e1c1-6482-42d4-a441-638060c18dd7'");
			} // if
			$s_lc_1='<link rel="stylesheet" href="';
			$s_lc_2='" type="text/css">'."\n";
			$s_out=NULL;
			if(is_file($s_fp_in)===TRUE) {
				$s_out=$s_lc_1.$s_fp_in.$s_lc_2;
				return $s_out;
			} // if
			$s_lc_1='<link rel="stylesheet" href="'.$s_fp_in.'/';
			$s_folder_element_name_regex='.*css';
			$arht_fn=sirelFS::ls($s_fp_in,
				$s_folder_element_name_regex);
			$arht_s=array();
			$i_len=count($arht_fn);
			$s_elem=NULL;
			$s_0=NULL;
			for($i=0;$i<$i_len;$i++) {
				$s_elem=$arht_fn[$i];
				$s_0=$s_lc_1.$s_elem.$s_lc_2;
				array_push($arht_s, $s_0);
			} // for
			$s_out=s_concat_array_of_strings($arht_s);
			return $s_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='4af25d5d-8264-4991-b131-638060c18dd7'");
		} // catch
	} // s_css_inclusions

} // class sirel_htmlcg_funcset_1 

// ========================================================================

