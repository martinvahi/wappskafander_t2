<?php
//=========================================================================
// Copyright (c) 2009, martin.vahi@softf1.com that has an
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

//-------------------------------------------------------------------------

class sirel_test_sirel_lang {

//-------------------------------------------------------------------------

	private static function selftest_str1ContainsStr2() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$str1='Hi there!';
			$str2='Hi';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='556f7b51-0355-4596-aad3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='Humba-Mumba';
			$str2='a';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='5a08e7a3-3afa-4104-8dd3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='VirtualMachine';
			$str2='VirtualMachine';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='fd4e7717-c95a-43cf-b4d3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='MoreThanZero';
			$str2='';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='2fc30084-a1d0-48db-afd3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='';
			$str2='';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='3d11ea5a-84f8-4b56-b5d3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='Test for multibyte characters: жউᚸฌ╛ሐઆŏõäöüÕÄÖÜ';
			$str2='આ';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='43516024-a3f1-4a80-b2c3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='haunted house';
			$str2='A ghost';
			if(sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is seen in the '.
					'$str1=="'.$str1.'".'.
					"\n GUID='11b0e013-0cbb-48c6-95c3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='0373fed2-66ca-4221-a1c3-426131318dd7'");
		} // catch
	} // selftest_str1ContainsStr2

