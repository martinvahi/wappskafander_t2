<?php
//-------------------------------------------------------------------------
// Copyright (c) 2013, martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// All rights reserved.
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

$s_path_lib_sirel=constant('s_path_lib_sirel');
require_once($s_path_lib_sirel.'/src/src/sirel_lang.php');

//-------------------------------------------------------------------------

//
// http://longterm.softf1.com/specifications/progfte/
//
// The version 0 of the ProgFTE implementation is fundamentally flawed
// and exists here only for backward compatibility reasons.
//
// If (Hash.new)["nice_key"]="Cariba|" and
// the pillarSubstString=="baba", then the ProgFTE is
//
// 1|||baba|||"nice_key"|||Caribababa|||
//
// There is an issue, how to reverse-translate
// the "bababa" part of the "Caribababa".
// Should it be "Cari|ba" or "Cariba|".
//
// The good news is that one can distinguish
// the version 1, of ProgFTE from the new one and simply improve
// the ProgFTE libraries of the real world application,
// without any need to convert saved data. The old version,
// the one in this blog post, always starts with a number,
// but the new version always starts with a letter "v",
// like "v<format_version>".
class sireProgFTE_v1 {

	private static $s_lc_header='v1|0|';
	private static $s_lc_metadata_keyvaluepair='|0||0||';

	public static function ht2ProgFTE(&$arht_in) {
		try {
			if (sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_array', $arht_in);
				$ar_keys=array_keys($arht_in);
				$x_value=null;
				foreach ($ar_keys as $x_key) {
					$x_value=$arht_in[$x_key];
					sirelLang::assert_type(__FILE__,
						__LINE__, __CLASS__,__FUNCTION__,
						'sirelTD_is_mbstring', $x_key);
					sirelLang::assert_type(__FILE__,
						__LINE__, __CLASS__,__FUNCTION__,
						'sirelTD_is_mbstring', $x_value);
				} // foreach
			} // if
			$ar_keys=array_keys($arht_in);
			$s_value=NULL;

			$arht_s_all=array(); // speed-hack
			$arht_s_all[]=sireProgFTE_v1::$s_lc_header;
			// The +1 is due to the metadata keyvalue pair.
			$arht_s_all[]=''.(count($ar_keys)+1).
				sireProgFTE_v1::$s_lc_metadata_keyvaluepair;

			$s_0='';
			$s_1='|';
			foreach($ar_keys as $s_key) {
				$arht_s_all[]=$s_0.mb_strlen($s_key).$s_1.($s_key.$s_1);
				$s_value=$arht_in[$s_key];
				$arht_s_all[]=$s_0.mb_strlen($s_value).$s_1.
					($s_value.$s_1);
			} // foreach
			$s_progte=s_concat_array_of_strings($arht_s_all);
			return $s_progte;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='ccb52c40-0de3-473e-a307-c12021318dd7'");
		} // catch
	} // ht2ProgFTE

//-------------------------------------------------------------------------

	public static function ProgFTE2ht(&$s_progfte_candidate) {
		try {
			$s_singlepillar='|';
			$ar_0=sirelLang::bisectStr($s_progfte_candidate,
				$s_singlepillar);
			$s_0=$ar_0[1]; // v[\d]+ or [\d]+
			$s_1=sirelLang::s_sar($s_0, 0, 1);
			if (sirelLang::str1EqualsStr2($s_1, 'v')!=True) {
				sirelThrowLogicException(__FILE__,
					__LINE__,__CLASS__.'->'.__FUNCTION__.
					': The string does not conform to '.
					'the ProgFTE_v1 format specriication. '.
					"\n".' $s_progfte_candidate=='.
					$s_progfte_candidate.
					"\n GUID='17e24113-e967-4ee1-8507-c12021318dd7'");
			} // if
			$s_1=sirelLang::s_sar_rubystyle($s_0, 1, (-1));
			if (sirelLang::str1EqualsStr2($s_1, '1')!=True) {
				sirelThrowLogicException(__FILE__,
					__LINE__,__CLASS__.'->'.__FUNCTION__.
					': The string does not conform to '.
					'the ProgFTE_v1 format specriication. '.
					"\n".' $s_progfte_candidate=='.
					$s_progfte_candidate.
					"\n GUID='38dc4463-2846-4d31-a707-c12021318dd7'");
			} // if
			//v1|<mode>|<number of key-value pairs>|<metadata key-value pair>|<the rest of the key-value pairs>
			$ar_1=sirelLang::bisectStr($ar_0[2],$s_singlepillar);
			$s_mode=$ar_1[1];
			$ar_0=sirelLang::bisectStr($ar_1[2],$s_singlepillar);
			$i_n_of_keyvaluepairs=intval($ar_0[1]);
			$s_tail=$ar_0[2];
			$arht_out=array();
			$s_key=NULL;
			$s_value=NULL;
			$i_str_length=NULL;
			for($i=0;$i<$i_n_of_keyvaluepairs;$i++) {
				$ar_0=sirelLang::bisectStr($s_tail,$s_singlepillar);
				$i_str_length=intval($ar_0[1]);
				$s_tail=$ar_0[2];
				$s_key=mb_substr($s_tail, 0, $i_str_length);
				// The "+1" is due to the "|" at the end of the string record.
				$s_tail=sirelLang::s_sar_rubystyle($s_tail,
					($i_str_length+1), (-1));
				//-----key-end-value-start----
				$ar_1=sirelLang::bisectStr($s_tail,$s_singlepillar);
				$i_str_length=intval($ar_1[1]);
				$s_tail=$ar_1[2];
				$s_value=mb_substr($s_tail, 0, $i_str_length);
				if ($i<($i_n_of_keyvaluepairs-1)) {
					// The tail would be "" at the very
					// last iteration.
					$s_tail=sirelLang::s_sar_rubystyle($s_tail,
						($i_str_length+1), (-1));
				} // if
				//-----value--end-------------
				if (0<$i) {
					// The very first key-value
					// pair represents the metadata,
					// wihch is omitted from the
					// $arht_out.
					$arht_out[$s_key]=$s_value;
				} // if
			} // for
			return $arht_out;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				's_progfte_candidate=='.$s_progfte_candidate.
				"\n GUID='27b82b93-8f02-490e-9107-c12021318dd7'");
		} // catch
	} // ProgFTE2ht

} //class sireProgFTE_v1

//=========================================================================


