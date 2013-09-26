<?php
//=========================================================================
// Copyright 2010, martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// All rights reserved.
//
// Redistribution and use in source and binary forms, with or
// without modification, are permitted provided that the following
// conditions are met:
//
// * Redistributions of source code must retain the above copyright
//   notice, this list of conditions and the following disclaimer.
// * Redistributions in binary form must reproduce the above copyright
//   notice, this list of conditions and the following disclaimer
//   in the documentation and/or other materials provided with the
//   distribution.
// * Neither the name of the Martin Vahi nor the names of its
//   contributors may be used to endorse or promote products derived
//   from this software without specific prior written permission.
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
//=========================================================================
class sirelFS {

	// Always returns an UTF-8. It throws an exception, if
	// the file does not exist.
	public static function file2str($s_file_path) {
		try {
			if (!file_exists($s_file_path)) {
				throw(new Exception('A File or a folder with the path of "'.
					$s_file_path.'" does not exist.'.
					"\n GUID='4599dd14-d208-4a2c-85a2-03b350418dd7'"));
			} // if
			if (is_dir($s_file_path)) {
				throw(new Exception('"'.$s_file_path.'" is a folder, but '.
					'a file is required.'.
					"\n GUID='7df43b39-5c74-48d7-b2a2-03b350418dd7'"));
			} // if
			$file_handle = fopen($s_file_path, "rb"); // b for Windows.
			$s_raw=fread($file_handle, filesize($s_file_path));
			fclose($file_handle);
			// The
			// $s_out=utf8_encode($s_raw);
			// causes some weird errors.
			// Test txt-file content: "Résumé". Hence:
			$s_out=$s_raw;
			return $s_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='1359a91c-5a3f-4ba4-93a2-03b350418dd7'");
		} // catch
	} // file2str