//-------------------------------------------------------------------------

	private static function selftest_str2boolean() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s='t';
			$b=sirelLang::str2boolean($s);
			if($b!==True) {
				$test_case['msg']='$s=="'.$s.'".'.
					"\n GUID='3bef7c9b-5ba4-4c60-83c3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='tRuE';
			$b=sirelLang::str2boolean($s);
			if($b!==True) {
				$test_case['msg']='$s=="'.$s.'".'.
					"\n GUID='c09e203e-e752-4583-83c3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='f';
			$b=sirelLang::str2boolean($s);
			if($b!==False) {
				$test_case['msg']='$s=="'.$s.'".'.
					"\n GUID='56cd5c62-4e10-4d15-89c3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='somethingCrazy1';
			$b_throws=False;
			try {
				$b=sirelLang::str2boolean($s);
			}catch (Exception $err_exception) {
				$b_throws=True;
			} // catch
			if($b_throws!==True) {
				$test_case['msg']='$s=="'.$s.'".'.
					"\n GUID='2f79bdb3-341b-4a5f-b1c3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='somethingCrazy2 with spaces';
			$b_throws=False;
			try {
				$b=sirelLang::str2boolean($s);
			}catch (Exception $err_exception) {
				$b_throws=True;
			} // catch
			if($b_throws!==True) {
				$test_case['msg']='$s=="'.$s.'".'.
					"\n GUID='ff85013e-65f0-4723-a1b3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='7184392a-b78f-4236-92b3-426131318dd7'");
		} // catch
	} // selftest_str2boolean

//-------------------------------------------------------------------------

	private static function selftest_generateMissingNeedlestring_t2() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$haystack='44x';
			$s_start='ZZ';
			$s_middle='|';
			$s_end='<';
			$s_expected=$s_start.$s_end;
			$s_actual=sirelLang::generateMissingNeedlestring_t2($haystack,
				$s_start,$s_middle,$s_end);
			if(!sirelLang::str1EqualsStr2($s_expected, $s_actual)) {
				$test_case['msg']='$s_expected=="'.$s_expected.'"  '.
					'$s_actual=="'.$s_actual.'"'.
					"\n GUID='84576528-72c8-444e-95b3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$haystack='ZZ<';
			$s_start='ZZ';
			$s_middle='|';
			$s_end='<';
			$s_expected='ZZ|<';
			$s_actual=sirelLang::generateMissingNeedlestring_t2($haystack,
				$s_start,$s_middle,$s_end);
			if(!sirelLang::str1EqualsStr2($s_expected, $s_actual)) {
				$test_case['msg']='$s_expected=="'.$s_expected.'"  '.
					'$s_actual=="'.$s_actual.'"'.
					"\n GUID='5146edb1-0038-4eb0-85b3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$haystack='ZZ<ZZ|<';
			$s_start='ZZ';
			$s_middle='|';
			$s_end='<';
			$s_expected='ZZ||<';
			$s_actual=sirelLang::generateMissingNeedlestring_t2($haystack,
				$s_start,$s_middle,$s_end);
			if(!sirelLang::str1EqualsStr2($s_expected, $s_actual)) {
				$test_case['msg']='$s_expected=="'.$s_expected.'"  '.
					'$s_actual=="'.$s_actual.'"'.
					"\n GUID='3d7e3c22-a9d4-4ba9-88b3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='40d45221-f3c1-4ca5-a1b3-426131318dd7'");
		} // catch
	} // selftest_generateMissingNeedlestring_t2

//-------------------------------------------------------------------------

	private static function selftest_str2float() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$x=sirelLang::str2float('  ');
			if($x->a_==False) {
				$test_case['msg']='spaces'.
					"\n GUID='2a315450-2eb0-44ae-a3a3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('');
			if($x->a_==False) {
				$test_case['msg']='an empty string'.
					"\n GUID='61a89f3c-578a-4c3a-84a3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' 5.5 ');
			if($x->a_==True) {
				$test_case['msg']='5.5 is OK by spec, but considered invalid.'.
					"\n GUID='b92f2f35-3603-4484-a4a3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=(5.5)) {
				$test_case['msg']='$x->b_=='.$x->b_.' != (5.5)'.
					"\n GUID='42674471-e54a-4069-93a3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' 5,5 ');
			if($x->a_==False) {
				$test_case['msg']='5,5 is NOT OK by spec, '.
					'but it was considered valid.'.
					"\n GUID='11fcc1c1-89a8-4509-a4a3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' 4.3 ');
			if($x->b_!=4.3) {
				$test_case['msg']='4.3'.
					"\n GUID='79600c54-03b2-42db-92a3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' -4.4 ');
			if($x->a_==True) {
				$test_case['msg']='-4.4 is OK by spec, but considered invalid.'.
					"\n GUID='a2209c4d-8615-4797-b3a3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=(-4.4)) {
				$test_case['msg']='$x->b_=='.$x->b_.' != (-4.4)'.
					"\n GUID='7dd75b16-03e1-4565-9593-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('6'); // An integer.
			if($x->a_==True) {
				$test_case['msg']='6 is OK by spec, but considered invalid.'.
					"\n GUID='4a384617-624c-417a-a493-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=6) {
				$test_case['msg']='$x->b_=='.$x->b_.' != 6'.
					"\n GUID='24297119-d7b1-4e6b-8393-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-7');
			if($x->a_==True) {
				$test_case['msg']='-7 is OK by spec, but considered invalid.'.
					"\n GUID='8c4e349b-200a-44a5-9293-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=(-7)) {
				$test_case['msg']='$x->b_=='.$x->b_.' != (-7)'.
					"\n GUID='c6e95711-2665-4859-8193-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-f8');
			if($x->a_==False) {
				$test_case['msg']='-f8'.
					"\n GUID='126ff501-c45d-4854-a293-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-');
			if($x->a_==False) {
				$test_case['msg']='-'.
					"\n GUID='4bec3953-c612-4e70-8283-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('--');
			if($x->a_==False) {
				$test_case['msg']='--'.
					"\n GUID='90a63d3b-598e-47d5-b383-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('1-');
			if($x->a_==False) {
				$test_case['msg']='1-'.
					"\n GUID='e545503a-0d58-46d4-8283-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-0');
			if($x->a_==True) {
				$test_case['msg']='1-'.
					"\n GUID='bbe2c93e-2af4-4aab-b183-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=0) {
				$test_case['msg']='$x->b_=='.$x->b_.' != 0'.
					"\n GUID='16a3d25c-d7bb-4fcf-9483-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('0');
			if($x->a_==True) {
				$test_case['msg']='1-'.
					"\n GUID='99b12eff-202b-4155-9583-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=0) {
				$test_case['msg']='$x->b_=='.$x->b_.' != 0'.
					"\n GUID='824df15f-8815-49c6-ab73-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('1..1');
			if($x->a_==False) {
				$test_case['msg']='1..1'.
					"\n GUID='28b41844-93bf-45dc-8573-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('1.2.');
			if($x->a_==False) {
				$test_case['msg']='1.2.'.
					"\n GUID='93af8f81-3a27-4110-8373-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='756d1b15-a488-410e-9273-426131318dd7'");
		} // catch
	} // selftest_str2float

//-------------------------------------------------------------------------

	private static function selftest_mb_str2regexstr() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s='.';
			$s_expected='[.]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='41617d5c-8ed1-4e46-8273-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='$';
			$s_expected='[$]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='d0db7810-569f-44d6-b2d2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='^';
			$s_expected='[\\^]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='f17ff125-bdcf-43ab-a4d2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='(';
			$s_expected='[(]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='1f1fa695-3bdf-451f-a7c2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s=')';
			$s_expected='[)]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='197ae7d2-a777-44c5-b2c2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='[';
			$s_expected='[\[]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='1f1f8620-f1ea-4b31-b1c2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s=']';
			$s_expected='[\]]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='5bf54292-8856-4f97-b9c2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='16d9efb5-42a4-45fd-a1c2-426131318dd7'");
		} // catch
	} // selftest_mb_str2regexstr

//-------------------------------------------------------------------------

	private static function selftest_mb_stdlib() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$haystack='hi-hi-hi';
			$needle='hi';
			$s0=mb_ereg_replace($needle,'so', $haystack);
			if(!sirelLang::str1EqualsStr2($s0,'so-so-so')) {
				$test_case['msg']='test1 $s0=='.$s0.
					"\n GUID='81f575c3-50cb-42c5-93b2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(mb_substr_count('haystack', 'needle')!=0) {
				$test_case['msg']='test2 mb_substr_count'.
					"\n GUID='1e5f5621-5b42-4027-b1b2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(mb_substr_count('he-he-ho', 'he')!=2) {
				$test_case['msg']='test3 mb_substr_count'.
					"\n GUID='1c5b62e2-6560-4d4f-83b2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(mb_substr_count('1', '1')!=1) {
				$test_case['msg']='test4 mb_substr_count'.
					"\n GUID='25ab9348-a634-4069-b1b2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='e9122630-f332-4b8d-95b2-426131318dd7'");
		} // catch
	} // selftest_mb_stdlib

//-------------------------------------------------------------------------

	private static function selftest_str2array_of_characters() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay='ABC';
			$ar=sirelLang::str2array_of_characters($s_hay);
			$x=count($ar);
			if($x!==3) {
				$test_case['msg']='test 1, $s_hay=="'.$s_hay.
					'", $x=='.$x.
					"\n GUID='2845d815-fe8d-402c-bab2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str1EqualsStr2($ar[0], 'A');
			if($x!==True) {
				$test_case['msg']='test 2, $s_hay=="'.$s_hay.
					'", $x=='.$x.'  $ar[0]=='.$ar[0].
					"\n GUID='428bf986-4e2f-45dd-b2a2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str1EqualsStr2($ar[1], 'B');
			if($x!==True) {
				$test_case['msg']='test 3, $s_hay=="'.$s_hay.
					'", $x=='.$x.'  $ar[1]=='.$ar[1].
					"\n GUID='33ef145c-1c5b-47ec-83a2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str1EqualsStr2($ar[2], 'C');
			if($x!==True) {
				$test_case['msg']='test 4, $s_hay=="'.$s_hay.
					'", $x=='.$x.'  $ar[2]=='.$ar[2].
					"\n GUID='154d2025-dc5d-4ee4-a5a2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_hay='';
			$ar=sirelLang::str2array_of_characters($s_hay);
			$x=count($ar);
			if($x!==0) {
				$test_case['msg']='test 5, $s_hay=="'.$s_hay.
					'", $x=='.$x.
					"\n GUID='7a113a58-32be-4754-b5a2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='2aa1a802-78e9-40c3-b4a2-426131318dd7'");
		} // catch
	} // selftest_str2array_of_characters

//-------------------------------------------------------------------------

	private static function selftest_get_equivalent_or_store() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$p1=new sirelPair(1,2);
			$p2=new sirelPair(2,3);
			$arht_storage=array();
			$x=sirelLang::get_equivalent_or_store($p1,$arht_storage);
			$x=sirelLang::get_equivalent_or_store($p2,$arht_storage);
			$p1->b_=22;
			$x=sirelLang::get_equivalent_or_store($p1,$arht_storage);
			if($x->a_!==1) {
				$test_case['msg']='test 1, $x->a_=='.$x->a_.
					"\n GUID='3ec50233-09ce-49f0-83a2-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!==22) {
				$test_case['msg']='test 2, $x->b_=='.$x->b_.
					"\n GUID='e90f27b5-73b5-4c0e-b292-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::get_equivalent_or_store($p2,$arht_storage);
			if($x->a_!==2) {
				$test_case['msg']='test 3, $x->a_=='.$x->a_.
					"\n GUID='e4f58e26-5616-4131-b592-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!==3) {
				$test_case['msg']='test 4, $x->b_=='.$x->b_.
					"\n GUID='30fe6a94-aa5d-457e-8192-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='fe79af31-db54-4c7f-b592-426131318dd7'");
		} // catch
	} // selftest_get_equivalent_or_store

//-------------------------------------------------------------------------

	private static function selftest_convert_all_strings_in_array_to_lowercase() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ar_in=array();
			$s="AAA";
			array_push($ar_in, $s);
			$s="BbB";
			array_push($ar_in, $s);
			$ar_test=sirelLang::convert_all_strings_in_array_to_lowercase($ar_in);
			$x=$ar_test[0];
			if($x!=="aaa") {
				$test_case['msg']='test 1, $x=='.$x.
					"\n GUID='2bd8ce31-758e-40e3-9392-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_test[1];
			if($x!=="bbb") {
				$test_case['msg']='test 2, $x=='.$x.
					"\n GUID='a36ee01c-8b51-4bd2-b582-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='25fd994a-4718-43db-9582-426131318dd7'");
		} // catch
	} // selftest_convert_all_strings_in_array_to_lowercase

//-------------------------------------------------------------------------

	private static function selftest_bisectStr() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_needle='|||';
			$s_hay='AA|||bb,cc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 1, $i_len=='.$i_len.
					"\n GUID='eb372b5d-b833-415e-a482-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='4f4a4d55-5758-440f-a382-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='AA') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='e3b603b9-2f69-4090-b182-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='bb,cc') {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\n GUID='a1a8e728-05ed-4cd5-a372-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbb,cc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 5, $i_len=='.$i_len.
					"\n GUID='469fa618-4a75-4f32-8172-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 6, $s_x=='.$s_x.
					"\n GUID='1aa8d351-e03a-446e-8472-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbbcc|||';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 7, $i_len=='.$i_len.
					"\n GUID='59df8c3b-9ada-4c22-8472-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\n GUID='1a4a9045-25bc-404f-b272-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='AAbbcc') {
				$test_case['msg']='test 9, $s_x=='.$s_x.
					"\n GUID='3c4e2a33-8580-456d-9372-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='') {
				$test_case['msg']='test 10, $s_x=='.$s_x.
					"\n GUID='ec5aaf20-78cc-4621-b262-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='|||AAbbcc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 11, $i_len=='.$i_len.
					"\n GUID='3bc20f79-5ab0-4131-9462-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 12, $s_x=='.$s_x.
					"\n GUID='7b444717-33b4-4762-a562-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 13, $s_x=='.$s_x.
					"\n GUID='54f91c93-a172-4c8e-8262-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='AAbbcc') {
				$test_case['msg']='test 14, $s_x=='.$s_x.
					"\n GUID='b6ee0026-662f-44ee-a462-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AA|||bb|||cc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 15, $i_len=='.$i_len.
					"\n GUID='55623932-43e0-4a28-9152-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 16, $s_x=='.$s_x.
					"\n GUID='28b4efa6-7c8c-4dcd-9252-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='AA') {
				$test_case['msg']='test 17, $s_x=='.$s_x.
					"\n GUID='05e9412e-d512-476e-8252-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='bb|||cc') {
				$test_case['msg']='test 18, $s_x=='.$s_x.
					"\n GUID='b6866717-b3f5-46ca-b252-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 19, $i_len=='.$i_len.
					"\n GUID='5f353f0e-2a55-4aba-8952-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 20, $s_x=='.$s_x.
					"\n GUID='d322e7f1-1417-4388-b342-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='39340572-7341-4b7b-b642-426131318dd7'");
		} // catch
	} // selftest_bisectStr

//-------------------------------------------------------------------------

	private static function selftest_mb_ereg_replace_till_no_change() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_regex='[|]{3}';
			$s_substitution='g';
			$s_haystack='AA|||bb|||cc';
			$i_max_number_of_iterations=3;
			$s_x=sirelLang::mb_ereg_replace_till_no_change($s_regex,
				$s_substitution,$s_haystack,
				$i_max_number_of_iterations);
			$s_expected='AAgbbgcc';
			if(!sirelLang::str1EqualsStr2($s_x, $s_expected)) {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\n GUID='3dfb7b75-52b8-4537-9442-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_regex='([|]{3})|([g][b])';
			$s_substitution='g';
			$i_max_number_of_iterations=5;
			$s_x=sirelLang::mb_ereg_replace_till_no_change($s_regex,
				$s_substitution,$s_haystack,
				$i_max_number_of_iterations);
			$s_expected='AAggcc';
			if(!sirelLang::str1EqualsStr2($s_x, $s_expected)) {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='483b0bf2-c98f-47a7-9242-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='5bb407cf-f6ee-499c-9442-426131318dd7'");
		} // catch
	} // selftest_mb_ereg_replace_till_no_change

//-------------------------------------------------------------------------

	private static function selftest_mb_explode() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_needle='|||';
			$s_hay='AA|||bb,cc';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 1, $i_len=='.$i_len.
					"\n GUID='a9555c3a-6348-40ad-a432-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='AA') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='b72e90fe-34c2-42f5-9832-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='bb,cc') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='3cceaaa2-4ae3-4b94-9332-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbb,cc';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 4, $i_len=='.$i_len.
					"\n GUID='3d91f939-2291-4f48-a132-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\n GUID='f7a44456-a0bb-4dd3-a532-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbbcc|||';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 6, $i_len=='.$i_len.
					"\n GUID='46993bf3-7e65-4fe0-ae22-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='AAbbcc') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\n GUID='53f91e46-9418-43f3-b422-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\n GUID='6542785b-86a7-41ad-b322-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='|||';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 9, $i_len=='.$i_len.
					"\n GUID='053fc122-cf53-4b37-8322-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 10, $s_x=='.$s_x.
					"\n GUID='7b5eff32-3d2d-4aae-8422-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 11, $s_x=='.$s_x.
					"\n GUID='f930011a-cb49-42fc-9112-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AA|||bb|||cc';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 12, $i_len=='.$i_len.
					"\n GUID='a9e3b55e-a2bf-46e1-8512-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='AA') {
				$test_case['msg']='test 13, $s_x=='.$s_x.
					"\n GUID='39e66b41-8a67-42f1-b412-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='bb') {
				$test_case['msg']='test 14, $s_x=='.$s_x.
					"\n GUID='5407dcb9-4807-479d-8212-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='cc') {
				$test_case['msg']='test 15, $s_x=='.$s_x.
					"\n GUID='e02c3a4d-2ec8-498b-b112-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 16, $i_len=='.$i_len.
					"\n GUID='ad458234-b662-4767-9302-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 17, $s_x=='.$s_x.
					"\n GUID='26c7c743-1789-4779-a902-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='||||||ee';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 18, $i_len=='.$i_len.
					"\n GUID='fef7ee1e-7118-4010-b402-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 19, $s_x=='.$s_x.
					"\n GUID='468cee3d-aaa8-4c0e-8402-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 20, $s_x=='.$s_x.
					"\n GUID='23ce95f3-d7ee-4e29-a202-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='ee') {
				$test_case['msg']='test 21, $s_x=='.$s_x.
					"\n GUID='9e562a3d-7941-453b-82f1-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='|||  |||ee   ';
			$b_trim=True;
			$ar_x=sirelLang::mb_explode($s_hay,$s_needle,
				$b_trim);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 22, $i_len=='.$i_len.
					"\n GUID='e93dfc3c-72c4-442b-b1f1-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 23, $s_x=='.$s_x.
					"\n GUID='75ff81f8-a051-43cf-b7f1-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 24, $s_x=='.$s_x.
					"\n GUID='d176c546-90de-4dd5-94f1-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='ee') {
				$test_case['msg']='test 25, $s_x=='.$s_x.
					"\n GUID='6fb55b25-42cc-4d2e-a2e1-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='|||xx|||eexxx';
			$b_trim=True;
			$s_trimming_regex='(^[x]+)|([x]+$)';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle,
				$b_trim,$s_trimming_regex);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 26, $i_len=='.$i_len.
					"\n GUID='d678fe47-96aa-43b9-84e1-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 27, $s_x=='.$s_x.
					"\n GUID='50863a82-6ded-4676-a7e1-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 28, $s_x=='.$s_x.
					"\n GUID='4e651cb9-a7c6-43d2-b1e1-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='ee') {
				$test_case['msg']='test 29, $s_x=='.$s_x.
					"\n GUID='f92c9c3b-4b01-485d-b3e1-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='0067e342-1172-4f1e-a3d1-426131318dd7'");
		} // catch
	} // selftest_mb_explode

//-------------------------------------------------------------------------

	private static function selftest_commaseparated_list_2_array() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_in='AA,bb ,cc ';
			$ar_x=sirelLang::commaseparated_list_2_array($s_in);
			$i_len=count($ar_x);
			if($i_len!==3) {
				$test_case['msg']='test 1, $i_len=='.$i_len.
					"\n GUID='72c48b74-aca4-4746-bd31-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!="AA") {
				$test_case['msg']='test 2, $x=='.$x.
					"\n GUID='3c14795a-d5f3-4154-b531-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!="bb") {
				$test_case['msg']='test 3, $x=='.$x.
					"\n GUID='0782e758-a47b-4d4c-b431-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!="cc") {
				$test_case['msg']='test 4, $x=='.$x.
					"\n GUID='f9cf2420-2499-4162-8131-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_in='AA, ,, , bb';
			$ar_x=sirelLang::commaseparated_list_2_array($s_in);
			$i_len=count($ar_x);
			if($i_len!==2) {
				$test_case['msg']='test 5, $i_len=='.$i_len.
					"\n GUID='55c5a226-c647-4f46-b121-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!="AA") {
				$test_case['msg']='test 6, $x=='.$x.
					"\n GUID='9057e821-30e3-4bc9-9321-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!="bb") {
				$test_case['msg']='test 7, $x=='.$x.
					"\n GUID='d8c2265c-ee08-468f-a121-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='dc4aab1d-a020-4d6a-9421-426131318dd7'");
		} // catch
	} // selftest_commaseparated_list_2_array

//-------------------------------------------------------------------------

	private static function selftest_assert_type() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$b_error=True;
			$s_msg='';
			try {
				$x=4.5;
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
					__FUNCTION__,'sirelTD_is_mbstring,sirelTD_is_int',$x);
			}catch (Exception $err_exception) {
				$b_error=False;
			} // catch
			if($b_error) {
				$test_case['msg']='test 1, $s_msg=='.$s_msg.
					"\n GUID='cc9b8551-cee4-4d0f-a211-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error=False;
			$s_msg='';
			try {
				$x=42;
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
					__FUNCTION__,'sirelTD_is_mbstring,sirelTD_is_int',$x);
			}catch (Exception $err_exception) {
				$b_error=True;
				$s_msg=$err_exception->getMessage();
			} // catch
			if($b_error) {
				$test_case['msg']='test 2, $s_msg=='.$s_msg.
					"\n GUID='5e292ac6-a5e4-4643-b211-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error=False;
			$s_msg='';
			try {
				$x='this is a string';
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
					__FUNCTION__,'sirelTD_is_mbstring,sirelTD_is_int',$x);
			}catch (Exception $err_exception) {
				$b_error=True;
				$s_msg=$err_exception->getMessage();
			} // catch
			if($b_error) {
				$test_case['msg']='test 3, $s_msg=='.$s_msg.
					"\n GUID='3ec60fc4-4d48-4193-b111-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='d52a0854-a340-4f40-9211-426131318dd7'");
		} // catch
	} // selftest_assert_type

