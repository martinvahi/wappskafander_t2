<?php
//=========================================================================
// Copyright (c) 2011, martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
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

class sirel_test_sirel_fs {

//-------------------------------------------------------------------------

	private static function test_arht_has_keys() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			/*
			$arht_in=array('aa'=>'t','bb'=>True);
			$b_x=sirel_ix::arht_has_keys($arht_in,'aa');
			if($b_x!=True) {
				$test_case['msg']='test 1, $b_x=='.$b_x.
					"\n GUID='445cf484-d1e0-4d3b-815a-f2a140c18dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			*/
			//------
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='439c0211-086e-4edb-ab5a-f2a140c18dd7'");
		} // catch
	} // test_arht_has_keys

//-------------------------------------------------------------------------

	private static function test_ls() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_path_lib_sirel=constant('s_path_lib_sirel');
			$s_fp_data=$s_path_lib_sirel.
				'/src/dev_tools/selftests'.
				'/data_for_tests/set_of_css_files_1';
			//--------------
			$s_folder_element_name_regex='.*';
			$arht_fn=sirelFS::ls($s_fp_data,
				$s_folder_element_name_regex);
			$i_x=count($arht_fn);
			if($i_x!=2) {
				$test_case['msg']='test 1a, $i_x=='.$i_x.
					"\n GUID='4b402ae2-20dc-4dcd-a64a-f2a140c18dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x_0=$arht_fn[0];
			$s_x_1=$arht_fn[1];
			if($s_x_0==$s_x_1) {
				$test_case['msg']='test 1b, '.
					"\n".'$s_x_0=='.$s_x_0.
					"\n".'$s_x_1=='.$s_x_1.
					"\n GUID='dc1b9912-5ce2-4025-803a-f2a140c18dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(($s_x_0!='aa.css')&&($s_x_0!='bb.css')) {
				$test_case['msg']='test 1c, '.
					"\n".'$s_x_0=='.$s_x_0.
					"\n".'$s_x_1=='.$s_x_1.
					"\n GUID='5d3ae8d1-4cc4-4882-b45a-f2a140c18dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(($s_x_1!='aa.css')&&($s_x_1!='bb.css')) {
				$test_case['msg']='test 1d, '.
					"\n".'$s_x_0=='.$s_x_0.
					"\n".'$s_x_1=='.$s_x_1.
					"\n GUID='19a1bdb1-c171-47ee-9e4a-f2a140c18dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------
			$s_x_2=mb_ereg_replace('[\n\r]|[ ]', '', $s_x_0);
			$i_x_0=mb_strlen($s_x_0);
			$i_x_1=mb_strlen($s_x_2);
			if($i_x_0!=$i_x_1) {
				$test_case['msg']='test 1d, '.
					"\n".'$s_x_0=='.$s_x_0.
					"\n".'$i_x_0=='.$i_x_0.
					"\n".'$i_x_1=='.$i_x_1.
					"\n GUID='3eedf9b5-3d5a-4a28-944a-f2a140c18dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='48b89304-b021-477e-9c2a-f2a140c18dd7'");
		} // catch
	} // test_ls

//-------------------------------------------------------------------------

	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_fs::test_arht_has_keys();
			$ar_test_results[]=sirel_test_sirel_fs::test_ls();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='a2499b97-de89-44e1-bb5a-f2a140c18dd7'");
		} // catch
	} // selftest

//-------------------------------------------------------------------------
} // class sirel_test_sirel_fs

//=========================================================================

