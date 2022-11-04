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
require_once('sirel_progfte.php');
require_once('sirel_fs.php');

//-------------------------------------------------------------------------

class sirel_relay_t1_implementation {

	private $s_fp_console_application_=NULL;
	private $s_fp_metadata_=NULL;
	private $b_s_fp_response_file_set_=FALSE;
	private $s_fp_response_file_=NULL;
	private $b_s_fp_tmpfolder_set_=FALSE;
	private $s_fp_tmpfolder_=NULL;
	private $s_fp_tmplink_=NULL; // if exists, then in the $s_fp_tmpfolder_
	private $s_debug_msg_='';

	public function __construct($s_fp_console_application) {
		try {
			sirelLang::assert_file_exists(__FILE__, __LINE__,
				__CLASS__,__FUNCTION__,
				$s_fp_console_application,
				"\n GUID='81224c6b-6d67-4e4f-a94f-a07260418dd7'");
			$this->s_fp_console_application_=$s_fp_console_application;
			$s_extension='txt';
			$this->s_fp_metadata_=sirelFS::s_gen_tmpfilename($s_extension);
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='d6ec54a3-b2a0-411d-942f-a07260418dd7'");
		}
	} // constructor

//-------------------------------------------------------------------------

	private function delete_temporary_files() {
		try {
			if($this->b_s_fp_response_file_set_==TRUE) {
				$s_fp_response_file=$this->s_fp_response_file_;
				if (unlink($s_fp_response_file)==FALSE) {
					sirelThrowLogicException_t2(''.
						'File deletion failed. '.
						"\n".'$s_fp_response_file=='.
						$s_fp_response_file.
						"\nGUID='d4007a26-a3f3-4287-a07f-a07260418dd7'");
				} // if
				$this->b_s_fp_response_file_set_=FALSE;
				$this->s_fp_response_file_=NULL;
			} // if
			$s_fp_metadata=$this->s_fp_metadata_;
			if(file_exists($s_fp_metadata)==TRUE) {
				if (unlink($s_fp_metadata)==FALSE) {
					sirelThrowLogicException_t2('File deletion failed. '.
						"\n".'$s_fp_metadata=='.
						$s_fp_metadata.
						"\n GUID='84e12cf0-e7eb-41ae-b5ee-a07260418dd7'");
				} // if
			} // if
			if($this->b_s_fp_tmpfolder_set_==TRUE) {
				$s_fp_tmplink=$this->s_fp_tmplink_;
				if(file_exists($s_fp_tmplink)==TRUE) {
					if (unlink($s_fp_tmplink)==FALSE) {
						sirelThrowLogicException_t2(''.
							'Link deletion failed. '.
							"\n".'$s_fp_tmplink=='.
							$s_fp_tmplink.
							"\n GUID='96711d45-a6d5-45cc-a41e-a07260418dd7'");
					} // if
				} // if
				$s_fp_tmp_folder=$this->s_fp_tmpfolder_;
				if (rmdir($s_fp_tmp_folder)==FALSE) {
					sirelThrowLogicException_t2('Failed to delete '.
						'the temporary folder.'.
						"\n $s_fp_tmp_folder==".$s_fp_tmp_folder.
						"\n GUID='b26786f7-d308-4924-bb5e-a07260418dd7'");
				} // if
				$this->b_s_fp_tmpfolder_set_=FALSE;
			} // if
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='43584d84-adf3-48f6-943e-a07260418dd7'");
		} // catch
	} // delete_temporary_files

//-------------------------------------------------------------------------

	private function s_write_request_data_2_files_h1(&$arht_method_post_get_put,
		&$arht_meta,$s_key_name) {
		try {
			$arht_s=array();
			$s_type=NULL;
			$s_lc_mbstr='sirelTD_is_mbstring';
			$ar_keys=array_keys($arht_method_post_get_put);
			$value=null;
			foreach ($ar_keys as $s_key) {
				$value=$arht_method_post_get_put[$s_key];
				$s_type=sirelLang::type_2_s($value);
				if ($s_type==$s_lc_mbstr) {
					$arht_s[$s_key]=$value;
				} // if
			} // foreach
			$s_progfte_mth=sireProgFTE::ht2ProgFTE($arht_s);
			$arht_meta[$s_key_name]=$s_progfte_mth;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='180a2123-33ad-4483-ae4e-a07260418dd7'");
		} // catch
	} // s_write_request_data_2_files_h1

