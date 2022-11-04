<?php
// ------------------------------------------------------------------------
// Copyright (c) 2011, martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// All rights reserved.

// Redistribution and use in source and binary forms, with or
// without modification, are permitted provided that the following
// conditions are met:

// * Redistributions of source code must retain the above copyright
// notice, this list of conditions and the following disclaimer.
// * Redistributions in binary form must reproduce the above copyright
// notice, this list of conditions and the following disclaimer
// in the documentation and/or other materials provided with the
// distribution.
// * Neither the name of the Martin Vahi nor the names of its
// contributors may be used to endorse or promote products derived
// from this software without specific prior written permission.

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
// ------------------------------------------------------------------------
require_once('sirel_operators.php');

//-------------------------------------------------------------------------
function func_sirel_operators_set_1_percentage_a_is_of_b($x_a,$x_b) {
	try {
		$op_out=new sirelOP();
		if($x_b==0) {
			$op_out->s_msg='$x_b==0, but a division by zero is not defined.';
			return $op_out;
		} // if
		$fd1=sirel_operators::exec('/', $x_a,$x_b);
		$fd2=sirel_operators::exec('*', 100.0,$fd1);
		$op_out->value=$fd2;
		$op_out->sb_failure='f';
		return $op_out;
	}catch (Exception $err_exception) {
		sirelBubble_t2($err_exception,
			" GUID='84e7b029-fe94-4dfb-af88-222021318dd7'");
	} // catch
} // func_sirel_operators_set_1_percentage_a_is_of_b

sirel_operators::declare_binary_operator_for_numbers('func_sirel_operators_set_1_percentage_a_is_of_b',
	'percentage_a_is_of_b');

//-------------------------------------------------------------------------
function func_sirel_operators_set_1_sirelOP_to_s_with_sb_failure_handling_t1($x_sirelOP_instance,
	$s_if_failure) {
	try {
		$op=&$x_sirelOP_instance;
		$s_out=NULL;
		if($op->sb_failure=='t') {
			$s_out=''.$s_if_failure;
		} else {
			$s_out=sirel_operators::exec('to_s',$op->value);
		} // else
		return $s_out;
	}catch (Exception $err_exception) {
		sirelBubble_t2($err_exception,
			" GUID='3edd475d-f803-4dd6-b288-222021318dd7'");
	} // catch
} // func_sirel_operators_set_1_sirelOP_to_s_with_sb_failure_handling_t1

$op=new sirelOP();
sirel_operators::declare_operator('func_sirel_operators_set_1_sirelOP_to_s_with_sb_failure_handling_t1',
	'sirelOP_to_s_with_sb_failure_handling_t1',$op,'sample_of_s_if_falure');

//-------------------------------------------------------------------------
function func_sirel_operators_set_1_sirelOP_round_with_sb_failure_handling_t1($ob_sirelOP_instance,
	// sirel_operators::exec has a workaround to a nasty bug that is related
	// to this function and resides in the PHP implementation. Make sure
	// that the bug workaround code is updated whenever this function is
	// renamed.
	$i_number_of_decimal_digits_to_round_to) {
	try {
		if(sirelSiteConfig::$debug_PHP) {
			sirelLang::assert_type(__FILE__, __LINE__,
				__CLASS__, __FUNCTION__,
				'sirelTD_is_class_sirelOP', $ob_sirelOP_instance,
				"\n GUID='60070f41-2d49-4778-b588-222021318dd7'");
			$op=&$ob_sirelOP_instance;
			if($op->sb_failure=='f') {
				$sirelOP_value=$op->value;
				sirelLang::assert_type(__FILE__, __LINE__,
					__CLASS__, __FUNCTION__,
					'sirelTD_is_float', $sirelOP_value,
					"\n GUID='6917e75a-f73c-42e2-b188-222021318dd7'");
			} // if
			sirelLang::assert_type(__FILE__, __LINE__,
				__CLASS__, __FUNCTION__,
				'sirelTD_is_int', $i_number_of_decimal_digits_to_round_to,
				"\n GUID='4eab6cdf-340a-4b02-b388-222021318dd7'");
			sirelLang::assert_range(0,'<=',
				$i_number_of_decimal_digits_to_round_to, '*',
				42, '$i_number_of_decimal_digits_to_round_to',
				"\n GUID='20491424-32a8-4c5d-a388-222021318dd7'");
		} // if
		$op=&$ob_sirelOP_instance;
		$op_out=new sirelOP();
		$op_out->sb_failure=&$op->sb_failure;
		$op_out->s_msg=&$op->s_msg;
		if($op->sb_failure=='t') {
			$op_out->value=&$op->value;
		} else {
			$op_out->value=round($op->value,
				$i_number_of_decimal_digits_to_round_to);
		} // else
		return $op_out;
	}catch (Exception $err_exception) {
		sirelBubble_t2($err_exception,
			" GUID='6f6cf51f-e42b-4918-b388-222021318dd7'");
	} // catch
} // func_sirel_operators_set_1_sirelOP_round_with_sb_failure_handling_t1

