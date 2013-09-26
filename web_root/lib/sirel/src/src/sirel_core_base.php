<?php
//------------------------------------------------------------------------
// Copyright (c) 2009, martin.vahi@softf1.com that has an
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
// This file is part of the sirel_core.php and should be
// used only by using "require_once('sirel_core.php')".
//------------------------------------------------------------------------

class sirelPair {
	public $a_;
	public $b_;

	public function  __construct($a=NULL,$b=NULL) {
		$this->a_=&$a;
		$this->b_=&$b;
	} // constructor
} // class sirelPair

class sirelOP {
	public $sb_failure='t'; // The default value of 't' must not be changed
	public $s_msg='';
	public $value=NULL;
} // class sirelOP

function sirelOPInit(&$op) {
	try {
		if(get_class($op)=='sirelOP') {
			$op->sb_failure='t';
			$op->s_msg='';
			$op->value=NULL;
		} else {
			throw new Exception('File '.__FILE__.' line '.
				__LINE__.': op was of type '.get_class($op).
				', but only sirelOP (and sirelOP) is (are) accepted.'.
				"\n GUID='40c4d941-b621-4914-9d58-91e020519dd7'");
		} // else
	} catch (Exception $err_exception) {
		throw new Exception('sirelOPInit in file '.
			__FILE__.' received some weird instance of '.
			'class '.get_class($op)." <br/>".
			'Exception message: '.$err_exception->getMessage().
			"\n GUID='2a807acd-70d7-4097-9458-91e020519dd7'");
	} // catch
} // sirelOPInit


// The default field values are overridden at
// the sirel_core_configuration.php .
class sirelSiteConfig {
	// The initiations of those fields is expected to
	// take place in a separate, site specific, config file.
	//
	// The site_URL==NULL is also used as a flag to
	// indicate thet the constants here are not yet initialized.
	public static $site_titleprefix=''; // a string
	public static $site_URL=NULL; // a string

	// The $debug_PHP is overridden in the sirel_engine_configureation.php
	public static $debug_PHP=TRUE;
	//public static $debug_PHP=FALSE;

	public static $debug_JavaScript=TRUE;
	//public static $debug_JavaScript=FALSE;

	public static $i_application_javascript_side_version=NULL;

	public static $file_path_2_raudrohi_home_folder=NULL;
	public static $file_path_2_kibuvits_home_folder=NULL;

	// If the file_path_2_raudrohi_home_folder!=NULL, the
	// value of the i_raudrohi_version is
	public static $i_raudrohi_version=NULL;

	public static $s_sirel_version='<Subject to overwriting within the sirel_core_configuration.php.>';

	public static $language; // a string


	// The checksum seed can be anything, as long as it's a nonempty string.
	// If the Memcached is in use, then the checksums are used for
	// veryfying that the content at the daemon has not been tampered with.
	// For example, various UI texts are cached, which creates quite a tempting
	// situation for, innocent, but dirty, jokes. ;-)
	// One should also modify the value of the seed every time one updates
	// the UI texts at the resource files. For the sake of convenience (and
	// attackers delight) all data stored to Memchaced cache by this web
	// application is dismissed when any part of it is found to be corrupted.
	public static $sitewide_checksum_seed='whatever'; // Not in use yet.
	public static $s_root_username='none'; // a string
	public static $s_root_configfile_password='guess what'; // a string
	public static $b_root_configfile_password_overrides_root_password_in_database=TRUE;//boolean

	// If the client does not communicate with the server for the
	// given number of seconds in a row, the server considers the client
	// to be logged out.
	//
	// The 259200 is a temporary hack to hide a JavaScript side,
	// Raudrohi JavaScript Library related,
	// flaw that one wants to delay fixing.
	public static $loginsession_idle_lifetime_in_seconds=259200; //an integer, seconds

	// Memcached Setup:
	// (http://www.danga.com/memcached/ )
	// (http://ee2.php.net/manual/en/ref.memcache.php )
	//
	// A security warning: anything stored to the Memcached can be
	// read and, in some cases, tampered with by any application that
	// has access to the Memcached instance.
	//
	//public static $memcached_in_use=TRUE; // a boolean
	public static $memcached_in_use=FALSE; // a boolean
	public static $memcached_host; // a string
	public static $memcached_port; // an integer