	private function s_write_request_data_2_files_h2_file_uploads(&$arht_meta) {
		try {
			// The maximum allowed upload size is determined
			// either by using the php.ini or .htaccess and,
			// supposedly, is not dynamically editable.
			//
			// http://stackoverflow.com/questions/2184513/php-change-the-maximum-upload-file-size
			//
			// http://www.php.net/manual/en/features.file-upload.post-method.php
			//
			$arht_meta['sb_file_uplad_attempted']='f';
			$arht_meta['sb_file_upload_failed']='f';
			$s_lc_ar='sirelTD_is_array';
			$s_type=sirelLang::type_2_s($_FILES);
			if ($s_type!=$s_lc_ar) {
				return;
			} // if
			$arht_userfile=$_FILES['sirel_form_file_field'];
			$s_type=sirelLang::type_2_s($arht_userfile);
			if ($s_type!=$s_lc_ar) {
				return;
			} // if
			//------
			$arht_meta['sb_file_uplad_attempted']='t';
			$arht_meta['sb_file_upload_failed']='t';
			//------
			$i_error=$arht_userfile['error'];
			if ($i_error!=UPLOAD_ERR_OK) {
				$arht_meta['s_file_upload_error']=''.$i_error;
				return;
			} // if
			$arht_meta['sb_file_upload_failed']='f';
			$s_fp_tmp_file=$arht_userfile['tmp_name'];
			$s_fp_tmp_folder=sirelFS::s_create_tmpfolder();
			$this->b_s_fp_tmpfolder_set_=TRUE;
			$this->s_fp_tmpfolder_=$s_fp_tmp_folder;
			$s_fp_tmplink=$s_fp_tmp_folder.
				'/'.$arht_userfile['name'];
			$this->s_fp_tmplink_=$s_fp_tmplink;
			if(symlink($s_fp_tmp_file,$s_fp_tmplink)!=TRUE) {
				sirelThrowLogicException_t2('Symlink creation failed. '.
					"\n target == ".$s_fp_tmp_file.
					"\n link == ".$s_fp_tmplink.
					"\n GUID='bbf28e63-79d3-4a77-874e-a07260418dd7'");
			} // if
			$arht_meta['s_fp_tmp_uploaded_file']=$s_fp_tmplink;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='6466dcae-dd1f-46ae-b61e-a07260418dd7'");
		} // catch
	} // s_write_request_data_2_files_h2_file_uploads

	// Returns a path to the temporary metadata file.
	private function s_write_request_data_2_files() {
		try {
			$arht_meta=array();
			$this->s_write_request_data_2_files_h2_file_uploads($arht_meta);
			$this->s_write_request_data_2_files_h1($_POST,
				$arht_meta,'s_progfte_post');
			$this->s_write_request_data_2_files_h1($_GET,
				$arht_meta,'s_progfte_get');
			$s_progfte_meta=sireProgFTE::ht2ProgFTE($arht_meta);
			sirelFS::str2file($s_progfte_meta,$this->s_fp_metadata_);
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='a466eca4-6b4e-4723-b35e-a07260418dd7'");
		} // catch
	} // s_write_request_data_2_files

//-------------------------------------------------------------------------

