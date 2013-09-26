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
// http://martin.softf1.com/g/n//a2/doc/progfte/index.html
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
class sireProgFTE_v0 {

	private static function ht2ProgFTE_impl_part_2(&$arht_in,
		&$string_to_substitute_single_pillars_within_the_ht_keys_and_values) {
		try {
			$s_triplepillar='|||';
			$s_emptystring='';
			$s_pillarsubst=&$string_to_substitute_single_pillars_within_the_ht_keys_and_values;
			$arht_s_out=array();
			$arht_s_out[]=(count($arht_in).$s_triplepillar).
				($s_pillarsubst.$s_triplepillar);
			$keys=array_keys($arht_in);
			$value;
			$s=NULL;
			$s_1=NULL;
			$s_regex_1='[|]{1}';
			// The preg_replace is not UTF-8 safe.
			foreach($keys as $key) {
				$s=mb_ereg_replace($s_regex_1, $s_pillarsubst, $key);
				if(is_bool($s)) {
					sirelThrowLogicException(__FILE__, __LINE__,
						__CLASS__.'->'.__FUNCTION__.': '.
						'Pillar replacement failed. $key=="'.$key.
						'"  $s_trp=="'.$s_pillarsubst.'".');
				} // if
				$s_1=$s.$s_triplepillar;
				$arht_s_out[]=$s_1;
				$value=$arht_in[$key];
				$s=mb_ereg_replace($s_regex_1, $s_pillarsubst, $value);
				if(is_bool($s)) {
					sirelThrowLogicException(__FILE__, __LINE__,
						__CLASS__.'->'.__FUNCTION__.': '.
						'Pillar replacement failed. $value=="'.$value.
						'"  $s_trp=="'.$s_pillarsubst.'".');
				} // if
				$s_1=$s.$s_triplepillar;
				$arht_s_out[]=$s_1;
			} // foreach
			$s_out=s_concat_array_of_strings($arht_s_out);
			return $s_out;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='7fcf02e4-27af-4469-a2f7-c12021318dd7'");
		} // catch
	} // ht2ProgFTE_impl_part_2


	public static function ht2ProgFTE(&$arht_in) {
		try {
			if (sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
					__FUNCTION__, 'sirelTD_is_array', $arht_in);
			} // if
			$keys=array_keys($arht_in);
			$value;
			$arht_s_all=array(); // only for a speed-hack
			foreach($keys as $key) {
				$value=$arht_in[$key];
				$arht_s_all[]=$key;
				$arht_s_all[]=$value;
			} // foreach
			$s_all=s_concat_array_of_strings($arht_s_all);
			$s_trpsubsts=sirelLang::generateMissingNeedlestring_t1($s_all);
			$s_progte=sireProgFTE_v0::ht2ProgFTE_impl_part_2($arht_in,$s_trpsubsts);
			return $s_progte;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='9687fe1f-00b3-4408-a4f7-c12021318dd7'");
		} // catch
	} // ht2ProgFTE

//-------------------------------------------------------------------------

	public static function ProgFTE2ht(&$a_string) {
		try {
			$s_triplepillar='|||';
			$ar1=sirelLang::snatchNtimes($a_string,$s_triplepillar, 2);
			$arht_length=(int)$ar1[0];
			$s_trp_regex=&$ar1[1];
			$ar=array();
			if($arht_length<1) {
				return $ar;
			} // if
			$i2=($arht_length+1)*2;
			$ar2=sirelLang::snatchNtimes($a_string,
				$s_triplepillar, $i2);
			$i1=0;
			$s_key=null;
			$s_value=null;
			// The preg_replace is not UTF-8 safe.
			$s_lc_singlepillar='|';
			for($i1=1;$i1<=$arht_length;$i1++) {
				$s_key=mb_ereg_replace($s_trp_regex,
					$s_lc_singlepillar, $ar2[$i1*2]);
				$s_value=mb_ereg_replace($s_trp_regex,
					$s_lc_singlepillar, $ar2[$i1*2+1]);
				$ar[$s_key]=$s_value;
			} // while
			return $ar;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				' $a_string=='.$a_string.
				"\n GUID='1eab0851-871a-470f-82f7-c12021318dd7'");
		} // catch
	} // ProgFTE2ht

} //class sireProgFTE_v0

//=========================================================================