	public static $javascript_side_ajax_timeout_=1800; // an integer, seconds
	public static $b_use_content_delivery_networks_for_JavaScript_dependency_libs=FALSE;

	// One has to make sure that duering a log-on the data
	// that the client sends to the server, can be used only
	// once. Otherwise an attacker, who listens to the conversation,
	// can log on by resending the overheard data to the server.
	//
	// Session IDs that contain date that is older than the
	// $session_id_next_lifetime are discharded, i.e.
	// considered to be already 'used up'. Session IDs that are
	// younger than the $session_id_next_lifetime
	// are saved to database at a successful logon. The reason, why
	// the $session_id_next_lifetime is used at all
	// is to make it possible to discharge some of the records at
	// the database table, to limit the necessary size of the database table.
	//
	// The JavaScript side asks a new value for
	// the raudrohi.settings.session_id_next
	// before its current value gets older than the
	// $session_id_next_lifetime.
	public static $session_id_next_lifetime=16000000; // seconds

	// Unfortunately it's quite tricky or at least
	// expensive to reliably figure out the server side OS in PHP.
	// Allowed_values: windows, unix
	public static $operating_system;

	// The things that are too site specific to be listed here as
	// separate config parameters.
	public static $various=array();
	public static $log_folder=null;
	public static $tmp_folder=null;
	public static $ui_messages_folder=null; // a string
	public static $s_fp_angervaks_entry_parent_dir=''; // a string

	public static function partialreset2defaults($s_path_lib_sirel) {
		if (!defined('s_path_lib_sirel')) {
			throw(new Exception("\nPHP constant s_path_lib_sirel ".
				"has not been defined. \n".
				'GUID="5fd9f85b-19be-4e92-a358-91e020519dd7"'."\n"));
		} // if
		$s_path_lib_sirel=constant('s_path_lib_sirel');
		sirelSiteConfig::$log_folder=$s_path_lib_sirel.
			'/src/src/var_default/log';
		// In the case of failed login attempts there's a random delay.
		// It's between login_delay_min seconds
		// and login_delay_max seconds. The delay is meant to make brute
		// force password cracking unfeasible. During a DOS attack the
		// system's response time might depend on the validity of a username.
		// As the usernames might reveal organizational structure, it
		// makes sense to protect them. The reason, why a random delay
		// length is preferential is that unlike a constant delay length
		// it somewhat distorts the outside view of the system load.
		sirelSiteConfig::$various['login_delay_min']=0.5;
		sirelSiteConfig::$various['login_delay_max']=2.5;
	} // partialreset2defaults


	public static function determine_server_operating_system_type() {
		$s=php_uname('s');
		$s1=mb_convert_case($s,MB_CASE_LOWER);
		$s_out=null;
		switch ($s1) {
			case 'linux':
				$s_out='unix';
				break;
			case 'windows':
				$s_out='windows';
				break;
			case 'winnt':
				$s_out='windows';
				break;
			case 'bsd':
				$s_out='unix';
				break;
			case 'freebsd':
				$s_out='unix';
				break;
			case 'netbsd':
				$s_out='unix';
				break;
			case 'openbsd':
				$s_out='unix';
				break;
			default:
				throw new Exception(
				__CLASS__.'->'.__FUNCTION__.
					': There\'s no branch for '.
					'$s1=='.$s1.'.'.
					"\n GUID='bb6df44c-8a37-4a79-a358-91e020519dd7'");
				break;
		} // switch
		return $s_out;
	} // determine_server_operating_system_type

} // class sirelSiteConfig

if(defined('s_path_lib_sirel')!=True) {
	$s_msg= ' defined("s_path_lib_sirel")!=True'.
		"\n".
		' The idea is that the application "main" PHP file contains'.
		' a line like define("s_path_lib_sirel",realpath("./../../"));'.
		' where the "./../../" or whatever other path points to the folder'.
		' that contains the sirel.php';
	// The real reason for using the PHP "constant" system for the
	// sirel path is that as of PHP 5.2 the
	// require_once(<path to file>) is faulty and does not work
	// with relative paths, if A includes B, which
	// includes C and C "requires once" by using relative paths.
	throw new Exception($s_msg.
		"\n GUID='271e5a25-5cbe-48c3-9558-91e020519dd7'");
} // if