$op=new sirelOP();
sirel_operators::declare_operator('func_sirel_operators_set_1_sirelOP_round_with_sb_failure_handling_t1',
	'sirelOP_round_with_sb_failure_handling_t1',$op,42);

//-------------------------------------------------------------------------
// Always returns a string. Throws on regex and other errors.
function func_sirel_operators_set_1_replace_by_regex_t1($s_regex,
	$s_new_string,$s_haystack) {
	try {
		if(sirelSiteConfig::$debug_PHP) {
			sirelLang::assert_type(__FILE__, __LINE__,
				__CLASS__, __FUNCTION__,
				'sirelTD_is_mbstring', $s_regex,
				"\n GUID='fcbe8358-ebac-4b85-9388-222021318dd7'");
			sirelLang::assert_type(__FILE__, __LINE__,
				__CLASS__, __FUNCTION__,
				'sirelTD_is_mbstring', $s_new_string,
				"\n GUID='1f3a1ef3-dc97-48e1-8388-222021318dd7'");
			sirelLang::assert_type(__FILE__, __LINE__,
				__CLASS__, __FUNCTION__,
				'sirelTD_is_mbstring', $s_haystack,
				"\n GUID='06e0e848-165a-45e1-a288-222021318dd7'");
		} // if
		$s_hay=''.$s_haystack;
		$s_out=mb_ereg_replace($s_regex,$s_new_string,$s_hay);
		sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
			__FUNCTION__, 'sirelTD_is_mbstring', $s_out,
			'The mb_ereg_replace returns a boolean value, '.
			'the operation fails.');
		return $s_out;
	}catch (Exception $err_exception) {
		sirelBubble_t2($err_exception,
			" GUID='d87bd031-be77-4127-b288-222021318dd7'");
	} // catch
} // func_sirel_operators_set_1_replace_by_regex_t1

$s='ee';
$s1='x';
$s2='y';
sirel_operators::declare_operator('func_sirel_operators_set_1_replace_by_regex_t1',
	'replace_by_regex_t1',$s,$s1,$s2);