	public static function str2file($s_file_content,$s_file_path) {
		$file_handle=NULL;
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
					__FUNCTION__,'sirelTD_is_mbstring',$s_file_content);
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
					__FUNCTION__,'sirelTD_is_mbstring',$s_file_path);
			} // if
			if (file_exists($s_file_path)) {
				if (is_dir($s_file_path)) {
					throw(new Exception('"'.$s_file_path.'" is a folder, but '.
						'only a file is allowed to be overwritten.'));
				} // if
			} // if
			$s_0=utf8_encode($s_file_content);
			// The following code is partly copy/pasted from:
			// http://bytes.com/topic/php/answers/497802-utf-8-file-reading-writing-php
			$file_handle = fopen($s_file_path, "wb+");
			fwrite($file_handle, $s_0);
			fclose($file_handle);
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='d0a7c43c-b8c4-4b3f-a3a2-03b350418dd7'");
		} // catch
	} // str2file


	// It always retunrs an array of folder element names, NOT FULL PATHS.
	// The element names are without linebreaks.
	// The array may be empty. It throws an exception, if
	// the folder does not exist.
	public  static function ls($s_path_to_a_folder,$s_folder_element_name_regex='.*') {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
					__FUNCTION__,'sirelTD_is_mbstring',$s_path_to_a_folder);
			} // if
			if (!file_exists($s_path_to_a_folder)) {
				throw(new Exception('A folder with a path of "'.
					$s_path_to_a_folder.'" does not exist.'));
			} // if
			if (!is_dir($s_path_to_a_folder)) {
				throw(new Exception('"'.$s_path_to_a_folder.'" is a file, but '.
					'a folder is required.'));
			} // if
			$ar_out=array();
			$b_go_on=True;
			$dir_handle=opendir($s_path_to_a_folder);
			$x=NULL;
			$s_lc_emptystring='';
			while ($b_go_on===True) {
				$x=readdir($dir_handle);
				if ($x===False) {
					$b_go_on=False;
				} else {
					if (($x!==0)&&($x!=='')) {
						if (($x!=='..')&&($x!=='.')) {
							if(mb_ereg_match($s_folder_element_name_regex,$x,$s_lc_emptystring)==True) {
								array_push($ar_out,$x);
							} // if
						} // if
					} // if
				} // else
			} // if
			closedir($dir_handle);
			return $ar_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='5359f09e-7789-4e4f-b6a2-03b350418dd7'");
		} // catch
	} // ls

	//------------------------------------------------------------------

	// If the b_search_for_folders==false, then files are searched.
	private static function arht_folder_or_file_paths_impl(&$s_path_to_a_folder,
		$b_search_for_folders) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
					__FUNCTION__,'sirelTD_is_mbstring',$s_path_to_a_folder);
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
					__FUNCTION__,'sirelTD_is_bool',$b_search_for_folders);
			} // if
			if (!file_exists($s_path_to_a_folder)) {
				throw(new Exception('A folder with a path of "'.
					$s_path_to_a_folder.'" does not exist.'));
			} // if
			if (!is_dir($s_path_to_a_folder)) {
				throw(new Exception('"'.$s_path_to_a_folder.'" is a file, but '.
					'a folder is required.'));
			} // if
			$arht_out=array();
			$arht_files_and_folders=sirelFS::ls($s_path_to_a_folder);
			$i_len=count($arht_files_and_folders);
			$s_path=NULL;
			$s_0=NULL;
			$s_1=NULL;
			if($b_search_for_folders==True) {
				for($i=0;$i<$i_len;$i++) {
					$s_0=$arht_files_and_folders[$i];
					if(is_dir($s_0)==True) {
						array_push($arht_out, $s_0);
					} else {
						$s_1=$s_path_to_a_folder.'/'.$s_0;
						// "//" -> "/"
						$s_path=mb_ereg_replace('[/]+', '/', $s_1);
						if(is_dir($s_path)==True) {
							array_push($arht_out, $s_path);
						} // if
					} // else
				} // for
			} else { // search for files
				for($i=0;$i<$i_len;$i++) {
					$s_0=$arht_files_and_folders[$i];
					if (file_exists($s_0)) {
						if(!is_dir($s_0)==True) {
							array_push($arht_out, $s_0);
						} // if
					} else {
						$s_1=$s_path_to_a_folder.'/'.$s_0;
						// "//" -> "/"
						$s_path=mb_ereg_replace('[/]+', '/', $s_1);
						if (file_exists($s_path)) {
							if(!is_dir($s_path)==True) {
								array_push($arht_out, $s_path);
							} // if
						} // if
					} // else
				} // for
			} // else
			return $arht_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='53ab9cb3-45b4-4072-b2a2-03b350418dd7'");
		} // catch
	} // arht_folder_or_file_paths_impl

	//  Returns an array of folder paths. It's like the ls with a
	// filter.
	public  static function arht_folder_paths($s_path_to_a_folder) {
		try {
			$b_search_for_folders=True;
			$arht_out=sirelFS::arht_folder_or_file_paths_impl(
				$s_path_to_a_folder,$b_search_for_folders);
			return $arht_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='24907395-c264-46e8-83a2-03b350418dd7'");
		} // catch
	} // arht_folder_paths

	//  Returns an array of file paths. It's like the ls with a
	// filter.
	public  static function arht_file_paths($s_path_to_a_folder) {
		try {
			$b_search_for_folders=False;
			$arht_out=sirelFS::arht_folder_or_file_paths_impl(
				$s_path_to_a_folder,$b_search_for_folders);
			return $arht_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='96559550-36fd-4db9-a1a2-03b350418dd7'");
		} // catch
	} // arht_file_paths

	//------------------------------------------------------------------

	// Returns an array with more popular image file extensions.
	// All of the file extensions have been written in lowercase.
	public static function arht_image_file_extensions() {
		try {
			$arht_out=array();
			array_push($arht_out, 'png');
			array_push($arht_out, 'jpg');
			array_push($arht_out, 'jpeg');
			array_push($arht_out, 'bmp');
			array_push($arht_out, 'gif');
			array_push($arht_out, 'svg');
			return $arht_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='10eb6b57-bce6-4da3-93a2-03b350418dd7'");
		} // catch
	} // arht_image_file_extensions

	public static function arht_image_file_paths($s_path_to_a_folder) {
		try {
			$arht_out=array();
			$arht_file_paths=sirelFS::arht_file_paths($s_path_to_a_folder);
			$i_len=count($arht_file_paths);
			$s_fp=NULL;
			$s_lc_1='.+';
			$s_lc_2='$';
			$s_0=NULL;
			$s_1=NULL;
			$s_extension=NULL;
			$b_match=False;
			$arht_xt=sirelFS::arht_image_file_extensions();
			$i_len_xt=count($arht_xt);
			$s_xt=NULL;
			$s_rgx=NULL;
			for($i=0;$i<$i_len;$i++) {
				$s_fp=$arht_file_paths[$i];
				for($ii=0;$ii<$i_len_xt;$ii++) {
					$s_xt=$arht_xt[$ii];
					$s_rgx=$s_lc_1.$s_xt.$s_lc_2;
					$s_1=mb_strtolower($s_fp);
					$b_match=mb_ereg_match($s_rgx,$s_1);
					if($b_match==True) {
						array_push($arht_out, $s_fp);
					} // if
				} // for
			} // for
			return $arht_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='6112aa18-0ec1-4df5-8592-03b350418dd7'");
		} // catch
	} // arht_image_file_paths

	//------------------------------------------------------------------

	public static function s_gen_tmpfilename($s_extension='txt') {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_is_string_nonempty_after_trimming(__FILE__,
					__LINE__, __CLASS__,__FUNCTION__,
					'sirelTD_is_mbstring',$s_extension,
					"\n GUID='f29ccf2b-4902-4db3-8192-03b350418dd7'");
			} // if
			$s_fp_tmp_folder=sirelSiteConfig::$tmp_folder;
			$s_out=$s_fp_tmp_folder.
				'/tmpfile_'.time().'_'.mt_rand(0,99999).
				'.'.$s_extension;
			return $s_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='3f21ca5a-07d4-4b99-a392-03b350418dd7'");
		} // catch
	} // s_gen_tmpfilename

	//------------------------------------------------------------------

	// Creates a new, temporary, folder and repturns its full path.
	public static function s_create_tmpfolder() {
		try {
			$s_fp_tmp_folder=sirelSiteConfig::$tmp_folder;
			$s_fp=$s_fp_tmp_folder.
				'/tmpfolder_'.time().'_'.mt_rand(0,99999);
			while(file_exists($s_fp)==TRUE) {
				$s_fp=$s_fp_tmp_folder.
					'/tmpfolder_'.time().
					'_'.mt_rand(0,99999);
			} // while
			$i_mode=0777;
			$b_recursive=TRUE; // The "-p" at the "mkdir -p "
			if(mkdir($s_fp,$i_mode,$b_recursive)!=TRUE) {
				sirelThrowLogicException_t2('$s_fp=='.$s_fp.
					"\n GUID='741d771d-87c5-4940-b392-03b350418dd7'");
			} // if
			return $s_fp;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='ba730235-5ae4-494d-9292-03b350418dd7'");
		} // catch
	} // s_create_tmpfolder

	//------------------------------------------------------------------

} // class sirelFS

