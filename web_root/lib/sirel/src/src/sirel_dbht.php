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
require_once('sirel_core.php');

// ---------------------------------------------------------

// The idea behind the group of classes called sirelDBht
// is that the database based hashtable is a global object
// anyway and there are not that many of them per application.
//
// On the other hand, one wants to avoid parsing the PHP code
// that is not used and one does not always use the database based
// hashtables.
//
// All in all, the sirelDBht group of classes has 2 goals:
// to facilitate to keep the PHP part computationally somewhat lightweight(er)
// by reducing the number of sirelDBhashtable instantiantions and
// to provide comfort at coding.
class sirelDBht_config {
	public static $database_descriptor=NULL; //	instance of sirelDatabaseDescriptor
} // sirelDBht_config

// ---------------------------------------------------------
// It's a convenience wrapper to a database based hashtable,
// the class sirelDBhashtable. In order to use it, one needs to
// initiate the fields of the class sirelDBht_config.
//
// CODE_GENERATION_TEMPLATE_START
class sirelDBht1 {
	private static $b_inited=False;
	private static $dbht_instance=NULL;

	// The 'dbhashtable1' is used as a searchstring in the code generation
	// script. If the 'dbhashtable1' is changed to something else in the
	// template version of this class and the code generation script is
	// not updated, probably flaws are introduced.
	//
	// A hint: please search "RENESSAATOR_SOURCE_START", without the
	// quotes, from the PHP file from where You found this comment.
	private static $s_tablename='dbhashtable1';

	private static function init() {
		try {
			if(sirelDBht1::$b_inited==True) return;
			require_once('sirel_dbhashtable.php');
			sirelDBht1::$dbht_instance=sirelDBhashtable_pool::get_element(sirelDBht1::$s_tablename,
				sirelDBht_config::$database_descriptor);
			sirelDBht1::$b_inited=True;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='cf399234-bcff-4ba9-9537-712021318dd7'");
		} // catch
	} // init

	// To reduce the number of SQL queries, keys are
	// first searched from this hashtable and if the
	// key is not found from here, then the real database
	// is searched. The writing updates both, the
	// database and the content of the  $arht_cache.
	//
	// The values in the $arht_cache can be of string or
	// numeric type.
	private static $arht_cache=array();

	private static $b_sirel_db_loaded=False;
	private static $db_=NULL;
	// Returns a boolean value.
	public static function exists_in_db() {
		try {
			if(sirelDBht1::$b_inited==True) return True;
			if(sirelDBht1::$b_sirel_db_loaded==False) {
				// One must load the sirel_db.php prior to reaching this
				// place here, but one needs to assign a proper value to the
				// sirelDBht_config::$database_descriptor anyway, for which
				// one needs to load the sirel_db.php. Loading it here would
				// be equivalent to reloading it.
				sirelDBht1::$db_=sirelDBgate_pool::get_db(sirelDBht_config::$database_descriptor);
				sirelDBht1::$b_sirel_db_loaded=True;
			} // if
			$b_out=sirelDBht1::$db_->table_exists(sirelDBht1::$s_tablename);
			return $b_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='535a2be8-cd8a-4a44-b337-712021318dd7'");
		} // catch
	} // exists_in_db

	public static function get($s_key) {
		try {
			sirelDBht1::init();
			$x_out=NULL;
			if(array_key_exists($s_key, sirelDBht1::$arht_cache)) {
				$x_out=sirelDBht1::$arht_cache[$s_key];
			} else {
				$x_out=sirelDBht1::$dbht_instance->get($s_key);
				sirelDBht1::$arht_cache[$s_key]=$x_out; // not always strings
			} // else
			return $x_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='2804f742-e396-4c48-9437-712021318dd7'");
		} // catch
	} // get

	public static function has_key($s_key) {
		try {
			sirelDBht1::init();
			$b_out=sirelDBht1::$dbht_instance->has_key($s_key);
			return $b_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='23ab4443-4e02-4fe7-ad37-712021318dd7'");
		} // catch
	} // has_key


