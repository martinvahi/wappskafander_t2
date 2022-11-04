<?php
//------------------------------------------------------------------------
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
//
//------------------------------------------------------------------------
// This file is part of the sirel_core_exc.php .
//=========================================================================

function sirel_core_exc_bonnet_dump_err_2_GUID_trace_GUID_stack_txt_t1($s_err) {
	try {
		$s_path_lib_sirel=constant('s_path_lib_sirel');
		$s_fp_dev_tools_config=$s_path_lib_sirel.
			'/src/dev_tools/etc/sirel_dev_tools_settings.php';
		if(file_exists($s_fp_dev_tools_config)!=True) {
			return;
		} // if
		require_once($s_fp_dev_tools_config);
		$s_fp_info=sirel_dev_tools_settings::$s_fp_mmmv_devel_tools_info_bash;
		if(file_exists($s_fp_info)!=True) {
			return;
		} // if
		$s_cmd=$s_fp_info.' get_config '.
			's_GUID_trace_errorstack_file_path ;';
		$s_fp_candidate=''.shell_exec($s_cmd);
		if(mb_strlen($s_fp_candidate)<2) {
			return;
		} // if
		$s_fp=mb_ereg_replace("\n",'',
			mb_ereg_replace(' ','',$s_fp_candidate));
		$ob_file= fopen($s_fp, 'w');
		fwrite($ob_file, $s_err);
		fclose($ob_file);
	}catch (Exception $err_exception) {
		sirelBubble_t2($err_exception,
			" GUID='92e7d3f5-02d5-4dad-b11e-b32320418dd7'");
	} // catch
} // sirel_core_exc_bonnet_dump_err_2_GUID_trace_GUID_stack_txt_t1

//=========================================================================


