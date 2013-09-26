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

class sirel_test_sirel_units {

//------------------------------------------------------------------
	private static function test_fd_2_Si_ct_set1() {
		try {
			$ar_tests=array();

			array_push($ar_tests,array('orig'=>'km','x'=>5.1,'exp'=>5100));
			array_push($ar_tests,array('orig'=>'m','x'=>5.1,'exp'=>5.1));
			array_push($ar_tests,array('orig'=>'cm','x'=>5.1,'exp'=>0.051));
			array_push($ar_tests,array('orig'=>'mm','x'=>5.1,'exp'=>0.0051));

			array_push($ar_tests,array('orig'=>'t','x'=>5.1,'exp'=>5100));
			array_push($ar_tests,array('orig'=>'kg','x'=>5.1,'exp'=>5.1));
			array_push($ar_tests,array('orig'=>'g','x'=>5.1,'exp'=>0.0051));
			array_push($ar_tests,array('orig'=>'mg','x'=>5.1,'exp'=>0.0000051));

			array_push($ar_tests,array('orig'=>'t/(m^3)','x'=>51,'exp'=>51000.0));
			array_push($ar_tests,array('orig'=>'kg/(m^3)','x'=>51,'exp'=>51.0));
			array_push($ar_tests,array('orig'=>'kg/l','x'=>51,'exp'=>51000.0));
			array_push($ar_tests,array('orig'=>'g/l','x'=>51,'exp'=>51));
			array_push($ar_tests,array('orig'=>'g/(cm^3)','x'=>51,'exp'=>51000));
			array_push($ar_tests,array('orig'=>'mg/(cm^3)','x'=>51000.0,'exp'=>51000));

			array_push($ar_tests,array('orig'=>'m^3','x'=>5.1,'exp'=>5.1));
			array_push($ar_tests,array('orig'=>'l','x'=>5.1,'exp'=>0.0051));
			array_push($ar_tests,array('orig'=>'cm^3','x'=>5.1,'exp'=>0.0000051));

			return $ar_tests;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='4db8a242-8501-40f0-9391-626131318dd7'");
		} // catch
	} // test_fd_2_Si_ct_set1


//------------------------------------------------------------------
	private static function test_fd_2_Si() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ar_testsets=array();

			$ar_tests_set1=sirel_test_sirel_units::test_fd_2_Si_ct_set1();
			array_push($ar_testsets,$ar_tests_set1);


			foreach ($ar_testsets as $ar_tests ) {
				foreach ($ar_tests as $arht_test) {
					$i_or_s_or_fd=$arht_test['x'];
					$s_origin_unit=$arht_test['orig'];
					$fd_expected=$arht_test['exp'];
					$fd=sirel_units::fd_2_Si($i_or_s_or_fd,$s_origin_unit);

					// One can not really compare floats due to rounding errors.
					$s_x=number_format($fd*1000, 7);
					$s_exp=number_format($fd_expected*1000, 7);
					if($s_x!=$s_exp) {
						$test_case['msg']='Conversion to Si units. '.
							' $i_or_s_or_fd=='.$i_or_s_or_fd.
							' $s_origin_unit=='.$s_origin_unit. '$fd=='.$fd.
							' $fd_expected=='.$fd_expected.
							"\n GUID='87a7f4a2-6745-4b1f-a391-626131318dd7'";
						$test_case['line_number']=__LINE__;
						$ar_tc[]=$test_case;
					} // if

				} // foreach
			} // foreach
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='4d69cf2b-b305-448e-a291-626131318dd7'");
		} // catch
	} // test_fd_2_Si

