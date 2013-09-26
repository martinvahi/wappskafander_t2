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

class sirel_test_sirel_htmlcg_funcset_1 {

//-------------------------------------------------------------------------

	private static function test_s_css_inclusions() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_fp_datadir="./data_for_tests/set_of_css_files_1";
			//--------------------------
			$s_x=sirel_htmlcg_funcset_1::s_css_inclusions($s_fp_datadir);
			// The order of the CSS files is random, which
			// makes it inpractical to exactly
			// test for the combined output.
			//$s_0=mb_ereg_replace('[<>]',' X ',$s_x);
			//echo($s_0);
			//------
			$s_x=sirel_htmlcg_funcset_1::s_css_inclusions($s_fp_datadir.
				'/aa.css');
			$s_expected='<link rel="stylesheet" '.
				'href="./data_for_tests/set_of_css_files_1/aa.css" '.
				'type="text/css">'."\n";
			if($s_x!=$s_expected) {
				$test_case['msg']='test 1, '.
					"\n".'________$s_x=='.
					mb_ereg_replace(' ','H',
					mb_ereg_replace('[>]','&gt;',
					mb_ereg_replace('[<]','&lt;',$s_x))).
					"\n".'$s_expected=='.
					mb_ereg_replace(' ','H',
					mb_ereg_replace('[>]','&gt;',
					mb_ereg_replace('[<]','&lt;',$s_expected))).
					"\n GUID='285dcf45-092b-4106-a37d-e0a070c18dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------
			$s_x=sirel_htmlcg_funcset_1::s_css_inclusions($s_fp_datadir.
				'/bb.css');
			$s_expected='<link rel="stylesheet" '.
				'href="./data_for_tests/set_of_css_files_1/bb.css" '.
				'type="text/css">'."\n";
			if($s_x!=$s_expected) {
				$test_case['msg']='test 2, '.
					"\n".'________$s_x=='.
					mb_ereg_replace(' ','H',
					mb_ereg_replace('[>]','&gt;',
					mb_ereg_replace('[<]','&lt;',$s_x))).
					"\n".'$s_expected=='.
					mb_ereg_replace(' ','H',
					mb_ereg_replace('[>]','&gt;',
					mb_ereg_replace('[<]','&lt;',$s_expected))).
					"\n GUID='4a7f5c43-cac4-462d-bd7d-e0a070c18dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='4cedc21b-b7bc-49eb-b27d-e0a070c18dd7'");
		} // catch
	} // test_s_css_inclusions

//-------------------------------------------------------------------------
	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_htmlcg_funcset_1::test_s_css_inclusions();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='49927741-5008-495a-b27d-e0a070c18dd7'");
		} // catch
	} // selftest

//-------------------------------------------------------------------------
} // class sirel_test_sirel_htmlcg_funcset_1

//=========================================================================

