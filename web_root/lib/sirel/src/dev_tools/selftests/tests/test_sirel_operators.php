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

function sirel_test_sirel_operators_operfunc_1($i) {
	$i_out=$i+4;
	return $i_out;
} // sirel_test_sirel_operators_operfunc1

function sirel_test_sirel_operators_operfunc_2($i,$ii) {
	$i_out=$i*$ii;
	return $i_out;
} // sirel_test_sirel_operators_operfunc1

function sirel_test_sirel_map_testfunc_1($i,$ii) {
	$i_out=$i+$ii+7;
	return $i_out;
} // sirel_test_sirel_map_testfunc_1

class sirel_test_sirel_operators {


	private static function test_1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$func1=NULL;
			$b_error_detected=False;
			$s_oper_name='sirel_test_sirel_operators_ooo1';
			try {
				$i=44;
				$func1='sirel_test_sirel_operators_operfunc_1';
				sirel_operators::declare_operator($func1,
					$s_oper_name,$i);
			}catch (Exception $err_exception) {
				$b_error_detected=True;
			} // catch
			if($b_error_detected==True) {
				$test_case['msg']='test Err1'.
					"\n GUID='35296127-49ec-42d9-a568-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec($s_oper_name,50);
			if($i_x!=54) {
				$test_case['msg']='test Err2 $i_x=='.$i_x.
					"\n GUID='d6e8f510-3d21-4583-a458-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_oper_name2='sirel_test_sirel_operators_ooo2';
			$func1='sirel_test_sirel_operators_operfunc_2';
			sirel_operators::declare_operator($func1,
				$s_oper_name2,$i,33);
			$i_x=sirel_operators::exec($s_oper_name2,3,5);
			if($i_x!=15) {
				$test_case['msg']='test Err3 $i_x=='.$i_x.
					"\n GUID='7f42db3e-9af6-40a3-b258-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec($s_oper_name,24);
			if($i_x!=28) {
				$test_case['msg']='test Err4 $i_x=='.$i_x.
					"\n GUID='1256e524-dd03-400f-b258-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='4a8fe34d-9bc0-42fd-a158-426131318dd7'");
		} // catch
	} // test_1

	private static function test_2() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$i_x=sirel_operators::exec('+',50,50);
			if($i_x!=100) {
				$test_case['msg']='test Err1 $i_x=='.$i_x.
					"\n GUID='f66a0a53-69ff-4afe-8158-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('+',51.0,51.0);
			if($i_x!=102.0) {
				$test_case['msg']='test Err2 $i_x=='.$i_x.
					"\n GUID='8ce75910-7fe9-4d1d-9158-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('+',52.0,52);
			if($i_x!=104.0) {
				$test_case['msg']='test Err3 $i_x=='.$i_x.
					"\n GUID='364be362-022c-4b92-8458-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('+',53,53.0);
			if($i_x!=106.0) {
				$test_case['msg']='test Err4 $i_x=='.$i_x.
					"\n GUID='3e211337-c37b-4ef2-b458-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if

			//-----
			$i_x=sirel_operators::exec('-',52,50);
			if($i_x!=2) {
				$test_case['msg']='test Err5 $i_x=='.$i_x.
					"\n GUID='36a83151-8cdc-41b6-9258-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('-',53.0,51.0);
			if($i_x!=2.0) {
				$test_case['msg']='test Err6 $i_x=='.$i_x.
					"\n GUID='143d17b4-e8cd-4d89-a358-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('-',54.0,52);
			if($i_x!=2.0) {
				$test_case['msg']='test Err7 $i_x=='.$i_x.
					"\n GUID='2a962fef-6ced-449f-b258-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('-',55,53.0);
			if($i_x!=2.0) {
				$test_case['msg']='test Err8 $i_x=='.$i_x.
					"\n GUID='9a92d516-0d87-4ce9-b258-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if

			//-----
			$i_x=sirel_operators::exec('*',2,3);
			if($i_x!=6) {
				$test_case['msg']='test Err9 $i_x=='.$i_x.
					"\n GUID='e436515c-5e8d-4a01-b448-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('*',2.0,3.0);
			if($i_x!=6.0) {
				$test_case['msg']='test Err10 $i_x=='.$i_x.
					"\n GUID='77f3402b-6ef0-4d4b-a548-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('*',2.0,3);
			if($i_x!=6.0) {
				$test_case['msg']='test Err11 $i_x=='.$i_x.
					"\n GUID='9506e298-6a51-4143-b377-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('*',2,3.0);
			if($i_x!=6.0) {
				$test_case['msg']='test Err12 $i_x=='.$i_x.
					"\n GUID='9a5e4402-4db2-414c-8577-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if

			//-----
			$i_x=sirel_operators::exec('/',10,2);
			if($i_x!=5) {
				$test_case['msg']='test Err13 $i_x=='.$i_x.
					"\n GUID='bccbee24-0cdd-49eb-8477-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('/',10.0,2.0);
			if($i_x!=5.0) {
				$test_case['msg']='test Err14 $i_x=='.$i_x.
					"\n GUID='61de50fe-fccd-455a-b577-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('/',10.0,2);
			if($i_x!=5.0) {
				$test_case['msg']='test Err15 $i_x=='.$i_x.
					"\n GUID='741daba2-a956-422b-9477-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('/',10,2.0);
			if($i_x!=5.0) {
				$test_case['msg']='test Err16 $i_x=='.$i_x.
					"\n GUID='3d046015-ac9e-4862-b577-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('/',7,2);
			if($i_x!=3.5) {
				$test_case['msg']='test Err17 $i_x=='.$i_x.
					"\n GUID='913b8426-ebf2-4485-9277-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if

			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='cd8bb73c-565f-4512-b577-426131318dd7'");
		} // catch
	} // test_2


	private static function test_3() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ar=array(50,50);
			$i_x=sirel_operators::exec_ar('+',$ar);
			if($i_x!=100) {
				$test_case['msg']='test Err1 $i_x=='.$i_x.
					"\n GUID='d64dc92b-dea5-465a-8377-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$b_operator_is_defined=sirel_operators::b_operator_defined_ar('+',$ar);
			if($b_operator_is_defined==False) {
				$test_case['msg']='test Err2 $b=='.$b_operator_is_defined.
					"\n GUID='1f50c610-6078-4061-a577-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$b_operator_is_defined=sirel_operators::b_operator_defined_ar('+====+XXThisPossiblYCANnotBe9',
				$ar);
			if($b_operator_is_defined) {
				$test_case['msg']='test Err3 $b=='.$b_operator_is_defined.
					"\n GUID='7120556c-2fa5-4c0a-b267-426131318dd7'";
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
				" GUID='542853e5-8820-478d-b267-426131318dd7'");
		} // catch
	} // test_3

	private static function test_sirel_map_1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ar_1=array(50,42);
			$ar_results=func_sirel_map('+',$ar_1,3);
			$i_n=count($ar_results);
			if($i_n!=2) {
				$test_case['msg']='test Err1 $i_n=='.$i_n.
					"\n GUID='c139df3e-4abb-4661-a567-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[0];
			if($x!=53) {
				$test_case['msg']='test Err2 $x=='.$x.
					"\n GUID='fb2c664f-dd91-4f7a-9567-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[1];
			if($x!=45) {
				$test_case['msg']='test Err3 $x=='.$x.
					"\n GUID='5812e632-c79e-482e-b267-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_1=array(50,42);
			$ar_2=array(5,66);
			$ar_results=func_sirel_map('+',$ar_1,$ar_2);
			$i_n=count($ar_results);
			if($i_n!=2) {
				$test_case['msg']='test Err4 $i_n=='.$i_n.
					"\n GUID='50be425b-5f63-4db9-9467-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[0];
			if($x!=55) {
				$test_case['msg']='test Err5 $x=='.$x.
					"\n GUID='4447bf1b-3bfe-415d-b467-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[1];
			if($x!=108) {
				$test_case['msg']='test Err6 $x=='.$x.
					"\n GUID='83e3ce4f-2abc-4954-8467-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_1=array(2,5);
			$ar_2=array(3,7);
			$ar_results=func_sirel_map('sirel_test_sirel_map_testfunc_1',
				$ar_1,$ar_2);
			$i_n=count($ar_results);
			if($i_n!=2) {
				$test_case['msg']='test Err7 $i_n=='.$i_n.
					"\n GUID='40e3a091-1ac0-49f0-a167-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[0];
			if($x!=12) {
				$test_case['msg']='test Err8 $x=='.$x.
					"\n GUID='018a4816-4e24-4c96-b257-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[1];
			if($x!=19) {
				$test_case['msg']='test Err9 $x=='.$x.
					"\n GUID='8baac143-5cb7-456e-b557-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_1=array(2,5);
			$ar_2=array(3,7);
			$ar_of_ars=array($ar_1,$ar_2);
			$ar_results=func_sirel_map_ar('sirel_test_sirel_map_testfunc_1',
				$ar_of_ars);
			$i_n=count($ar_results);
			if($i_n!=2) {
				$test_case['msg']='test Err10 $i_n=='.$i_n.
					"\n GUID='784f261d-a3bf-418b-8857-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[0];
			if($x!=12) {
				$test_case['msg']='test Err11 $x=='.$x.
					"\n GUID='f909a332-3260-48ae-a557-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[1];
			if($x!=19) {
				$test_case['msg']='test Err12 $x=='.$x.
					"\n GUID='4484deed-1f1a-4443-a657-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='26d1f1e1-7597-4c95-8357-426131318dd7'");
		} // catch
	} // test_sirel_map_1

	private static function test_sirel_map_htindexing() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ar_1=array('aa'=>4,'bb'=>7);
			$ar_results=func_sirel_map('+',$ar_1,3);
			$i_n=count($ar_results);
			if($i_n!=2) {
				$test_case['msg']='test Err1 $i_n=='.$i_n.
					"\n GUID='3f993823-2ca4-44c5-b757-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results['bb'];
			if($x!=10) {
				$test_case['msg']='test Err2 $x=='.$x.
					"\n GUID='1c7c7036-b5dd-4447-8257-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results['aa'];
			if($x!=7) {
				$test_case['msg']='test Err3 $x=='.$x.
					"\n GUID='26f99591-862b-4d13-9457-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_1=array('foo'=>42,'bar'=>71);
			$ar_2=array('foo'=>3,'bar'=>33);
			$ar_results=func_sirel_map('+',$ar_1,$ar_2);
			$i_n=count($ar_results);
			if($i_n!=2) {
				$test_case['msg']='test Err4 $i_n=='.$i_n.
					"\n GUID='8f49e540-530a-4cd6-9157-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results['foo'];
			if($x!=45) {
				$test_case['msg']='test Err5 $x=='.$x.
					"\n GUID='bf61383f-1631-4703-a447-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results['bar'];
			if($x!=104) {
				$test_case['msg']='test Err6 $x=='.$x.
					"\n GUID='fa079dd5-3f6c-45fc-8247-426131318dd7'";
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
				" GUID='f6b1c725-9179-4be3-8147-426131318dd7'");
		} // catch
	} // test_sirel_map_htindexing



	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_operators::test_1();
			$ar_test_results[]=sirel_test_sirel_operators::test_2();
			$ar_test_results[]=sirel_test_sirel_operators::test_3();
			$ar_test_results[]=sirel_test_sirel_operators::test_sirel_map_1();
			$ar_test_results[]=sirel_test_sirel_operators::test_sirel_map_htindexing();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='5cbbfd2d-5114-4a8e-b247-426131318dd7'");
		} // catch
	} // selftest

} // class sirel_test_sirel_operators

//=========================================================================