//------------------------------------------------------------------
	private static function test_fd_convert_ct_length() {
		try {
			$ar_tests=array();

			array_push($ar_tests,
				array('orig'=>'km','dst'=>'km','x'=>5.1,'exp'=>5.1));
			array_push($ar_tests,
				array('orig'=>'km','dst'=>'m','x'=>5.1,'exp'=>5100));
			array_push($ar_tests,
				array('orig'=>'km','dst'=>'cm','x'=>'0.001','exp'=>100.0));
			array_push($ar_tests,
				array('orig'=>'km','dst'=>'mm','x'=>3.1,'exp'=>3100000.0));

			array_push($ar_tests,
				array('orig'=>'m','dst'=>'km','x'=>2.03,'exp'=>0.00203));
			array_push($ar_tests,
				array('orig'=>'m','dst'=>'m','x'=>0.03,'exp'=>0.03));
			array_push($ar_tests,
				array('orig'=>'m','dst'=>'cm','x'=>0.03,'exp'=>3.0));
			array_push($ar_tests,
				array('orig'=>'m','dst'=>'mm','x'=>0.5,'exp'=>500.0));


			array_push($ar_tests,
				array('orig'=>'cm','dst'=>'km','x'=>90,'exp'=>0.0009));
			array_push($ar_tests,
				array('orig'=>'cm','dst'=>'m','x'=>90,'exp'=>0.9));
			array_push($ar_tests,
				array('orig'=>'cm','dst'=>'cm','x'=>31.3,'exp'=>31.3));
			array_push($ar_tests,
				array('orig'=>'cm','dst'=>'mm','x'=>31.3,'exp'=>313.0));

			array_push($ar_tests,
				array('orig'=>'mm','dst'=>'km','x'=>37.2,'exp'=>0.0000372));
			array_push($ar_tests,
				array('orig'=>'mm','dst'=>'m','x'=>'37.2','exp'=>0.0372));
			array_push($ar_tests,
				array('orig'=>'mm','dst'=>'cm','x'=>'3700.9','exp'=>370.09));
			array_push($ar_tests,
				array('orig'=>'mm','dst'=>'mm','x'=>'3700.9','exp'=>3700.9));

			return $ar_tests;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='f1736a58-ad3b-4d50-b391-626131318dd7'");
		} // catch
	} // test_fd_convert_ct_length

//------------------------------------------------------------------
	private static function test_fd_convert_ct_mass() {
		try {
			$ar_tests=array();

			array_push($ar_tests,
				array('orig'=>'t','dst'=>'t','x'=>5000,'exp'=>5000));
			array_push($ar_tests,
				array('orig'=>'t','dst'=>'kg','x'=>'5','exp'=>5000.0));
			array_push($ar_tests,
				array('orig'=>'t','dst'=>'g','x'=>0.03,'exp'=>30000.0));
			array_push($ar_tests,
				array('orig'=>'t','dst'=>'mg','x'=>0.005,'exp'=>5000000.0));

			array_push($ar_tests,
				array('orig'=>'kg','dst'=>'t','x'=>5000,'exp'=>5.0));
			array_push($ar_tests,
				array('orig'=>'kg','dst'=>'kg','x'=>5000,'exp'=>5000.0));
			array_push($ar_tests,
				array('orig'=>'kg','dst'=>'g','x'=>5,'exp'=>5000.0));
			array_push($ar_tests,
				array('orig'=>'kg','dst'=>'mg','x'=>5,'exp'=>5000000.0));

			array_push($ar_tests,
				array('orig'=>'g','dst'=>'t','x'=>9000000,'exp'=>9.0));
			array_push($ar_tests,
				array('orig'=>'g','dst'=>'kg','x'=>3.7,'exp'=>0.0037));
			array_push($ar_tests,
				array('orig'=>'g','dst'=>'g','x'=>'3700.9','exp'=>3700.9));
			array_push($ar_tests,
				array('orig'=>'g','dst'=>'mg','x'=>'37.9','exp'=>37900));

			array_push($ar_tests,
				array('orig'=>'mg','dst'=>'t','x'=>9000000,'exp'=>0.009));
			array_push($ar_tests,
				array('orig'=>'mg','dst'=>'kg','x'=>3001.0,'exp'=>0.003001));
			array_push($ar_tests,
				array('orig'=>'mg','dst'=>'g','x'=>'3700.9','exp'=>3.7009));
			array_push($ar_tests,
				array('orig'=>'mg','dst'=>'mg','x'=>'3700.9','exp'=>3700.9));

			return $ar_tests;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='36dbfa84-6caf-45cf-bf81-626131318dd7'");
		} // catch
	} // test_fd_convert_ct_mass