	public static function put($s_key,$x_value) {
		try {
			sirelDBht1::init();
			sirelDBht1::$arht_cache[$s_key]=$x_value; // not always strings
			sirelDBht1::$dbht_instance->put($s_key,$x_value);
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='cb74a363-defe-4e36-b137-712021318dd7'");
		} // catch
	} // put

} // sirelDBht1

// CODE_GENERATION_TEMPLATE_END

// RENESSAATOR_BLOCK_START
// RENESSAATOR_BLOCK_ID=block_1
// RENESSAATOR_SOURCE_LANGUAGE=Ruby
// RENESSAATOR_SOURCE_START
// SIREL_CODE_GENERATION=ENV['SIREL_CODE_GENERATION']
// require(SIREL_CODE_GENERATION+"/by_file/sirel_dbht_block1.rb")
// ob_cg_X=SirelCG_sirelDBhtX_multiplier.new
// puts ob_cg_X.multiply(i_number_of_copies=2)
// RENESSAATOR_SOURCE_END
//
// RENESSAATOR_AUTOGENERATED_TEXT_START


// Warning: this text resides in an autogenerated region.

class sirelDBht2 {
	private static $b_inited=False;
	private static $dbht_instance=NULL;

	// The 'dbhashtable2' is used as a searchstring in the code generation
	// script. If the 'dbhashtable2' is changed to something else in the
	// template version of this class and the code generation script is
	// not updated, probably flaws are introduced.
	//
	// A hint: please search "RENESSAATOR_SOURCE_START", without the
	// quotes, from the PHP file from where You found this comment.
	private static $s_tablename='dbhashtable2';

	private static function init() {
		try {
			if(sirelDBht2::$b_inited==True) return;
			require_once('sirel_dbhashtable.php');
			sirelDBht2::$dbht_instance=sirelDBhashtable_pool::get_element(sirelDBht2::$s_tablename,
				sirelDBht_config::$database_descriptor);
			sirelDBht2::$b_inited=True;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='d8005643-e8ce-462d-9137-712021318dd7'");
		} // catch
	} // init

	// To reduce the number of SQL queries, keys are
	// first searched from this hashtable and if the
	// key is not found from here, then the real database
	// is searched. The writing updates both, the
	// database and the content of the  $arht_cache.
	//
	// The values in the $arht_cache can be of string or
	// numeric type.
	private static $arht_cache=array();

	private static $b_sirel_db_loaded=False;
	private static $db_=NULL;
	// Returns a boolean value.
	public static function exists_in_db() {
		try {
			if(sirelDBht2::$b_inited==True) return True;
			if(sirelDBht2::$b_sirel_db_loaded==False) {
				// One must load the sirel_db.php prior to reaching this
				// place here, but one needs to assign a proper value to the
				// sirelDBht_config::$database_descriptor anyway, for which
				// one needs to load the sirel_db.php. Loading it here would
				// be equivalent to reloading it.
				sirelDBht2::$db_=sirelDBgate_pool::get_db(sirelDBht_config::$database_descriptor);
				sirelDBht2::$b_sirel_db_loaded=True;
			} // if
			$b_out=sirelDBht2::$db_->table_exists(sirelDBht2::$s_tablename);
			return $b_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='4e0a0d36-a2a4-4c34-8337-712021318dd7'");
		} // catch
	} // exists_in_db

	public static function get($s_key) {
		try {
			sirelDBht2::init();
			$x_out=NULL;
			if(array_key_exists($s_key, sirelDBht2::$arht_cache)) {
				$x_out=sirelDBht2::$arht_cache[$s_key];
			} else {
				$x_out=sirelDBht2::$dbht_instance->get($s_key);
				sirelDBht2::$arht_cache[$s_key]=$x_out; // not always strings
			} // else
			return $x_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='57e8fa14-6b17-499d-a137-712021318dd7'");
		} // catch
	} // get

	public static function has_key($s_key) {
		try {
			sirelDBht2::init();
			$b_out=sirelDBht2::$dbht_instance->has_key($s_key);
			return $b_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='c3475e06-13fd-4c39-ae37-712021318dd7'");
		} // catch
	} // has_key


