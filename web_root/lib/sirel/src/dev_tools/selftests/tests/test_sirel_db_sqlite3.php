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

class sirel_test_db_sqlite3 {


	private static function s_get_db_tmp_file_path() {
		try {
			$s_path_lib_sirel=constant('s_path_lib_sirel');
			$s_fp_tmp=$s_path_lib_sirel.'/var_default/tmp_';
			$s_fp_db_file=$s_fp_tmp.'/sirel_test_db_sqlite3_tmp_1.db';
			return $s_fp_db_file;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='ed6e4a41-d93e-49a6-91a5-126131318dd7'");
		} // catch
	} // s_get_db_tmp_file_path

	private static function del_db_file_if_it_exists() {
		try {
			$s_fp_db_file=sirel_test_db_sqlite3::s_get_db_tmp_file_path();
			if(file_exists($s_fp_db_file)===True) {
				unlink($s_fp_db_file);
			} // if
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='420b8edb-166a-4977-b4a5-126131318dd7'");
		} // catch
	} // del_db_file_if_it_exists

//-------------------------------------------------------------------------

	private static function test_db_connect() {
		try {
			$test_result=array();
			$ar_tc=array();
			sirel_test_db_sqlite3::del_db_file_if_it_exists();
			//----tests-cases-start----------------------
			$test_case['msg']='The class sirel_test_db_sqlite3'.
				'is inclomplete and it should not be part of selftestss.'.
				"\nGUID=='57dca850-1932-4c5c-94a5-126131318dd7'";
			$test_case['line_number']=__LINE__;
			$ar_tc[]=$test_case;
			// TODO: sqlite3 is not yet supported, because
			// the sqlite3 access requires the loading of
			// some dynamic libraries and the standard set
			// of Ubuntu libraries seem to have some
			// incompatibility flaw that prevents the sqlite3
			// library from being loaded.
			//
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
				" GUID='6b11a4bb-dffa-4152-92a5-126131318dd7'");
		} // catch
	} // test_db_connect

//-------------------------------------------------------------------------


//-------------------------------------------------------------------------
	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_db_sqlite3::test_db_connect();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='cbfe4745-f77b-4f74-b4a5-126131318dd7'");
		} // catch
	} // selftest

//-------------------------------------------------------------------------
} // class sirel_test_db_sqlite3

//=========================================================================

