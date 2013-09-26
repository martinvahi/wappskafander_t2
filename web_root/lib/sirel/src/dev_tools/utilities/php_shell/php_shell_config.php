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

class php_shell_config {
	//public static $b_activated=TRUE;
	public static $b_activated=FALSE;
	public static $s_path_lib_sirel='';// assigned below
	public static $ar_paths_to_PHP_files_that_get_loaded_by_default=array();

	public static $s_security_mode='naive_password_authentication';
	//public static $s_security_mode='public_access';

	public static $s_password=''; // assigned below, if needed
} // class php_shell_config

php_shell_config::$s_path_lib_sirel=realpath('./../../../../');
//php_shell_config::$s_password='471';

// To get at least somewhat meaningful feedback from the web browser, this 
// php file should not catch any of its flaws, nor thorow them.
// By using 
//             realpath('./').'../the_rest_of_th_path'
// in stead of
//             realpath('./../the_rest_of_th_path')
// one might get at least some semifeasible feedback about
// a faulty file path.
array_push(php_shell_config::$ar_paths_to_PHP_files_that_get_loaded_by_default,
		realpath(php_shell_config::$s_path_lib_sirel).'/src/src/sirel.php');
?>