//-------------------------------------------------------------------------

	private static function selftest_assert_file_exists() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_path_lib_sirel=constant('s_path_lib_sirel');
			//-----------------
			$b_error=TRUE;
			$x_fp=$s_path_lib_sirel.'/this_does_not_exist.txt';
			try {
				sirelLang::assert_file_exists(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					$x_fp);
			}catch (Exception $err_exception) {
				$b_error=FALSE;
			} // catch
			if($b_error) {
				$test_case['msg']='test 1, $x_fp==\"'.$x_fp.
					"\"\n GUID='d689a74d-354d-4cb9-9111-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error=TRUE;
			$x_fp='   ';
			try {
				sirelLang::assert_file_exists(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					$x_fp);
			}catch (Exception $err_exception) {
				$b_error=FALSE;
			} // catch
			if($b_error) {
				$test_case['msg']='test 2, $x_fp==\"'.$x_fp.
					"\"\n GUID='31464d12-f4ac-4b6c-9501-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error=FALSE;
			$x_fp=$s_path_lib_sirel.'/src/src/sirel.php';
			try {
				sirelLang::assert_file_exists(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					$x_fp);
			}catch (Exception $err_exception) {
				$b_error=TRUE;
			} // catch
			if($b_error) {
				$test_case['msg']='test 3, $x_fp==\"'.$x_fp.
					"\"\n GUID='ff8dd75f-2cf2-4273-b401-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='d2ac9b11-0d64-424a-a501-426131318dd7'");
		} // catch
	} // selftest_assert_file_exists