// TODO: improve the path verification of the constant s_path_lib_sirel.
$sirel_impl_s_path_lib_sirel_candidate=constant('s_path_lib_sirel');
if($sirel_impl_s_path_lib_sirel_candidate=='') {
	$s_msg= ' $s_path_lib_sirel=="" (an empty string)'.
		"\n".
		' The idea is that the application "main" PHP file contains'.
		' a line like define("s_path_lib_sirel",realpath("./../../"));'.
		' where the "./../../" or whatever other path points to the folder'.
		' that contains the folder ./src that '.
		'in turn contains the sirel.php .';
	// sirel components that reside in subfolders, for example, the
	// ./bonnet, rely on the sirelSiteConfig::$various['s_path_lib_sirel'].
	throw new Exception($s_msg.
		"\n GUID='b13e3d31-357d-4550-a258-91e020519dd7'");
} // if
sirelSiteConfig::$log_folder=$sirel_impl_s_path_lib_sirel_candidate.
	'/src/src/var_default/log';
sirelSiteConfig::$tmp_folder=$sirel_impl_s_path_lib_sirel_candidate.
	'/src/src/bonnet/tmp';
sirelSiteConfig::$various['sirel_impl_s_fp_php_ini']=$sirel_impl_s_path_lib_sirel_candidate.
	'/src/src/bonnet/etc/php.ini';
sirelSiteConfig::$various['javascript_side_checksum_seed']='This_string_is_'.
	'Concated_to_the_Raw_Password_and_UsernaMe_before_hashiNg';
sirelSiteConfig::$operating_system=sirelSiteConfig::determine_server_operating_system_type();

// Due to the lack of proper reflection in the PHP 5.2 it's
// pretty much hell to find out, whwether a class
// or a variable has been defined. So, one possible hack is to use the
// "defined constants".
define('b_sirelSiteConfig_defined',True);


// It's in here in stead of the sirel_db.php because
// it does not make sense to parse the whole sirel_db.php
// at database based application pages that do not use a database.
class sirelDatabaseDescriptor {
	// The reason, why the fields are not static is that
	// some web applications might need to use more than one
	// database.
	public $hostname_; // for example, 'localhost'
	public $port_; // a string
	public $username_;
	public $password_;
	public $db_name_;
	public $db_type_; // a string
	public $various_=array();

	public function __construct() {
		// The skip_existence_checks parameter is optional. If it is
		// missing, the web application behaves as if it existed and had
		// a value of False. If skip_existence_checks==False, the existence
		// of a database object is checked every time before the
		// database object is accessed. If the database object is missing,
		// but the skip_existence_checks==False, the database object will be
		// created automatically. The benefit of setting the 'skip_existence_checks'
		// to True is that the number of SQL queries is reduced about 50%.
		$db1_descriptor->various_['skip_existence_checks']=False;
	} // constructor
} // class sirelDatabaseDescriptor


// The Apatche settings and gzip module influence
// the effectiveness of the flushing.
//
// Just A reminder: The idea is that the header with additional
// resource(JavaScript files, CSS files) URL's can be sent away,
// to the client, while the rest of the page is still being
// assembled. This allows the client to start downloading the
// resources sooner. The sirelHTMLPage->to_s(...) methods illustrate
// that case.
function sirelFlush() {
	flush();
	ob_flush();
	ob_end_flush();
} // function sirelFlush()


// bloat due to PHP interpreter warnings.
function sirel_code_bloat_due_to_interpreter_warnings_t1($x_in) {
	$s_out='';
	if(is_bool($x_in)) {
		if($x_in) {
			$s_out='TRUE';
		}else {
			$s_out='FALSE';
		} // else
	} else {
		if(is_float($x_in)) {
			$s_out=''.(float)$x_in;
		} else {
			if(is_int($x_in)) {
				$s_out=''.(int)$x_in;
			} else {
				if(is_string($x_in)) {
					$s_out=''.(string)$x_in;
				} else {
					$s_out='<flawed again. '.
						" GUID='317708dd-aa62-4b45-b358-91e020519dd7'";
				} // else
			} // else
		} // else
	} // else
	return $s_out;
} // sirel_code_bloat_due_to_interpreter_warnings_t1