//------------------------------------------------------------------
	private static function test_fd_convert_ct_density() {
		try {
			$ar_tests=array();

			array_push($ar_tests,
				array('orig'=>'t/(m^3)','dst'=>'t/(m^3)','x'=>'5300','exp'=>5300));
			array_push($ar_tests,
				array('orig'=>'t/(m^3)','dst'=>'kg/(m^3)','x'=>53,'exp'=>53000));
			array_push($ar_tests,
				array('orig'=>'t/(m^3)','dst'=>'kg/l','x'=>53.0,'exp'=>53.0));
			array_push($ar_tests,
				array('orig'=>'t/(m^3)','dst'=>'g/l','x'=>53.0,'exp'=>53000));
			array_push($ar_tests,
				array('orig'=>'t/(m^3)','dst'=>'g/(cm^3)','x'=>53.0,'exp'=>53.0));
			array_push($ar_tests,
				array('orig'=>'t/(m^3)','dst'=>'mg/l','x'=>53.0,'exp'=>53000000));
			array_push($ar_tests,
				array('orig'=>'t/(m^3)','dst'=>'mg/(cm^3)','x'=>53.0,'exp'=>53000));

			array_push($ar_tests,
				array('orig'=>'kg/(m^3)','dst'=>'t/(m^3)','x'=>53.0,'exp'=>0.053));
			array_push($ar_tests,
				array('orig'=>'kg/(m^3)','dst'=>'kg/(m^3)','x'=>'53.0','exp'=>53.0));
			array_push($ar_tests,
				array('orig'=>'kg/(m^3)','dst'=>'kg/l','x'=>53.0,'exp'=>0.053));
			array_push($ar_tests,
				array('orig'=>'kg/(m^3)','dst'=>'g/l','x'=>53.0,'exp'=>53.0));
			array_push($ar_tests,
				array('orig'=>'kg/(m^3)','dst'=>'g/(cm^3)','x'=>53.0,'exp'=>0.053));
			array_push($ar_tests,
				array('orig'=>'kg/(m^3)','dst'=>'mg/l','x'=>53.0,'exp'=>53000));
			array_push($ar_tests,
				array('orig'=>'kg/(m^3)','dst'=>'mg/(cm^3)','x'=>53.0,'exp'=>53.0));

			array_push($ar_tests,
				array('orig'=>'kg/l','dst'=>'t/(m^3)','x'=>53.0,'exp'=>53.0));
			array_push($ar_tests,
				array('orig'=>'kg/l','dst'=>'kg/(m^3)','x'=>53.0,'exp'=>53000.0));
			array_push($ar_tests,
				array('orig'=>'kg/l','dst'=>'kg/l','x'=>'53.0','exp'=>53.0));
			array_push($ar_tests,
				array('orig'=>'kg/l','dst'=>'g/l','x'=>53.0,'exp'=>53000.0));
			array_push($ar_tests,
				array('orig'=>'kg/l','dst'=>'g/(cm^3)','x'=>53.0,'exp'=>53.0));
			array_push($ar_tests,
				array('orig'=>'kg/l','dst'=>'mg/l','x'=>53.0,'exp'=>53000000));
			array_push($ar_tests,
				array('orig'=>'kg/l','dst'=>'mg/(cm^3)','x'=>53.0,'exp'=>53000));

			array_push($ar_tests,
				array('orig'=>'g/l','dst'=>'t/(m^3)','x'=>53.0,'exp'=>0.053));
			array_push($ar_tests,
				array('orig'=>'g/l','dst'=>'kg/(m^3)','x'=>53.0,'exp'=>53));
			array_push($ar_tests,
				array('orig'=>'g/l','dst'=>'kg/l','x'=>53.0,'exp'=>0.053));
			array_push($ar_tests,
				array('orig'=>'g/l','dst'=>'g/l','x'=>'53.0','exp'=>53.0));
			array_push($ar_tests,
				array('orig'=>'g/l','dst'=>'g/(cm^3)','x'=>53.0,'exp'=>0.053));
			array_push($ar_tests,
				array('orig'=>'g/l','dst'=>'mg/l','x'=>53.0,'exp'=>53000));
			array_push($ar_tests,
				array('orig'=>'g/l','dst'=>'mg/(cm^3)','x'=>53.0,'exp'=>53.0));

			array_push($ar_tests,
				array('orig'=>'g/(cm^3)','dst'=>'t/(m^3)','x'=>53.0,'exp'=>53.0));
			array_push($ar_tests,
				array('orig'=>'g/(cm^3)','dst'=>'kg/(m^3)','x'=>53.0,'exp'=>53000.0));
			array_push($ar_tests,
				array('orig'=>'g/(cm^3)','dst'=>'kg/l','x'=>53.0,'exp'=>53.0));
			array_push($ar_tests,
				array('orig'=>'g/(cm^3)','dst'=>'g/l','x'=>53.0,'exp'=>53000));
			array_push($ar_tests,
				array('orig'=>'g/(cm^3)','dst'=>'g/(cm^3)','x'=>'53.0','exp'=>53.0));
			array_push($ar_tests,
				array('orig'=>'g/(cm^3)','dst'=>'mg/l','x'=>53.0,'exp'=>53000000));
			array_push($ar_tests,
				array('orig'=>'g/(cm^3)','dst'=>'mg/(cm^3)','x'=>53.0,'exp'=>53000));

			array_push($ar_tests,
				array('orig'=>'mg/l','dst'=>'t/(m^3)','x'=>53000.0,'exp'=>0.053));
			array_push($ar_tests,
				array('orig'=>'mg/l','dst'=>'kg/(m^3)','x'=>53000.0,'exp'=>53.0));
			array_push($ar_tests,
				array('orig'=>'mg/l','dst'=>'kg/l','x'=>53000.0,'exp'=>0.053));
			array_push($ar_tests,
				array('orig'=>'mg/l','dst'=>'g/l','x'=>53000.0,'exp'=>53.0));
			array_push($ar_tests,
				array('orig'=>'mg/l','dst'=>'g/(cm^3)','x'=>53000.0,'exp'=>0.053));
			array_push($ar_tests,
				array('orig'=>'mg/l','dst'=>'mg/l','x'=>'53000.0','exp'=>53000.0));
			array_push($ar_tests,
				array('orig'=>'mg/l','dst'=>'mg/(cm^3)','x'=>53000.0,'exp'=>53.0));

			array_push($ar_tests,
				array('orig'=>'mg/(cm^3)','dst'=>'t/(m^3)','x'=>53000000.0,'exp'=>53000.0));
			array_push($ar_tests,
				array('orig'=>'mg/(cm^3)','dst'=>'kg/(m^3)','x'=>53000000.0,'exp'=>53000000));
			array_push($ar_tests,
				array('orig'=>'mg/(cm^3)','dst'=>'kg/l','x'=>53000000.0,'exp'=>53000));
			array_push($ar_tests,
				array('orig'=>'mg/(cm^3)','dst'=>'g/l','x'=>53000000.0,'exp'=>53000000));
			array_push($ar_tests,
				array('orig'=>'mg/(cm^3)','dst'=>'g/(cm^3)','x'=>53000000.0,'exp'=>53000));
			array_push($ar_tests,
				array('orig'=>'mg/(cm^3)','dst'=>'mg/l','x'=>53000000.0,'exp'=>53000000000));
			array_push($ar_tests,
				array('orig'=>'mg/(cm^3)','dst'=>'mg/(cm^3)','x'=>'53000000.0','exp'=>53000000));

			return $ar_tests;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='32c11801-6831-4219-9381-626131318dd7'");
		} // catch
	} // test_fd_convert_ct_density