//-------------------------------------------------------------------------

	private static function selftest_ar_bisect_by_sindex() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,1);
			$s_left=$ar_x[0];
			if($s_left!='a') {
				$test_case['msg']='test 1, $s_left=='.$s_left.
					"\n GUID='43e96d37-16e5-4db1-a401-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='bc') {
				$test_case['msg']='test 2, $s_right=='.$s_right.
					"\n GUID='b9277524-9f2b-4ca9-82f0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,0);
			$s_left=$ar_x[0];
			if($s_left!='') {
				$test_case['msg']='test 3, $s_left=='.$s_left.
					"\n GUID='006b5341-b0fe-43f0-b1f0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='abc') {
				$test_case['msg']='test 4, $s_right=='.$s_right.
					"\n GUID='3c23d179-9432-4a5e-b2f0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,3);
			$s_left=$ar_x[0];
			if($s_left!='abc') {
				$test_case['msg']='test 5, $s_left=='.$s_left.
					"\n GUID='ecd0a127-75b6-4268-94f0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='') {
				$test_case['msg']='test 6, $s_right=='.$s_right.
					"\n GUID='c780c33c-13da-4c7c-a2e0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,2);
			$s_left=$ar_x[0];
			if($s_left!='ab') {
				$test_case['msg']='test 7, $s_left=='.$s_left.
					"\n GUID='52160b5e-e7b4-4cdb-93e0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='c') {
				$test_case['msg']='test 8, $s_right=='.$s_right.
					"\n GUID='4829b53c-7f49-4b70-b1e0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_hay=array();
			array_push($ar_hay, 'a');
			array_push($ar_hay, 'b');
			array_push($ar_hay, 'c');
			//-----
			$ar_x=sirelLang::ar_bisect_by_sindex($ar_hay,0);
			$ar_left=$ar_x[0];
			$i_count=count($ar_left);
			if($i_count!=0) {
				$test_case['msg']='test 9, $s_left=='.$s_left.
					"\n GUID='64c7974b-6512-48b5-93e0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=3) {
				$test_case['msg']='test 10, count($ar_right)=='.$i_count.
					"\n GUID='1185bb62-3212-460a-a3e0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_right[0]!='a')||($ar_right[1]!='b')||($ar_right[2]!='c')) {
					$test_case['msg']='test 11'.
						"\n GUID='a4d1e236-2f89-4f20-84d0-426131318dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			//-----
			$ar_x=sirelLang::ar_bisect_by_sindex($ar_hay,1);
			$ar_left=$ar_x[0];
			$i_count=count($ar_left);
			if($i_count!=1) {
				$test_case['msg']='test 12, $s_left=='.$s_left.
					"\n GUID='d6e8fd40-f004-4799-a3d0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_left[0]!='a')) {
					$test_case['msg']='test 14'.
						"\n GUID='120fbc8f-13ab-4eb6-b5d0-426131318dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=2) {
				$test_case['msg']='test 13, count($ar_right)=='.$i_count.
					"\n GUID='b4fa869c-09bd-4b1f-81d0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_right[0]!='b')||($ar_right[1]!='c')) {
					$test_case['msg']='test 14'.
						"\n GUID='319f278b-6f7c-49f4-85c0-426131318dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			//-----
			$ar_x=sirelLang::ar_bisect_by_sindex($ar_hay,2);
			$ar_left=$ar_x[0];
			$i_count=count($ar_left);
			if($i_count!=2) {
				$test_case['msg']='test 15, $s_left=='.$s_left.
					"\n GUID='a0ca4d2d-4cea-4d36-95c0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_left[0]!='a')||($ar_left[1]!='b')) {
					$test_case['msg']='test 16'.
						"\n GUID='04a3524c-292b-4c9a-b2c0-426131318dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=1) {
				$test_case['msg']='test 17, count($ar_right)=='.$i_count.
					"\n GUID='a6f79c3c-d83c-4747-a4c0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_right[0]!='c')) {
					$test_case['msg']='test 18'.
						"\n GUID='33ba14b4-87ed-4d09-85b0-426131318dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			//-----
			$ar_x=sirelLang::ar_bisect_by_sindex($ar_hay,3);
			$ar_left=$ar_x[0];
			$i_count=count($ar_left);
			if($i_count!=3) {
				$test_case['msg']='test 19, $s_left=='.$s_left.
					"\n GUID='0e1afb11-17ae-4387-a1b0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_left[0]!='a')||($ar_left[1]!='b')||($ar_left[2]!='c')) {
					$test_case['msg']='test 20'.
						"\n GUID='184b5152-e0c9-4b04-81b0-426131318dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=0) {
				$test_case['msg']='test 21, count($ar_right)=='.$i_count.
					"\n GUID='b5cdd34c-f0f2-4f8b-82b0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='f4c0df30-3914-4001-a3a0-426131318dd7'");
		} // catch
	} // selftest_ar_bisect_by_sindex

//-------------------------------------------------------------------------

	private static function selftest_s_set_char() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay='abc';
			$s_x=sirelLang::s_set_char($s_hay, 0, 'X');
			if($s_x!='Xbc') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\n GUID='155eb685-9f74-479a-84a0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_set_char($s_hay, 1, 'X');
			if($s_x!='aXc') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='5909e3b0-7cb2-4e51-b1a0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_set_char($s_hay, 2, 'X');
			if($s_x!='abX') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='a5166439-264b-4d7b-b3a0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='a06c4c55-15b8-4a35-91a0-426131318dd7'");
		} // catch
	} // selftest_s_set_char

//-------------------------------------------------------------------------

	private static function selftest_s_get_char() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay='abc';
			$s_x=sirelLang::s_get_char($s_hay, 0);
			if($s_x!='a') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\n GUID='e22da84c-7114-497e-9390-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_get_char($s_hay, 1);
			if($s_x!='b') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='8aae1511-7db8-4116-9290-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_get_char($s_hay, 2);
			if($s_x!='c') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='f2a4e64c-1193-4b8e-a290-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='5cf0fd17-cbc4-421d-9590-426131318dd7'");
		} // catch
	} // selftest_s_get_char

//-------------------------------------------------------------------------

	private static function selftest_s_remove_all_spaces_tabs_linebreaks() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay=' a  bc ';
			$s_x=sirelLang::s_remove_all_spaces_tabs_linebreaks($s_hay);
			if($s_x!='abc') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\n GUID='ff728c44-2f8f-4e16-8280-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="\rab\nc ";
			$s_x=sirelLang::s_remove_all_spaces_tabs_linebreaks($s_hay);
			if($s_x!='abc') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='77db7b3e-195f-4537-a480-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="a	b\rcc ";
			$s_x=sirelLang::s_remove_all_spaces_tabs_linebreaks($s_hay);
			if($s_x!='abcc') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='cb12e457-ac06-460f-9480-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='e1d80012-7072-43c5-9480-426131318dd7'");
		} // catch
	} // selftest_s_remove_all_spaces_tabs_linebreaks