	private function echo_or_relay_request_response_and_conditionally_exit() {
		try {
			$s_progfte=sirelFS::file2str($this->s_fp_metadata_);
			$arht_meta=sireProgFTE::ProgFTE2ht($s_progfte);
			$s_response_type=$arht_meta['s_response_type'];
			if ($s_response_type=='text') {
				$s_response=$arht_meta['s_response'];
				$s_0=$this->s_debug_msg_;
				$s_1=NULL;
				if(0<mb_strlen($s_0)) {
					$s_1=$s_response.$this->s_debug_msg_;
				} else {
					$s_1=$s_response;
				} // else
				echo($s_1);
				$this->delete_temporary_files();
				return;
			} // if
			if ($s_response_type=='file') {
				// Credits go to:
				// http://stackoverflow.com/questions/6175533/how-to-return-a-file-in-php
				//
				$s_fp_response_file=$arht_meta['s_fp_response_file'];
				if (file_exists($s_fp_response_file)) {
					//$s_fp_response_file=realpath($s_fp_response_file);
					$this->s_fp_response_file_=$s_fp_response_file;
					$this->b_s_fp_response_file_set_=TRUE;
					$s_file_name=sirelLang::s_get_tail('/',
						$s_fp_response_file);
					$s_mime_type=sirelLang::s_mime_type($s_fp_response_file);
					header($_SERVER['SERVER_PROTOCOL'] . ' 200 OK');
					header('Cache-Control: public'); // needed for i.e.
					header('Content-Type: '.$s_mime_type);
					header('Content-Transfer-Encoding: Binary');
					header('Content-Length: '.filesize($s_fp_response_file));
					header('Content-Disposition: attachment; '.
						'filename='.$s_file_name);
					readfile($s_fp_response_file);
					$this->delete_temporary_files();
					die();
				} else {
					$this->delete_temporary_files();
					die('Error: File not found. '.
						"\nGUID='17d407c5-657a-43ff-913e-a07260418dd7'");
				}
				exit;
			}  // if
			sirelThrowLogicException(__FILE__, __LINE__,
				__CLASS__.'->'.__FUNCTION__.': '.
				'$s_response_type==\"'.$s_response_type.
				"\"\nGUID='7e19aff1-414b-44c4-981e-a07260418dd7'");
		}catch (Exception $err_exception) {
			$this->delete_temporary_files();
			sirelBubble_t2($err_exception,
				" GUID='38e10403-f5d1-4601-a22e-a07260418dd7'");
		} // catch
	} // echo_or_relay_request_response_and_conditionally_exit

//-------------------------------------------------------------------------

	// Calls the echo or PHP passthrough and exits.
	// http://stackoverflow.com/questions/772479/php-exec-and-return-binary
	public function run_and_if_a_file_is_returned_then_exit() {
		try {
			$this->s_write_request_data_2_files();
			shell_exec($this->s_fp_console_application_.
				' '.$this->s_fp_metadata_);
			$this->echo_or_relay_request_response_and_conditionally_exit();
		}catch (Exception $err_exception) {
			$this->delete_temporary_files();
			sirelBubble_t2($err_exception,
				" GUID='33a16b34-8f60-4995-8d4d-a07260418dd7'");
		} // catch
	} // run_and_if_a_file_is_returned_then_exit

} // sirel_relay_t1_implementation

//-------------------------------------------------------------------------

// The 03_example_site_that_passes_the_request_on_2_another_programe
// at the documentation examples folder describes the use of 
// the sirel_relay_t1 class.
class sirel_relay_t1 {

	// Calls the echo or PHP passthrough and exits.
	// http://stackoverflow.com/questions/772479/php-exec-and-return-binary
	//
	// The structure of the data of the hashtable
	// that is assembled from client data and serialized to ProgFTE:
	//
	//     if sb_file_uplad_attempted=='t'
	//        AND
	//        sb_file_upload_failed=='f'
	//           |
	//           +---s_fp_tmp_uploaded_file
	//
	//     if sb_file_uplad_attempted=='t'
	//        AND
	//        sb_file_upload_failed=='t'
	//        AND
	//        $_FILES['sirel_form_file_field']['error']!=UPLOAD_ERR_OK
	//           |
	//           +---s_file_upload_error==$_FILES['sirel_form_file_field']['error']
	//
	//     s_progfte_post
	//     s_progfte_get
	//
	// The structure of the data of the hashtable
	// that is assembled from ProFTE that depicts server
	// response:
	//     if s_response_type=="text"
	//         |
	//         +---s_response
	//
	//     if s_response_type=="file"
	//         |
	//         +---s_fp_response_file
	//
	public static function run_and_if_a_file_is_returned_then_exit($s_fp_console_application) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_file_exists(__FILE__, __LINE__,
					__CLASS__,__FUNCTION__,
					$s_fp_console_application,
					"\n GUID='8b85818f-245e-4833-94dd-a07260418dd7'");
			} // if
			$ob_engine=new sirel_relay_t1_implementation($s_fp_console_application);
			$ob_engine->run_and_if_a_file_is_returned_then_exit();
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='453725a4-444a-438f-8a8d-a07260418dd7'");
		} // catch
	} // run_and_if_a_file_is_returned_then_exit

//-------------------------------------------------------------------------
} // sirel_relay_t1

// When wondering about the extra bytes at the downloaded file,
// check out:
// http://stackoverflow.com/questions/8041564/php-readfile-adding-extra-bytes-to-downloaded-file

