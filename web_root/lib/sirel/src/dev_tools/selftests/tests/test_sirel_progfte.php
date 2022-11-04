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

$s_path_lib_sirel=constant('s_path_lib_sirel');
require_once($s_path_lib_sirel.'/src/src/bonnet/sirel_progfte_v0.php');
require_once($s_path_lib_sirel.'/src/src/bonnet/sirel_progfte_v1.php');

class sirel_test_sirel_ProgFTE {

	private static function test_ProgFTE_v0() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_x=array();
			//-------------
			$arht_x['aa']='AAAA';
			$arht_x['bb']='BBBB';
			$s_x=sireProgFTE_v0::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE_v0::ProgFTE2ht($s_x);
			if(count(array_keys($arht_1))!=2) {
				$test_case['msg']='test Err 1a, '.
					"\nGUID='03e13f4e-4370-4db8-951d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['aa']!='AAAA') {
				$test_case['msg']='test Err 1b, '.
					"\nGUID='5dd479c5-d648-4fff-891d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['bb']!='BBBB') {
				$test_case['msg']='test Err 1c, '.
					"\nGUID='6b19a168-8a9c-4123-a41d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='8807b23c-d6f0-48dd-811d-526131318dd7'");
		} // catch
	} // test_ProgFTE_v0

	private static function test_ProgFTE_v0_detection() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_x=array();
			//-------------
			$arht_x['aa']='AAAA';
			$arht_x['bb']='BBBB';
			$s_x=sireProgFTE_v0::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE::ProgFTE2ht($s_x);
			if(count(array_keys($arht_1))!=2) {
				$test_case['msg']='test Err 1a, '.
					"\nGUID='1c95b5d4-839b-46e3-b11d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['aa']!='AAAA') {
				$test_case['msg']='test Err 1b, '.
					"\nGUID='2e9e472b-39e3-4eee-821d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['bb']!='BBBB') {
				$test_case['msg']='test Err 1c, '.
					"\nGUID='b2b3131f-a4b6-4305-a21d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='28dc733d-1f38-426c-a41d-526131318dd7'");
		} // catch
	} // test_ProgFTE_v0_detection

	private static function test_ProgFTE_v1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_x=array();
			$arht_x['aa']='AAAA';
			$arht_x['bb']='BBBB';
			$s_x=sireProgFTE_v1::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE_v1::ProgFTE2ht($s_x);
			$i_0=count(array_keys($arht_1));
			if($i_0!=2) {
				$test_case['msg']='test Err 1a, $i_0=='.$i_0.
					"\n".'$s_x=='.$s_x.
					"\nGUID='18f81d34-3d44-499b-aa1d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['aa']!='AAAA') {
				$test_case['msg']='test Err 1b, '.
					"\nGUID='24b8b254-04d4-4a59-9e1d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['bb']!='BBBB') {
				$test_case['msg']='test Err 1c, '.
					"\nGUID='300bf363-9a5b-4068-9a0d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_x=array();
			$s_x=sireProgFTE_v1::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE_v1::ProgFTE2ht($s_x);
			$i_0=count(array_keys($arht_1));
			if($i_0!=0) {
				$test_case['msg']='test Err 2a, $i_0=='.$i_0.
					"\n".'$s_x=='.$s_x.
					"\nGUID='30964158-f33d-46f7-930d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_x=array();
			$arht_x['c']='';
			$s_x=sireProgFTE_v1::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE_v1::ProgFTE2ht($s_x);
			$i_0=count(array_keys($arht_1));
			if($i_0!=1) {
				$test_case['msg']='test Err 3a, $i_0=='.$i_0.
					"\n".'$s_x=='.$s_x.
					"\nGUID='21d1e21c-4224-4188-830d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['c']!='') {
				$test_case['msg']='test Err 3b, '.
					"\n".'$s_x=='.$s_x.
					"\n".'$arht_1[\'c\']=='.$arht_1['c'].
					"\nGUID='2688e2ee-927d-41b6-b50d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_x=array();
			$arht_x['c']='C';
			$s_x=sireProgFTE_v1::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE_v1::ProgFTE2ht($s_x);
			$i_0=count(array_keys($arht_1));
			if($i_0!=1) {
				$test_case['msg']='test Err 4a, $i_0=='.$i_0.
					"\n".'$s_x=='.$s_x.
					"\nGUID='9ffc95f6-53bb-4714-b40d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['c']!='C') {
				$test_case['msg']='test Err 4b, '.
					"\n".'$s_x=='.$s_x.
					"\n".'$arht_1[\'c\']=='.$arht_1['c'].
					"\nGUID='655fb027-07ee-442d-810d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_x=array();
			$arht_x['']='xx';
			$s_x=sireProgFTE_v1::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE_v1::ProgFTE2ht($s_x);
			$i_0=count(array_keys($arht_1));
			if($i_0!=1) {
				$test_case['msg']='test Err 5a, $i_0=='.$i_0.
					"\n".'$s_x=='.$s_x.
					"\nGUID='cade2f29-4c28-40a4-920d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['']!='xx') {
				$test_case['msg']='test Err 5b, '.
					"\n".'$s_x=='.$s_x.
					"\n".'$arht_1[\'\']=='.$arht_1['c'].
					"\nGUID='4c7b693d-43ed-441c-840d-526131318dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='c266ea4e-0bb9-47c4-a20d-526131318dd7'");
		} // catch
	} // test_ProgFTE_v1


	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_ProgFTE::test_ProgFTE_v0();
			$ar_test_results[]=sirel_test_sirel_ProgFTE::test_ProgFTE_v0_detection();
			$ar_test_results[]=sirel_test_sirel_ProgFTE::test_ProgFTE_v1();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='400232e4-8d53-42e0-b10d-526131318dd7'");
		} // catch
	} // selftest

} // class sirel_test_sirel_ProgFTE

//=========================================================================