//-------------------------------------------------------------------------

	private static function selftest_b_is_free_of_spaces_tabs_linebreaks() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay=' a  bc ';
			$b_x=sirelLang::b_is_free_of_spaces_tabs_linebreaks($s_hay);
			if($b_x!=False) {
				$test_case['msg']='test 1, $b_x=='.$b_x.
					"\n GUID='210bf123-2475-463f-8270-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="\rab\nc ";
			$b_x=sirelLang::b_is_free_of_spaces_tabs_linebreaks($s_hay);
			if($b_x!=False) {
				$test_case['msg']='test 2, $b_x=='.$b_x.
					"\n GUID='1e68904e-4867-4f8f-8370-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="abc";
			$b_x=sirelLang::b_is_free_of_spaces_tabs_linebreaks($s_hay);
			if($b_x!=True) {
				$test_case['msg']='test 3, $b_x=='.$b_x.
					"\n GUID='52238853-a6e8-42f9-9270-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='bc2e5a51-931f-463c-b570-426131318dd7'");
		} // catch
	} // selftest_b_is_free_of_spaces_tabs_linebreaks

//-------------------------------------------------------------------------

	private static function selftest_b_string_is_interpretable_as_a_positive_number() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay="1 4";
			$b_require_int=True;
			$b_allow_comma=False;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
				$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 1, $s_hay=='.$s_hay.
					"\n GUID='e6426520-4e96-4254-b560-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="14.5";
			$b_require_int=True;
			$b_allow_comma=False;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
				$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 2, $s_hay=='.$s_hay.
					"\n GUID='82238119-33eb-41f7-b560-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="4..4";
			$b_require_int=False;
			$b_allow_comma=False;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
				$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 3, $s_hay=='.$s_hay.
					"\n GUID='526ae356-28d6-44b9-b560-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="4a4";
			$b_require_int=False;
			$b_allow_comma=True;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
				$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 4, $s_hay=='.$s_hay.
					"\n GUID='d40062c9-ae49-4bbc-a560-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="4,2";
			$b_require_int=False;
			$b_allow_comma=True;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
				$b_require_int,$b_allow_comma);
			if($b_x!=True) {
				$test_case['msg']='test 5, $s_hay=='.$s_hay.
					"\n GUID='e167e726-7f52-42aa-b250-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay=".";
			$b_require_int=False;
			$b_allow_comma=False;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
				$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 6, $s_hay=='.$s_hay.
					"\n GUID='7536f6e3-d1ba-4c13-8250-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="";
			$b_require_int=False;
			$b_allow_comma=False;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
				$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 7, $s_hay=='.$s_hay.
					"\n GUID='4403e892-7ddd-4cbf-9450-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="   ";
			$b_require_int=False;
			$b_allow_comma=False;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
				$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 8, $s_hay=='.$s_hay.
					"\n GUID='5c17cccc-a6c3-413d-b440-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="-4.5";
			$b_require_int=False;
			$b_allow_comma=True;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
				$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 9, $s_hay=='.$s_hay.
					"\n GUID='1cf7efc6-c759-4923-9240-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="-32";
			$b_require_int=False;
			$b_allow_comma=True;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
				$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 10, $s_hay=='.$s_hay.
					"\n GUID='fdf2e658-9d42-4ea7-a340-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='11becf90-c5b3-4aaf-9140-426131318dd7'");
		} // catch
	} // selftest_b_string_is_interpretable_as_a_positive_number

