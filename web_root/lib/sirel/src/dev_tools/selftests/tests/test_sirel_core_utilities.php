<?php
//=========================================================================
// Copyright (c) 2012, martin.vahi@softf1.com that has an
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

class sirel_test_sirel_core_utilities {

	private static function test_1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//--------------------
			$arht_x=array();
			// Tests for an empty $arht_x.
			$s_x=s_concat_array_of_strings($arht_x);
			$s_expected="";
			if(!sirelLang::str1EqualsStr2($s_x, $s_expected)) {
				$test_case['msg']='$s_x=="'.$s_x.'" '.
					' $s_expected=="'.$s_expected.'"'.
					"\n GUID='e793d12c-fb9b-40ed-94a3-026131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//--------------------
			$arht_x=array();
			$arht_x[]="";
			$s_x=s_concat_array_of_strings($arht_x);
			$s_expected="";
			if(!sirelLang::str1EqualsStr2($s_x, $s_expected)) {
				$test_case['msg']='$s_x=="'.$s_x.'" '.
					' $s_expected=="'.$s_expected.'"'.
					"\n GUID='2625b82c-be8c-4855-81a3-026131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//--------------------
			$arht_x=array();
			$s_expected="X12ffff42 f";
			$arht_x[]=$s_expected;
			$s_x=s_concat_array_of_strings($arht_x);
			if(!sirelLang::str1EqualsStr2($s_x, $s_expected)) {
				$test_case['msg']='$s_x=="'.$s_x.'" '.
					' $s_expected=="'.$s_expected.'"'.
					"\n GUID='24585093-c343-4259-b4a3-026131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//--------------------
			$arht_x=array();
			$arht_x[]='Welcome to ';
			$arht_x[]='hell !';
			$s_x=s_concat_array_of_strings($arht_x);
			$s_expected='Welcome to hell !';
			if(!sirelLang::str1EqualsStr2($s_x, $s_expected)) {
				$test_case['msg']='$s_x=="'.$s_x.'" '.
					' $s_expected=="'.$s_expected.'"'.
					"\n GUID='b4c5d255-1532-4b34-a5a3-026131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//--------------------
			$arht_x=array();
			$arht_x[]='As nice ';
			$arht_x[]='as ';
			$arht_x[]='it is.';
			$s_x=s_concat_array_of_strings($arht_x);
			$s_expected='As nice as it is.';
			if(!sirelLang::str1EqualsStr2($s_x, $s_expected)) {
				$test_case['msg']='$s_x=="'.$s_x.'" '.
					' $s_expected=="'.$s_expected.'"'.
					"\n GUID='a3833dca-406c-4f0a-b5a3-026131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//--------------------
			$arht_x=array();
			$arht_x[]='Some ';
			$arht_x[]='';
			$arht_x[]='';
			$arht_x[]='empty strings.';
			$s_x=s_concat_array_of_strings($arht_x);
			$s_expected='Some empty strings.';
			if(!sirelLang::str1EqualsStr2($s_x, $s_expected)) {
				$test_case['msg']='$s_x=="'.$s_x.'" '.
					' $s_expected=="'.$s_expected.'"'.
					"\n GUID='1e009581-49b4-4d2b-b3a3-026131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//--------------------
			$arht_x=array();
			$arht_x[]='Some ';
			$arht_x[]=' ';
			$arht_x[]=' ';
			$arht_x[]='spaces.';
			$s_x=s_concat_array_of_strings($arht_x);
			$s_expected='Some   spaces.';
			if(!sirelLang::str1EqualsStr2($s_x, $s_expected)) {
				$test_case['msg']='$s_x=="'.$s_x.'" '.
					' $s_expected=="'.$s_expected.'"'.
					"\n GUID='29190151-e5a4-4cb2-a1a3-026131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='03d2e013-4877-49be-93a3-026131318dd7'");
		} // catch
	} // test_1


	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_core_utilities::test_1();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='6b33c081-ffa5-4daa-83a3-026131318dd7'");
		} // catch
	} // selftest

} // class sirel_test_sirel_core_utilities

//=========================================================================

