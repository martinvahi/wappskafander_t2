<?php
//=========================================================================
// Copyright (c) 2013, martin.vahi@softf1.com that has an
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

class sirel_test_db_postgresql {


	private static function ob_get_db_descriptor() {
		try {
			sirelBubble_t2($err_exception,
				'Not yet implemented.'.
				"\n GUID='2b9acd05-dd8c-47d3-bb16-126131318dd7'");
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='5e5f35a5-fb64-40f5-ae16-126131318dd7'");
		} // catch
	} // ob_get_db_descriptor

	private static function b_db_is_accessible() {
		try {
			//$ob_db_descriptor=sirel_test_db_postgresql::ob_get_db_descriptor();
			sirelBubble_t2($err_exception,
				'Not yet implemented.'.
				"\n GUID='d5044995-538a-4d67-8316-126131318dd7'");
			return false;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='85f109dd-7742-4246-b0f6-126131318dd7'");
		} // catch
	} // b_db_is_accessible

//-------------------------------------------------------------------------

	private static function test_db_connect() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$test_case['msg']='The class sirel_test_db_postgresql '.
				'is inclomplete and it should not be part of selftestss.'.
				"\nGUID=='19ee0965-5b6b-4dcc-a535-126131318dd7'";
			$test_case['line_number']=__LINE__;
			$ar_tc[]=$test_case;
			//$ob_db_descriptor=sirel_test_db_postgresql::ob_get_db_descriptor();

			// $arht_in=array('aa'=>'t','bb'=>True);
			// $b_x=sirel_ix::arht_has_keys($arht_in,'aa');
			// if($b_x!=True) {
			// $test_case['msg']='test 1, $b_x=='.$b_x;
			// $test_case['line_number']=__LINE__;
			// $ar_tc[]=$test_case;
			// } // if
			//------
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='3108f381-9415-4c35-bb55-126131318dd7'");
		} // catch
	} // test_db_connect


	private static function test_init_filicle() {
		try {
			$test_result=array();
			$ar_tc=array();
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			//if (sirel_test_db_postgresql::b_db_is_accessible()!=True) {
			//	return $test_result;
			//} // if
			//sirel_test_db_postgresql::del_db_file_if_it_exists();
			//----tests-cases-start----------------------
			$test_case['msg']='The class sirel_test_db_postgresql '.
				'is inclomplete and it should not be part of selftestss.'.
				"\nGUID=='4043f433-cca0-4db6-9845-126131318dd7'";
			$test_case['line_number']=__LINE__;
			$ar_tc[]=$test_case;
			//$ob_db_descriptor=sirel_test_db_postgresql::ob_get_db_descriptor();

			// $arht_in=array('aa'=>'t','bb'=>True);
			// $b_x=sirel_ix::arht_has_keys($arht_in,'aa');
			// if($b_x!=True) {
			// $test_case['msg']='test 1, $b_x=='.$b_x;
			// $test_case['line_number']=__LINE__;
			// $ar_tc[]=$test_case;
			// } // if
			//------
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='5454b1b2-736d-426d-b045-126131318dd7'");
		} // catch
	} // test_init_filicle

//-------------------------------------------------------------------------

	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_db_postgresql::test_db_connect();
			$ar_test_results[]=sirel_test_db_postgresql::test_init_filicle();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='d63d9d15-77c7-48c1-8d45-126131318dd7'");
		} // catch
	} // selftest

//-------------------------------------------------------------------------
} // class sirel_test_db_postgresql

//=========================================================================