//-------------------------------------------------------------------------

	private static function selftest_assert_monotonic_increase_t1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=-7;
			$ar_x[]=-7;
			$ar_x[]=-6;
			$ar_x[]=0;
			$ar_x[]=0;
			$ar_x[]=7;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='ad711e28-96b7-465e-b230-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=-7;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='023a745e-f555-493f-a130-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\nGUID='f2d59a6c-4a1f-41da-ad30-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0.0;
			$ar_x[]=0.1;
			$ar_x[]=0.1;
			$ar_x[]=0.11;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\nGUID='8b615315-4751-45c8-b230-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			//-------test-style-change-2-compulsory-throwing---
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			$ar_x[]=-0.01;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\nGUID='7a006626-ded5-4e94-9120-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			$ar_x[]=0.01;
			$ar_x[]=0.001;
			$ar_x[]=0.01;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 6, $s_x=='.$s_x.
					"\nGUID='588a1dde-dc4a-4025-9420-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=1;
			$ar_x[]=0;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='156a4f62-df63-4c05-9c20-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=1;
			$ar_x[]=0.9999;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\nGUID='50204f4e-adf0-4662-b520-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=-1;
			$ar_x[]=-2;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 9, $s_x=='.$s_x.
					"\nGUID='257db743-003e-4e73-b310-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='4925dd1f-3c3b-4a9e-8410-426131318dd7'");
		} // catch
	} // selftest_assert_monotonic_increase_t1

//-------------------------------------------------------------------------

	private static function selftest_assert_monotonic_decrease_t1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=7;
			$ar_x[]=7;
			$ar_x[]=0;
			$ar_x[]=-5;
			$ar_x[]=-7;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='6b40195e-dbe3-498d-b210-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=-7;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='52231cd2-1c46-432d-a410-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\nGUID='430fea04-5d43-4e34-b016-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0.0;
			$ar_x[]=-0.1;
			$ar_x[]=-0.1;
			$ar_x[]=-0.11;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\nGUID='222d6233-d2d0-4a89-9146-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			//-------test-style-change-2-compulsory-throwing---
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			$ar_x[]=0.01;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\nGUID='6894e355-05ab-4e3c-8246-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			$ar_x[]=-0.01;
			$ar_x[]=-0.001;
			$ar_x[]=-0.01;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 6, $s_x=='.$s_x.
					"\nGUID='d29deb2c-54e4-45d1-a455-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			$ar_x[]=1;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='98d2760a-77dc-44b3-9c45-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0.9999;
			$ar_x[]=1;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\nGUID='2c3d5245-608e-4847-9a45-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=-2;
			$ar_x[]=-1;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 9, $s_x=='.$s_x.
					"\nGUID='1b97a944-49a8-4608-b845-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='32f16d01-31b4-4758-8954-426131318dd7'");
		} // catch
	} // selftest_assert_monotonic_decrease_t1

//-------------------------------------------------------------------------

	private static function selftest_s_sar() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_0='';
			$ixs_low=0;
			$ixs_high=0;
			$s_x=sirelLang::s_sar($s_0,$ixs_low,$ixs_high);
			if($s_x!='') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='96923f94-3822-491b-ae44-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='a';
			$ixs_low=0;
			$ixs_high=0;
			$s_x=sirelLang::s_sar($s_0,$ixs_low,$ixs_high);
			if($s_x!='') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='c5814d8f-7e51-4996-bf23-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='a';
			$ixs_low=1;
			$ixs_high=1;
			$s_x=sirelLang::s_sar($s_0,$ixs_low,$ixs_high);
			if($s_x!='') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\nGUID='5c89bf34-1aa6-4ae6-a853-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='a';
			$ixs_low=0;
			$ixs_high=1;
			$s_x=sirelLang::s_sar($s_0,$ixs_low,$ixs_high);
			if($s_x!='a') {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\nGUID='7f85ec02-14fb-4260-aa53-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='ab';
			$ixs_low=1;
			$ixs_high=2;
			$s_x=sirelLang::s_sar($s_0,$ixs_low,$ixs_high);
			if($s_x!='b') {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\nGUID='b9498759-4e0c-422f-b152-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='abc';
			$ixs_low=1;
			$ixs_high=2;
			$s_x=sirelLang::s_sar($s_0,$ixs_low,$ixs_high);
			if($s_x!='b') {
				$test_case['msg']='test 6, $s_x=='.$s_x.
					"\nGUID='4c75b362-6930-4860-8952-426131318dd7'";
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
				" GUID='1462ce23-46ef-4e0a-b822-426131318dd7'");
		} // catch
	} // selftest_s_sar