	public static function put($s_key,$x_value) {
		try {
			sirelDBht2::init();
			sirelDBht2::$arht_cache[$s_key]=$x_value; // not always strings
			sirelDBht2::$dbht_instance->put($s_key,$x_value);
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='60edcd2b-4a7e-412f-a437-712021318dd7'");
		} // catch
	} // put

} // sirelDBht2

// 

// Warning: this text resides in an autogenerated region.

class sirelDBht3 {
	private static $b_inited=False;
	private static $dbht_instance=NULL;

	// The 'dbhashtable3' is used as a searchstring in the code generation
	// script. If the 'dbhashtable3' is changed to something else in the
	// template version of this class and the code generation script is
	// not updated, probably flaws are introduced.
	//
	// A hint: please search "RENESSAATOR_SOURCE_START", without the
	// quotes, from the PHP file from where You found this comment.
	private static $s_tablename='dbhashtable3';

	private static function init() {
		try {
			if(sirelDBht3::$b_inited==True) return;
			require_once('sirel_dbhashtable.php');
			sirelDBht3::$dbht_instance=sirelDBhashtable_pool::get_element(sirelDBht3::$s_tablename,
				sirelDBht_config::$database_descriptor);
			sirelDBht3::$b_inited=True;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='2f4e4e1e-4977-4728-8137-712021318dd7'");
		} // catch
	} // init

	// To reduce the number of SQL queries, keys are
	// first searched from this hashtable and if the
	// key is not found from here, then the real database
	// is searched. The writing updates both, the
	// database and the content of the  $arht_cache.
	//
	// The values in the $arht_cache can be of string or
	// numeric type.
	private static $arht_cache=array();

	private static $b_sirel_db_loaded=False;
	private static $db_=NULL;
	// Returns a boolean value.
	public static function exists_in_db() {
		try {
			if(sirelDBht3::$b_inited==True) return True;
			if(sirelDBht3::$b_sirel_db_loaded==False) {
				// One must load the sirel_db.php prior to reaching this
				// place here, but one needs to assign a proper value to the
				// sirelDBht_config::$database_descriptor anyway, for which
				// one needs to load the sirel_db.php. Loading it here would
				// be equivalent to reloading it.
				sirelDBht3::$db_=sirelDBgate_pool::get_db(sirelDBht_config::$database_descriptor);
				sirelDBht3::$b_sirel_db_loaded=True;
			} // if
			$b_out=sirelDBht3::$db_->table_exists(sirelDBht3::$s_tablename);
			return $b_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='8fa69a27-8813-4ab0-b437-712021318dd7'");
		} // catch
	} // exists_in_db

	public static function get($s_key) {
		try {
			sirelDBht3::init();
			$x_out=NULL;
			if(array_key_exists($s_key, sirelDBht3::$arht_cache)) {
				$x_out=sirelDBht3::$arht_cache[$s_key];
			} else {
				$x_out=sirelDBht3::$dbht_instance->get($s_key);
				sirelDBht3::$arht_cache[$s_key]=$x_out; // not always strings
			} // else
			return $x_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='531eff98-d6e6-426b-b627-712021318dd7'");
		} // catch
	} // get

	public static function has_key($s_key) {
		try {
			sirelDBht3::init();
			$b_out=sirelDBht3::$dbht_instance->has_key($s_key);
			return $b_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='39b4083d-3954-4836-8127-712021318dd7'");
		} // catch
	} // has_key


	public static function put($s_key,$x_value) {
		try {
			sirelDBht3::init();
			sirelDBht3::$arht_cache[$s_key]=$x_value; // not always strings
			sirelDBht3::$dbht_instance->put($s_key,$x_value);
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='cc9e7a3c-671a-4abf-9127-712021318dd7'");
		} // catch
	} // put

} // sirelDBht3

// 

// RENESSAATOR_AUTOGENERATED_TEXT_END
// RENESSAATOR_BLOCK_END




// ---------------------------------------------------------

