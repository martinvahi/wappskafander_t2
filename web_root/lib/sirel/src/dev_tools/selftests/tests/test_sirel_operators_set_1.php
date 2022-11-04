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
//-------------------------------------------------------------------------


//-------------------------------------------------------------------------
class sirel_test_sirel_operators_set_1 {

//-------------------------------------------------------------------------
	private static function test_percentage_a_is_of_b() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_oper_name='percentage_a_is_of_b';
			$op=sirel_operators::exec($s_oper_name,32,64);
			$fd_x=$op->value;
			if($fd_x!=50) {
				$test_case['msg']='test Err1 $fd_x=='.$fd_x.
					"\n GUID='567ae333-84a8-4ff0-8727-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$sb=$op->sb_failure;
			if($sb!='f') {
				$test_case['msg']='test Err1a $sb=='.$sb.
					"\n GUID='8a570ff6-931b-4353-a5c7-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_oper_name='percentage_a_is_of_b';
			$op=sirel_operators::exec($s_oper_name,7.056,56);
			$fd_x=$op->value;
			if($fd_x!=12.6) {
				$test_case['msg']='test Err2 $fd_x=='.$fd_x.
					"\n GUID='e4139786-dc81-4175-8147-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$sb=$op->sb_failure;
			if($sb!='f') {
				$test_case['msg']='test Err2a $sb=='.$sb.
					"\n GUID='43c63f05-3613-43d7-b856-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_oper_name='percentage_a_is_of_b';
			$op=sirel_operators::exec($s_oper_name,7.056,0);
			$sb=$op->sb_failure;
			if($sb!='t') {
				$test_case['msg']='test Err3 $sb=='.$sb.
					"\n GUID='b38ab314-4a84-4809-a116-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='14702da5-9f96-427a-af46-526131318dd7'");
		} // catch
	} // test_percentage_a_is_of_b

//-------------------------------------------------------------------------
	private static function test_to_fd() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$fd_x=sirel_operators::exec('to_fd','7')+2;
			if($fd_x!=9.0) {
				$test_case['msg']='test Err1 $fd_x=='.$fd_x.
					"\n GUID='5009fc31-edf5-4fd2-8556-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$fd_x=sirel_operators::exec('to_fd','23.7')+2;
			if($fd_x!=25.7) {
				$test_case['msg']='test Err2 $fd_x=='.$fd_x.
					"\n GUID='2c399054-7060-46d8-9c36-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$fd_x=sirel_operators::exec('to_fd',21.1)+2;
			if($fd_x!=23.1) {
				$test_case['msg']='test Err3 $fd_x=='.$fd_x.
					"\n GUID='36ef1e41-b362-4e47-8e56-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$fd_x=sirel_operators::exec('to_fd',41)+2;
			if($fd_x!=43.0) {
				$test_case['msg']='test Err4 $fd_x=='.$fd_x.
					"\n GUID='2de628b2-db7c-4c49-bc56-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='2455d5b6-cd49-49c4-9256-526131318dd7'");
		} // catch
	} // test_to_fd

//-------------------------------------------------------------------------
	private static function test_to_fd_in_map() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ar=array('42',55,3.3);
			$ar_x=func_sirel_map('to_fd',$ar);
			//-----
			$fd_x=$ar_x[0]+4;
			if($fd_x!=46) {
				$test_case['msg']='test Err1 $fd_x=='.$fd_x.
					"\n GUID='8a7481f9-8aa3-4e9f-a736-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$fd_x=$ar_x[1]+7.1;
			if($fd_x!=62.1) {
				$test_case['msg']='test Err2 $fd_x=='.$fd_x.
					"\n GUID='8177ce2f-9794-4153-8746-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$fd_x=$ar_x[2]+2;
			if($fd_x!=5.3) {
				$test_case['msg']='test Err3 $fd_x=='.$fd_x.
					"\n GUID='3d06cfd4-00b1-41a4-8016-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='320add92-85fd-49ab-bd56-526131318dd7'");
		} // catch
	} // test_to_fd_in_map


//-------------------------------------------------------------------------
	private static function test_sirelOP_round_with_sb_failure_handling_t1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_oper_name='sirelOP_round_with_sb_failure_handling_t1';
			$op=new sirelOP();
			$op->sb_failure='f';
			$op->value=7.5462;
			$op_x=sirel_operators::exec($s_oper_name,$op,1);
			$fd_x=$op_x->value;
			if($fd_x!=7.5) {
				$test_case['msg']='test Err1 $fd_x=='.$fd_x.
					"\n GUID='1b58ca61-e34f-4a5c-a145-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$op_x=sirel_operators::exec($s_oper_name,$op,2);
			$fd_x=$op_x->value;
			if($fd_x!=7.55) {
				$test_case['msg']='test Err2 $fd_x=='.$fd_x.
					"\n GUID='37366254-c46a-4b1f-8155-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$op_x=sirel_operators::exec($s_oper_name,$op,0);
			$fd_x=$op_x->value;
			if($fd_x!=8.0) {
				$test_case['msg']='test Err3 $fd_x=='.$fd_x.
					"\n GUID='f487d180-e5d7-4346-b275-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$op_x=sirel_operators::exec($s_oper_name,$op,3);
			$fd_x=$op_x->value;
			if($fd_x!=7.546) {
				$test_case['msg']='test Err4 $fd_x=='.$fd_x.
					"\n GUID='aa21f1c5-22a5-480f-a925-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='22063894-1a04-4bf4-b255-526131318dd7'");
		} // catch
	} // test_sirelOP_round_with_sb_failure_handling_t1

//-------------------------------------------------------------------------
	private static function test_replace_by_regex_t1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_oper_name='replace_by_regex_t1';
			$s_regex='[b]{2}';
			$s_new='W';
			$s_hay='ybbaaa';
			$s_x=sirel_operators::exec($s_oper_name,$s_regex,$s_new,$s_hay);
			if($s_x!='yWaaa') {
				$test_case['msg']='test Err1 $s_x=='.$s_x.
					"\n GUID='1792bc8e-80e6-4e4e-8d25-526131318dd7'";
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
				" GUID='a279db84-ee79-4d98-a825-526131318dd7'");
		} // catch
	} // test_replace_by_regex_t1

//-------------------------------------------------------------------------
	private static function test_sirelOP_fd_to_s_t1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_oper_name='sirelOP_fd_to_s_t1';
			$op=new sirelOP();
			$op->value=2.47;
			$s_new_dot='W';
			$s_if_failure='ehee';
			$s_x=sirel_operators::exec($s_oper_name,$op,
				2,$s_if_failure,$s_new_dot);
			if($s_x!='ehee') {
				$test_case['msg']='test Err1 $s_x=='.$s_x.
					"\n GUID='27be8675-9032-4b64-a225-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$op->sb_failure='f';
			$s_x=sirel_operators::exec($s_oper_name,$op,
				2,$s_if_failure,$s_new_dot);
			if($s_x!='2W47') {
				$test_case['msg']='test Err2 $s_x=='.$s_x.
					"\n GUID='62c8c8b6-00d3-446b-9115-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$op->sb_failure='f';
			$s_x=sirel_operators::exec($s_oper_name,$op,
				1,$s_if_failure,$s_new_dot);
			if($s_x!='2W5') {
				$test_case['msg']='test Err3 $s_x=='.$s_x.
					"\n GUID='4347c0c1-8409-4634-b725-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='f7292da3-5b06-4848-bc34-526131318dd7'");
		} // catch
	} // test_sirelOP_fd_to_s_t1

//-------------------------------------------------------------------------
	private static function test_str_reverse() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_pile='Abc';
			$s_x=sirel_operators::exec('str_reverse',$s_pile);
			if($s_x!='cbA') {
				$test_case['msg']='test Err1 $s_x=='.$s_x.
					"\n GUID='2c7bb103-969c-404a-9e14-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_pile='';
			$s_x=sirel_operators::exec('str_reverse',$s_pile);
			if($s_x!='') {
				$test_case['msg']='test Err2 $s_x=='.$s_x.
					"\n GUID='ac8e2792-65c7-4804-bc54-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_pile='X';
			$s_x=sirel_operators::exec('str_reverse',$s_pile);
			if($s_x!='X') {
				$test_case['msg']='test Err3 $s_x=='.$s_x.
					"\n GUID='fb282631-3784-4a90-90e4-526131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='a410eb90-37b8-43ba-a934-526131318dd7'");
		} // catch
	} // test_str_reverse

//-------------------------------------------------------------------------
	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_percentage_a_is_of_b();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_to_fd();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_to_fd_in_map();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_sirelOP_round_with_sb_failure_handling_t1();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_replace_by_regex_t1();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_sirelOP_fd_to_s_t1();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_str_reverse();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='6f0bb14b-f6b8-4f09-b844-526131318dd7'");
		} // catch
	} // selftest

} // class sirel_test_sirel_operators_set_1

//=========================================================================