//-------------------------------------------------------------------------

	private static function selftest_ar_sar() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$ar_0=array();
			$ixs_low=0;
			$ixs_high=0;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=0) {
				$test_case['msg']='test 1, count($ar_x)=='.
					count($ar_x).
					"\nGUID='24d1ed42-04d4-42b9-a822-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ixs_low=0;
			$ixs_high=0;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=0) {
				$test_case['msg']='test 2, count($ar_x)=='.
					count($ar_x).
					"\nGUID='9414c814-2679-4672-9141-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ixs_low=1;
			$ixs_high=1;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=0) {
				$test_case['msg']='test 3, count($ar_x)=='.
					count($ar_x).
					"\nGUID='2b3fd105-68da-40eb-8a41-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ar_0[]=66;
			$ixs_low=1;
			$ixs_high=1;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=0) {
				$test_case['msg']='test 4, count($ar_x)=='.
					count($ar_x).
					"\nGUID='f160cbb3-2d0d-42a8-b381-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ar_0[]=66;
			$ixs_low=0;
			$ixs_high=2;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=2) {
				$test_case['msg']='test 5, count($ar_x)=='.
					count($ar_x).
					"\nGUID='46a521e4-5d42-4789-b350-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[0]!=42) {
				$test_case['msg']='test 6, $ar_x[0]=='.
					$ar_x[0].
					"\nGUID='25151fde-349b-49fd-a660-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[1]!=66) {
				$test_case['msg']='test 7, $ar_x[1]=='.
					$ar_x[1].
					"\nGUID='4a6f73b3-a6e4-49d1-8c4f-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ar_0[]=66;
			$ixs_low=0;
			$ixs_high=1;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=1) {
				$test_case['msg']='test 8, count($ar_x)=='.
					count($ar_x).
					"\nGUID='2e846943-2e9e-4183-991f-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[0]!=42) {
				$test_case['msg']='test 9, $ar_x[0]=='.
					$ar_x[0].
					"\nGUID='1d39b2e5-ad4f-42af-96af-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ar_0[]=66;
			$ixs_low=1;
			$ixs_high=2;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=1) {
				$test_case['msg']='test 10, count($ar_x)=='.
					count($ar_x).
					"\nGUID='da6759c2-162e-456c-b75e-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[0]!=66) {
				$test_case['msg']='test 11, $ar_x[0]=='.
					$ar_x[0].
					"\nGUID='553addf0-0448-4384-be4e-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ar_0[]=66;
			$ar_0[]=75;
			$ixs_low=0;
			$ixs_high=3;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=3) {
				$test_case['msg']='test 12, count($ar_x)=='.
					count($ar_x).
					"\nGUID='11b863f0-f9a4-42ee-83fe-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[2]!=75) {
				$test_case['msg']='test 13, $ar_x[2]=='.
					$ar_x[2].
					"\nGUID='57e1e311-1aff-4428-a22d-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ar_0[]=66;
			$ar_0[]=75;
			$ixs_low=1;
			$ixs_high=2;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=1) {
				$test_case['msg']='test 14, count($ar_x)=='.
					count($ar_x).
					"\nGUID='f1f05742-a524-47d5-9e4d-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[0]!=66) {
				$test_case['msg']='test 15, $ar_x[0]=='.
					$ar_x[0].
					"\nGUID='49f92272-c4da-447a-b53d-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='1b953e22-70b3-48b1-b61c-426131318dd7'");
		} // catch
	} // selftest_ar_sar

//-------------------------------------------------------------------------

	private static function selftest_s_sar_rubystyle() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_0='a';
			$ix_low=0;
			$ix_high=0;
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='a') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='9af90754-6edb-4ac8-be3c-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='a';
			$ix_low=(-1);
			$ix_high=(-1);
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='a') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='d1a25b24-44cc-4487-833c-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='ab';
			$ix_low=0;
			$ix_high=1;
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='ab') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\nGUID='d4da2052-9f68-4d42-a15b-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='abc';
			$ix_low=1;
			$ix_high=1;
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='b') {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\nGUID='27812712-a4b8-4d18-b34b-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='abc';
			$ix_low=(-2);
			$ix_high=(-2);
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='b') {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\nGUID='7e59ceb2-e5b2-42b2-ab4b-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='abc';
			$ix_low=(0);
			$ix_high=(-2);
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='ab') {
				$test_case['msg']='test 6, $s_x=='.$s_x.
					"\nGUID='d19448d7-06ad-4058-a75a-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='abc';
			$ix_low=(0);
			$ix_high=(-1);
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='abc') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='8469298e-da83-4097-965a-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='abc';
			$ix_low=(-1);
			$ix_high=(-1);
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='c') {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\nGUID='3d8908f2-add3-4f1e-9a2a-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='54ba66e1-1261-4848-a449-426131318dd7'");
		} // catch
	} // selftest_s_sar_rubystyle

//-------------------------------------------------------------------------

	private static function selftest_ar_sar_rubystyle() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ix_low=0;
			$ix_high=0;
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 1js, $i_len=='.$i_len.
					"\nGUID='28c5daa2-a755-48fd-8449-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='5696c461-cfeb-4ed3-a619-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ix_low=(-1);
			$ix_high=(-1);
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 2js, $i_len=='.$i_len.
					"\nGUID='dc664d5e-8c17-4309-ac59-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='27e94122-1873-4c1d-9e38-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ar_0[]='b';
			$ix_low=0;
			$ix_high=1;
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 3js, $i_len=='.$i_len.
					"\nGUID='3992f222-1ce7-4625-8658-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 3a, $s_x=='.$s_x.
					"\nGUID='1ca4b783-522a-4abb-b128-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='b') {
				$test_case['msg']='test 3b, $s_x=='.$s_x.
					"\nGUID='920856c6-6df1-467b-bf47-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ar_0[]='b';
			$ar_0[]='c';
			$ix_low=1;
			$ix_high=1;
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 4js, $i_len=='.$i_len.
					"\nGUID='e7331df7-5ff1-4754-ab17-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='b') {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\nGUID='3f257bfe-4c12-441f-9317-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ar_0[]='b';
			$ar_0[]='c';
			$ix_low=(-2);
			$ix_high=(-2);
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 5js, $i_len=='.$i_len.
					"\nGUID='98d24610-4d99-4911-ac27-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='b') {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\nGUID='27356362-7c13-4e89-8a16-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ar_0[]='b';
			$ar_0[]='c';
			$ix_low=(0);
			$ix_high=(-2);
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 6js, $i_len=='.$i_len.
					"\nGUID='1b52f3f4-0a68-49fd-a126-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 6a, $s_x=='.$s_x.
					"\nGUID='b73ac6e2-abb5-45aa-9316-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='b') {
				$test_case['msg']='test 6b, $s_x=='.$s_x.
					"\nGUID='5db48821-7fd8-4182-be25-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ar_0[]='b';
			$ar_0[]='c';
			$ix_low=(0);
			$ix_high=(-1);
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 6js, $i_len=='.$i_len.
					"\nGUID='9503f12d-e6c1-4776-b135-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='e5856c02-4e35-4a57-a135-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='b') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='12151b23-41b3-4b66-9e44-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='c') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='a484df64-09fe-4352-8744-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ar_0[]='b';
			$ar_0[]='c';
			$ix_low=(-1);
			$ix_high=(-1);
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 8js, $i_len=='.$i_len.
					"\nGUID='305b7db3-b1ac-4252-ba54-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='c') {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\nGUID='468d1751-918d-4958-b934-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='41682f1b-9822-4bfd-8733-426131318dd7'");
		} // catch
	} // selftest_ar_sar_rubystyle