//-------------------------------------------------------------------------
// Returns a sirelOP instance, where the value field has been
// converted to a string.
//
// Usually the $s_dot_character=='.', but it's not set to a default value
// to avoid some string instantiations and to make sure that it is explicitly 
// set to a locale specific version of it.
function func_sirel_operators_set_1_sirelOP_fd_to_s_t1($ob_sirelOP_instance,
	$i_number_of_decimal_digits_to_round_to, $s_if_failure,$s_dot_character) {
	try {
		if(sirelSiteConfig::$debug_PHP) {
			sirelLang::assert_type(__FILE__, __LINE__,
				__CLASS__, __FUNCTION__,
				'sirelTD_is_class_sirelOP', $ob_sirelOP_instance,
				"\n GUID='bbcf376c-a9ec-490a-8378-222021318dd7'");
			$op=&$ob_sirelOP_instance;
			if($op->sb_failure=='f') {
				$sirelOP_value=$op->value;
				sirelLang::assert_type(__FILE__, __LINE__,
					__CLASS__, __FUNCTION__,
					'sirelTD_is_float', $sirelOP_value,
					"\n GUID='982fa85d-7b9e-495f-8378-222021318dd7'");
			} // if
			sirelLang::assert_type(__FILE__, __LINE__,
				__CLASS__, __FUNCTION__,
				'sirelTD_is_int', $i_number_of_decimal_digits_to_round_to,
				"\n GUID='11144c07-2dbc-413a-9678-222021318dd7'");
			sirelLang::assert_range(0,'<=',
				$i_number_of_decimal_digits_to_round_to, '*',
				42, '$i_number_of_decimal_digits_to_round_to',
				"\n GUID='25e8e859-33aa-434c-9578-222021318dd7'");
			sirelLang::assert_type(__FILE__, __LINE__,
				__CLASS__, __FUNCTION__,
				'sirelTD_is_mbstring', $s_if_failure,
				"\n GUID='5b433c94-3bc2-4222-b678-222021318dd7'");
			sirelLang::assert_type(__FILE__, __LINE__,
				__CLASS__, __FUNCTION__,
				'sirelTD_is_mbstring', $s_dot_character,
				"\n GUID='7bb45a43-2d53-445a-b278-222021318dd7'");
		} // if
		$op=&$ob_sirelOP_instance;
		$s_out='';
		if($op->sb_failure=='t') {
			$s_out=&$s_if_failure;
		} else {
			$fd_1=sirel_operators::exec('to_fd',$op->value);
			$fd_2=round($fd_1,$i_number_of_decimal_digits_to_round_to);
			$s_hay=sirel_operators::exec('to_s',$fd_2);
			$s_regex='[.]';
			$s_2=mb_ereg_replace($s_regex,$s_dot_character,$s_hay);
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
					__FUNCTION__, 'sirelTD_is_mbstring', $s_2,
					'The mb_ereg_replace returns a boolean value, '.
					'the operation fails.');
			} // if
			$s_out=&$s_2;
		} // else
		return $s_out;
	}catch (Exception $err_exception) {
		sirelBubble_t2($err_exception,
			" GUID='84fe4458-08ce-4fb8-9378-222021318dd7'");
	} // catch
} // func_sirel_operators_set_1_sirelOP_fd_to_s_t1

$op=new sirelOP();
$s1='x';
$s2='y';
sirel_operators::declare_operator('func_sirel_operators_set_1_sirelOP_fd_to_s_t1',
	'sirelOP_fd_to_s_t1',$op,42,$s1,$s2);

//-------------------------------------------------------------------------
// Reverses the order of characters in a string.
// 'Abc' -> 'cbA'
function func_sirel_operators_set_1_str_reverse($s_in) {
	try {
		if(sirelSiteConfig::$debug_PHP) {
			sirelLang::assert_type(__FILE__, __LINE__,
				__CLASS__,__FUNCTION__,
				'sirelTD_is_mbstring',$s_in,
				"\n GUID='922df227-7967-412e-9278-222021318dd7'");
		} // if
		$s_out=sirelLang::s_reverse_string($s_in);
		return $s_out;
	}catch (Exception $err_exception) {
		sirelBubble_t2($err_exception,
			" GUID='47b47559-15fe-42fa-a378-222021318dd7'");
	} // catch
} // func_sirel_operators_set_1_str_reverse

$s='ab';
sirel_operators::declare_operator('func_sirel_operators_set_1_str_reverse',
	'str_reverse',$s);

//-------------------------------------------------------------------------