//------------------------------------------------------------------
	private static function test_fd_convert() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ar_testsets=array();

			$ar_tests_mass=sirel_test_sirel_units::test_fd_convert_ct_mass();
			array_push($ar_testsets,$ar_tests_mass);

			$ar_tests_mass=sirel_test_sirel_units::test_fd_convert_ct_length();
			array_push($ar_testsets,$ar_tests_mass);

			$ar_tests_mass=sirel_test_sirel_units::test_fd_convert_ct_density();
			array_push($ar_testsets,$ar_tests_mass);

			foreach ($ar_testsets as $ar_tests ) {
				foreach ($ar_tests as $arht_test) {
					$s_destination_unit=$arht_test['dst'];
					$i_or_s_or_fd=$arht_test['x'];
					$s_origin_unit=$arht_test['orig'];
					$fd_expected=$arht_test['exp'];
					$fd=sirel_units::fd_convert($s_destination_unit,
						$i_or_s_or_fd,$s_origin_unit);

					// One can not really compare floats due to rounding errors.
					$s_x=number_format($fd*1000, 7);
					$s_exp=number_format($fd_expected*1000, 7);
					if($s_x!=$s_exp) {
						$test_case['msg']='$s_destination_unit=='.
							$s_destination_unit.' $i_or_s_or_fd=='.$i_or_s_or_fd.
							' $s_origin_unit=='.$s_origin_unit. '$fd=='.$fd.
							' $fd_expected=='.$fd_expected.
							"\n GUID='563d6882-49fa-4426-8481-626131318dd7'";
						$test_case['line_number']=__LINE__;
						$ar_tc[]=$test_case;
					} // if

				} // foreach
			} // foreach
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='a6c7214c-19f7-4e2a-b281-626131318dd7'");
		} // catch
	} // test_fd_convert


	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_units::test_fd_2_Si();
			$ar_test_results[]=sirel_test_sirel_units::test_fd_convert();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='28d50951-63bf-47c6-a281-626131318dd7'");
		} // catch
	} // selftest

} // class sirel_test_sirel_units

//=========================================================================

