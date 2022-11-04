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

class sirel_test_sirel_type_normalizations {

	private static function test_to_i() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$x='1,000';
			$i_x=sirel_type_normalizations::to_i($x);
			if($i_x!=1) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='0a484afe-f9c9-45f8-a234-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=1.000;
			$i_x=sirel_type_normalizations::to_i($x);
			if($i_x!=1) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='2133fc1a-4b84-4229-b021-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=1.001;
				$i_x=sirel_type_normalizations::to_i($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='errdetection 1 $x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='a6db0472-c31f-4467-8db3-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=0;
			$i_x=sirel_type_normalizations::to_i($x);
			if($i_x!=0) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='2d24e443-16d5-44ac-b364-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=(-3);
			$i_x=sirel_type_normalizations::to_i($x);
			if($i_x!=(-3)) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='79763df9-e48e-43b0-89a3-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=array();
				$i_x=sirel_type_normalizations::to_i($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='errdetection 2 $x=="'.$x.
					'"  $i_x=='.$i_x.
					"\n GUID='2e323835-4816-4d63-abc5-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='7476618b-2af1-418a-b602-626131318dd7'");
		} // catch
	} // test_to_i

	private static function test_to_fd() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$x='1.000'; // with a point
			$i_x=sirel_type_normalizations::to_fd($x);
			if($i_x!=1.0) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='ccd73acc-0936-416b-a575-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x='1,030'; // with a comma
			$i_x=sirel_type_normalizations::to_fd($x);
			if($i_x!=1.03) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='ad2a7a6b-e367-43ca-93e4-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=1.001; // a float
			$i_x=sirel_type_normalizations::to_fd($x);
			if($i_x!=1.001) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='55649dbe-fc2a-4433-8e13-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=1; // an integer
			$i_x=sirel_type_normalizations::to_fd($x);
			if($i_x!=1.0) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='c924595a-6866-44bd-80b3-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=0;
			$i_x=sirel_type_normalizations::to_fd($x);
			if($i_x!=0.0) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='af215400-f814-45fa-9cc5-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x='1.00,1'; // multiple points after replacement
				$i_x=sirel_type_normalizations::to_fd($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='errdetection 1 $x=="'.$x.
					'"  $i_x=='.$i_x.
					"\n GUID='35e0c4b7-4323-4419-ae81-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=(-3);
			$i_x=sirel_type_normalizations::to_fd($x);
			if($i_x!=(-3.0)) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='68412d50-ed8a-4246-ada2-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=array();
				$i_x=sirel_type_normalizations::to_fd($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='errdetection 2 $x=="'.$x.
					'"  $i_x=='.$i_x.
					"\n GUID='52b8a3fe-6ff4-459b-9a45-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='3082e906-459d-4cfa-ba31-626131318dd7'");
		} // catch
	} // test_to_fd

	private static function test_to_b() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$x='t';
			$b_x=sirel_type_normalizations::to_b($x);
			if($b_x!=True) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='07a17d80-9308-413c-9f25-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x='f';
			$b_x=sirel_type_normalizations::to_b($x);
			if($b_x!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='3f4f5359-5755-45b3-91b3-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=True;
			$b_x=sirel_type_normalizations::to_b($x);
			if($b_x!=True) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='bf2c2fc5-52d9-41ca-9db1-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=False;
			$b_x=sirel_type_normalizations::to_b($x);
			if($b_x!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='d62a5238-a2f7-425d-aac1-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x='x'; // only 't' and 'b' have a meaning
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='74a96283-5739-41ed-8c01-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=''; // only 't' and 'b' have a meaning
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='3883230f-7743-47b3-aa8d-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=0; // wrong type
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='43bcad83-3d83-422e-be11-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=1; // wrong type
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='b3846033-8fc1-4368-a6c4-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=NULL; // wrong type
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='01319308-d94a-422b-a4e4-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=1.0; // wrong type
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='7589f470-c172-4158-8913-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=array('t'=>'t'); // wrong type
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='cf344bee-8d5e-43fa-8b33-626131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='c113299d-332c-4a19-a128-626131318dd7'");
		} // catch
	} // test_to_b


	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_type_normalizations::test_to_i();
			$ar_test_results[]=sirel_test_sirel_type_normalizations::test_to_fd();
			$ar_test_results[]=sirel_test_sirel_type_normalizations::test_to_b();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='63cf06dd-2028-450a-8982-626131318dd7'");
		} // catch
	} // selftest

} // class sirel_test_sirel_type_normalizations

//=========================================================================

