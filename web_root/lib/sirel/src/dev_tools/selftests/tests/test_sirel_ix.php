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

class sirel_test_sirel_ix {

//-------------------------------------------------------------------------

	private static function test_arht_has_keys() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_in=array('aa'=>'t','bb'=>True);
			$b_x=sirel_ix::arht_has_keys($arht_in,'aa');
			if($b_x!=True) {
				$test_case['msg']='test 1, $b_x=='.$b_x.
					"\n GUID='63585615-f571-43ea-a124-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------
			$arht_in=array('aa'=>'t','bb'=>True);
			$b_x=sirel_ix::arht_has_keys($arht_in,'cc');
			if($b_x!=False) {
				$test_case['msg']='test 2, $b_x=='.$b_x.
					"\n GUID='10595463-89f2-44a2-bb44-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------
			$arht_in=array('aa'=>'t','bb'=>True);
			$b_x=sirel_ix::arht_has_keys($arht_in,'aa','bb');
			if($b_x!=True) {
				$test_case['msg']='test 3, $b_x=='.$b_x.
					"\n GUID='818dbdbe-645d-48c1-a034-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------
			$arht_in=array('aa'=>'t','bb'=>True);
			$b_x=sirel_ix::arht_has_keys($arht_in,'aa','cc');
			if($b_x!=False) {
				$test_case['msg']='test 4, $b_x=='.$b_x.
					"\n GUID='50f64011-8b26-4eb0-8254-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='5a3cbc73-3ec8-4be8-a034-226131318dd7'");
		} // catch
	} // test_arht_has_keys

//-------------------------------------------------------------------------
	private static function test_assert_arht_keys() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$b_x=NULL;
			$b_error_detected=False;
			try {
				$arht_in=array('aa'=>'t','bb'=>42);
				$b_x=sirel_ix::assert_arht_keys($arht_in,'aa','bb');
			}catch (Exception $err_exception) {
				$b_error_detected=True;
			} // catch
			if($b_error_detected==True) {
				$test_case['msg']='test Err1, $b_x=='.$b_x.
					"\n GUID='441b4cbf-9250-45f2-bca3-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_detected=False;
			try {
				$arht_in=array('aa'=>'t','bb'=>42);
				$b_x=sirel_ix::assert_arht_keys($arht_in,'aa','cc');
			}catch (Exception $err_exception) {
				$b_error_detected=True;
			} // catch
			if($b_error_detected==False) {
				$test_case['msg']='test Err2, $b_x=='.$b_x.
					"\n GUID='45e41d74-16a6-4362-b043-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='55f67695-949d-44f8-92d3-226131318dd7'");
		} // catch
	} // test_assert_arht_keys

//-------------------------------------------------------------------------
	private static function test_arht_of_arht_2_arht_of_elemcounts() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ardim1=array();
			array_push($ardim1, array('x','x'));
			array_push($ardim1, array());
			array_push($ardim1, array('x','x','xx'));
			$arht_test=sirel_ix::arht_of_arht_2_arht_of_elemcounts($ardim1);
			$i=count($arht_test);
			if($i!=3) {
				$test_case['msg']='test Err1, $i=='.$i.
					"\n GUID='712cf49d-9616-4022-a133-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i=$arht_test[0];
			if($i!=2) {
				$test_case['msg']='test Err2, $i=='.$i.
					"\n GUID='38d82532-272e-4ecf-a133-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i=$arht_test[1];
			if($i!=0) {
				$test_case['msg']='test Err3, $i=='.$i.
					"\n GUID='3956d214-5b51-4d58-b723-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i=$arht_test[2];
			if($i!=3) {
				$test_case['msg']='test Err4, $i=='.$i.
					"\n GUID='5b3debd6-2024-4d79-be23-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ardim1=array();
			$arht_test=sirel_ix::arht_of_arht_2_arht_of_elemcounts($ardim1);
			$i=count($arht_test);
			if($i!=0) {
				$test_case['msg']='test Err5, $i=='.$i.
					"\n GUID='d33dc178-3273-4722-8ac3-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ardim1=array('foo'=>array("x","xx"),"gee"=>array());
			$arht_test=sirel_ix::arht_of_arht_2_arht_of_elemcounts($ardim1);
			$i=count($arht_test);
			if($i!=2) {
				$test_case['msg']='test Err6, $i=='.$i.
					"\n GUID='2cb8aa73-2c91-49f4-9223-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i=$arht_test['foo'];
			if($i!=2) {
				$test_case['msg']='test Err7, $i=='.$i.
					"\n GUID='74d2eb88-f41f-4364-8ed3-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i=$arht_test['gee'];
			if($i!=0) {
				$test_case['msg']='test Err8, $i=='.$i.
					"\n GUID='30d7e3b3-53d4-4559-b833-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='41aedc54-4fb6-44cf-a842-226131318dd7'");
		} // catch
	} // test_arht_of_arht_2_arht_of_elemcounts

//-------------------------------------------------------------------------
	private static function test_arht_swap_keys_and_values() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_1=array('aa'=>42,'bb'=>54);
			$arht_2=sirel_ix::arht_swap_keys_and_values($arht_1);
			$i=count($arht_2);
			if($i!=2) {
				$test_case['msg']='test Err1, $i=='.$i.
					"\n GUID='452567da-21b1-4d88-9a22-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$arht_2[42];
			if($x!='aa') {
				$test_case['msg']='test Err2, $x=='.$x.
					"\n GUID='3ea2ff35-31ec-4088-8132-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$arht_2[54];
			if($x!='bb') {
				$test_case['msg']='test Err3, $x=='.$x.
					"\n GUID='5c5ddde1-d7f5-4620-9422-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='10a16455-7452-4f42-8f42-226131318dd7'");
		} // catch
	} // test_arht_swap_keys_and_values

//-------------------------------------------------------------------------
	private static function test_arht_to_s() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_1=array('aa'=>42,'bb'=>54.5);
			$s_expected='sirelTD_is_mbstring aa sirelTD_is_int 42'."\n".
				'sirelTD_is_mbstring bb sirelTD_is_float 54.5'."\n";
			$s_x=sirel_ix::arht_to_s($arht_1, 'debug_1');
			$b_ok=sirelLang::str1EqualsStr2($s_x, $s_expected);
			if($b_ok!=True) {
				$test_case['msg']='test Err1, $i=='.$i.
					"\n GUID='4fdb43d2-419e-412f-ab32-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='1103a365-a153-458d-a142-226131318dd7'");
		} // catch
	} // test_arht_to_s

//-------------------------------------------------------------------------

	private static function test_1_for_JumpGUID_presentation_demo() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$i_meaning_of_life=42; // some test code
			$b_test_failed=($i_meaning_of_life!=43);
			if($b_test_failed==True) {
				$test_case['msg']='test 1, '. // test # for humans to read
					'$i_meaning_of_life=='.$i_meaning_of_life.
					"\n GUID='34466b55-db2b-4514-8622-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------
			$i_space_odyssey=2001; // by Arthur C. Clarke
			$b_test_failed=($i_space_odyssey!=2002);
			if($b_test_failed==True) {
				$test_case['msg']='test 2, '. // test # for humans to read
					'$i_space_odyssey=='.$i_space_odyssey.
					"\n GUID='18f40234-0853-43ee-b422-226131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='1598b5d2-c4cc-4a40-8e12-226131318dd7'");
		} // catch
	} // test_1_for_JumpGUID_presentation_demo


//-------------------------------------------------------------------------
	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_ix::test_arht_has_keys();
			$ar_test_results[]=sirel_test_sirel_ix::test_assert_arht_keys();
			$ar_test_results[]=sirel_test_sirel_ix::test_arht_of_arht_2_arht_of_elemcounts();
			$ar_test_results[]=sirel_test_sirel_ix::test_arht_swap_keys_and_values();
			$ar_test_results[]=sirel_test_sirel_ix::test_arht_to_s();
			//$ar_test_results[]=sirel_test_sirel_ix::test_1_for_JumpGUID_presentation_demo();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='873afcd9-b28f-4861-9c81-226131318dd7'");
		} // catch
	} // selftest

//-------------------------------------------------------------------------
} // class sirel_test_sirel_ix

//=========================================================================