//-------------------------------------------------------------------------

	private static function selftest_s_reverse_string() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_0='a';
			$s_x=sirelLang::s_reverse_string($s_0);
			if($s_x!='a') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='2ca8fb95-741f-44e5-9ac3-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='';
			$s_x=sirelLang::s_reverse_string($s_0);
			if($s_x!='') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='23986f93-4549-481b-9c53-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='ab c';
			$s_x=sirelLang::s_reverse_string($s_0);
			if($s_x!='c ba') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\nGUID='3231b0b1-5772-483b-a322-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='  ';
			$s_x=sirelLang::s_reverse_string($s_0);
			if($s_x!='  ') {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\nGUID='23ea8632-0900-4523-a012-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='A0123456789'.'0123456789'.
				'0123456789'.'0123456789'.'0123456789B';
			$s_1='B9876543210'.'9876543210'.
				'9876543210'.'9876543210'.'9876543210A';
			$s_x=sirelLang::s_reverse_string($s_0);
			if($s_x!=$s_1) {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\nGUID='35962992-6435-4108-8542-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='61dd066e-baf6-4470-a261-426131318dd7'");
		} // catch
	} // selftest_s_reverse_string

//-------------------------------------------------------------------------

	private static function selftest_s_get_tail() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//------------
			// s_get_tail('','abcd') -> ''
			$s_separ='';
			$s_0='abcd';
			$s_x=sirelLang::s_get_tail($s_separ,$s_0);
			if($s_x!='') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='85b8a3bd-ea5c-4427-8211-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			// s_get_tail('XB','') -> ''
			$s_separ='XB';
			$s_0='';
			$s_x=sirelLang::s_get_tail($s_separ,$s_0);
			if($s_x!='') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='d2562660-8f76-4dd3-8e11-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			// s_get_tail('Y','abcd') -> 'abcd'
			$s_separ='Y';
			$s_0='abcd';
			$s_x=sirelLang::s_get_tail($s_separ,$s_0);
			if($s_x!='abcd') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\nGUID='3f686da1-f375-4657-9121-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			// s_get_tail('XB','abcdXBefg') -> 'efg'
			$s_separ='XB';
			$s_0='abcdXBefg';
			$s_x=sirelLang::s_get_tail($s_separ,$s_0);
			if($s_x!='efg') {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\nGUID='f35338f0-8530-4e67-b130-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			// s_get_tail('XB','abcdXB') -> ''
			$s_separ='XB';
			$s_0='abcdXB';
			$s_x=sirelLang::s_get_tail($s_separ,$s_0);
			if($s_x!='') {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\nGUID='e4b262aa-155c-43fa-9d30-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			// s_get_tail('XB','aXBbcdXB') -> ''
			$s_separ='XB';
			$s_0='aXBbcdXB';
			$s_x=sirelLang::s_get_tail($s_separ,$s_0);
			if($s_x!='') {
				$test_case['msg']='test 6, $s_x=='.$s_x.
					"\nGUID='e43b7126-7e1e-440b-94a0-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			// s_get_tail('XB','XBabcd') -> 'abcd'
			$s_separ='XB';
			$s_0='XBabcd';
			$s_x=sirelLang::s_get_tail($s_separ,$s_0);
			if($s_x!='abcd') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='ec1c01ca-4422-4d00-b05f-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			// s_get_tail('XB','Xabcd') -> 'Xabcd'
			$s_separ='XB';
			$s_0='Xabcd';
			$s_x=sirelLang::s_get_tail($s_separ,$s_0);
			if($s_x!='Xabcd') {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\nGUID='3186e2a5-f014-4233-8f3f-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			// s_get_tail('XB','XB') -> ''
			$s_separ='XB';
			$s_0='XB';
			$s_x=sirelLang::s_get_tail($s_separ,$s_0);
			if($s_x!='') {
				$test_case['msg']='test 9, $s_x=='.$s_x.
					"\nGUID='5d4b5923-a232-42a1-9f4f-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='445519fd-eab3-450f-9835-426131318dd7'");
		} // catch
	} // selftest_s_get_tail

//-------------------------------------------------------------------------

	private static function selftest_s_mime_type() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_path_lib_sirel=constant('s_path_lib_sirel');
			$s_fp_data_dir=$s_path_lib_sirel.'/src/dev_tools'.
				'/selftests/data_for_tests';
			//--------------
			$s_0=$s_fp_data_dir.
				'/2009_summer_Tallinn_Freedom_Square_1.jpg';
			$s_x=sirelLang::s_mime_type($s_0);
			if($s_x!='image/jpeg') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='55c5abcf-beb8-452c-8834-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0=$s_fp_data_dir.'/test_x1.js';
			$s_x=sirelLang::s_mime_type($s_0);
			if($s_x!='text/plain') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='5dc8d3b5-d949-4e4d-b214-426131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='13f4edf8-12d8-4594-9a24-426131318dd7'");
		} // catch
	} // selftest_s_mime_type


//-------------------------------------------------------------------------

	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_str1ContainsStr2();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_generateMissingNeedlestring_t2();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_str2float();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_mb_stdlib();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_str2array_of_characters();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_get_equivalent_or_store();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_str2boolean();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_convert_all_strings_in_array_to_lowercase();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_bisectStr();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_mb_ereg_replace_till_no_change();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_mb_explode();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_commaseparated_list_2_array();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_assert_type();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_assert_file_exists();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_ar_bisect_by_sindex();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_s_set_char();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_s_get_char();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_s_remove_all_spaces_tabs_linebreaks();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_b_is_free_of_spaces_tabs_linebreaks();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_b_string_is_interpretable_as_a_positive_number();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_assert_monotonic_increase_t1();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_assert_monotonic_decrease_t1();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_s_sar();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_ar_sar();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_s_sar_rubystyle();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_ar_sar_rubystyle();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_s_reverse_string();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_s_get_tail();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_s_mime_type();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='ffe8c092-d827-45f0-8613-426131318dd7'");
		} // catch
	} // selftest

//-------------------------------------------------------------------------
} // class sirel_test_sirel_lang

//=========================================================================

