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

class sirel_test_sirel_math_boolean {

//-------------------------------------------------------------------------
	private static function test_conjunction_arht() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_in=array('aa'=>'t','bb'=>True);
			$b_x=sirel_math_boolean::conjunction_arht($arht_in,'aa','bb');
			if($b_x!=True) {
				$test_case['msg']='test 1, $b_x=='.$b_x.
					"\n GUID='c8d1fa1b-134c-416b-a264-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_in=array('aa'=>'t','bb'=>False);
			$b_x=sirel_math_boolean::conjunction_arht($arht_in,'aa','bb');
			if($b_x!=False) {
				$test_case['msg']='test 2, $b_x=='.$b_x.
					"\n GUID='8f65765f-5512-4925-b464-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_in=array('aa'=>'t','bb'=>'f');
			$b_x=sirel_math_boolean::conjunction_arht($arht_in,'aa','bb');
			if($b_x!=False) {
				$test_case['msg']='test 3, $b_x=='.$b_x.
					"\n GUID='0e685d57-fdda-4809-8464-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$arht_in=array('aa'=>'t','bb'=>42); // a nonboolean
				$b_x=sirel_math_boolean::conjunction_arht($arht_in,'aa','bb');
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='test Err1, $b_x=='.$b_x.
					"\n GUID='2f250c4b-1d19-472a-a464-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$arht_in=array('aa'=>'t','bb'=>'X'); // a nonboolean
				$b_x=sirel_math_boolean::conjunction_arht($arht_in,'aa','bb');
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='test Err2, $b_x=='.$b_x.
					"\n GUID='92941124-e262-4daa-a164-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$arht_in=array('bb'=>'t'); // OK
				$b_x=sirel_math_boolean::conjunction_arht($arht_in); // n_of_args<2
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='test Err3, $b_x=='.$b_x.
					"\n GUID='90fbe93a-3648-4110-8164-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='1807c5f3-9a14-4ff2-8164-426131318dd7'");
		} // catch
	} // test_conjunction_arht

//-------------------------------------------------------------------------
	private static function test_disjunction_arht() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//The errorous situations are the same as they are
			// with the conjunction_arht. That's why they are not
			// retested here.

			$arht_in=array('aa'=>'f','bb'=>False);
			$b_x=sirel_math_boolean::disjunction_arht($arht_in,'aa','bb');
			if($b_x!=False) {
				$test_case['msg']='test 1, $b_x=='.$b_x.
					"\n GUID='44be2543-d4be-47c6-a364-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_in=array('aa'=>'t','bb'=>False);
			$b_x=sirel_math_boolean::disjunction_arht($arht_in,'aa','bb');
			if($b_x!=True) {
				$test_case['msg']='test 2, $b_x=='.$b_x.
					"\n GUID='a4503b39-b39d-451c-8154-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_in=array('aa'=>'t','bb'=>'f');
			$b_x=sirel_math_boolean::disjunction_arht($arht_in,'aa','bb');
			if($b_x!=True) {
				$test_case['msg']='test 3, $b_x=='.$b_x.
					"\n GUID='389f5051-d356-456c-8554-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_in=array('aa'=>'t','bb'=>'t');
			$b_x=sirel_math_boolean::disjunction_arht($arht_in,'aa','bb');
			if($b_x!=True) {
				$test_case['msg']='test 4, $b_x=='.$b_x.
					"\n GUID='9a299a45-96d1-4de1-9454-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='3de9b5a3-2810-4ce6-a254-426131318dd7'");
		} // catch
	} // test_disjunction_arht

//-------------------------------------------------------------------------
	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_math_boolean::test_conjunction_arht();
			$ar_test_results[]=sirel_test_sirel_math_boolean::test_disjunction_arht();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='22593fb3-7d00-4aea-bd54-426131318dd7'");
		} // catch
	} // selftest

} // class sirel_test_sirel_math_boolean

//=========================================================================

