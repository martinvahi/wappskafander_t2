<?php
//-------------------------------------------------------------------------
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
//-------------------------------------------------------------------------

require_once('sirel_lang.php');


// The whole reason for the existence of this wrapper class is
// that if the Memcached daemon becomes unaccessible
// duering the operation, then the PHP routines that interact with
// the Memcached daemon through this class can try to get by
// without using the Memcached.
//
// The wrapper class, sirelMemcached, is a singleton, because
// this way the web application creates only one connection to
// the Memcached per web browser sent request.
//
// From security point of view it might be useful to keep in mind
// that any application that has access to the Memcached daemon
// can read and overwrite anything stored to the daemon.
//
// This class is not thread-safe.
class sirelMemcached {

	private static $memcached_instance_;

//-------------------------------------------------------------------------

	// Implements a singleton pattern for a connection to the memcached
	// daemon. Returns NULL, if the memcached is not in use.
	// Retunrns the "raw" Memcached instance, if everything went well.
	private static function get_memcached() {
		// The current implementation assumes that there is only one thread per
		// page visit. This method has to be refactored, if that assumption
		// changes.
		try {
			if(!sirelSiteConfig::$memcached_in_use) {
				return NULL;
			} // if
			if(sirelMemcached::$memcached_instance_!=NULL) {
				return sirelMemcached::$memcached_instance_;
			}
			sirelMemcached::$memcached_instance_ = new Memcache;
			sirelMemcached::$memcached_instance_->connect(sirelSiteConfig::$memcached_host,
				sirelSiteConfig::$memcached_port);
			//
			// Some usage examples:
			// $s='blabla';
			// $memcache->set('lion',$s);
			// $s2=$memcache->get('lion');
			//
			//
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='5b3281a1-3052-4ba6-8450-812021318dd7'");
		} // catch
	} // get_memcached

//-------------------------------------------------------------------------

	private function __construct() {
		sirelLang::assert_sirel_Memcached_is_in_use(__FILE__,__LINE__,
			__CLASS__,__FUNCTION__);
		$x=sirelMemcached::get_memcached();
		if(is_null($x)) {
			sirelThrowLogicException(__FILE__, __LINE__,
				__CLASS__.' constructor: could not establish a '.
				'connection to the Memcached daemon.');
		} // if
	} // constructor

	private static $self_;

//-------------------------------------------------------------------------

	// Returns NULL, if an instance could not be created.
	// The idea is that if a connection to the Memcached daemon fails,
	// then the client code has an opportunity to do its job without
	// using the cache.
	public static function get_instance() {
		if(is_null($this->self_)) {
			try {
				$this->self_=new sirelMemcached();
			} catch (Exception $err_exception) {
				// It might be that the Memcached is not acessible.
				$this->self_=NULL;
			} // catch
		} // if
		return $this->self_;
	} // get_instance

//-------------------------------------------------------------------------

	// Returns True on success and False on failure.
	public function set($key,$value, $life_in_seconds_max=3600) {
		sirelLang::assert_sirel_Memcached_is_in_use(__FILE__,__LINE__,
			__CLASS__,__FUNCTION__);
		sirelLang::assert_type_CSL_free(__FILE__,__LINE__,__CLASS__,
			__FUNCTION__, 'sirelTD_is_int', $life_in_seconds_max);
		$success=False;
		try {
			sirelMemcached::$memcached_instance_->set($key,$value);
			$success=True;
		} catch (Exception $err_exception) {
			// It might be that the Memcached is not acessible.
		} // catch
		return $success;
	} // set

//-------------------------------------------------------------------------

	// Returns its value by modifying the sirelop_instance.
	public function get($key,&$sirelop_instance) {
		sirelLang::assert_sirel_Memcached_is_in_use(__FILE__,__LINE__,
			__CLASS__,__FUNCTION__);
		sirelOPInit($sirelop_instance);
		try {
			$sirelop_instance->value=sirelMemcached::$memcached_instance_->get($key);
			$sirelop_instance->sb_failure='f';
		} catch (Exception $err_exception) {
			// It might be that the Memcached is not acessible.
			$sirelop_instance->value=NULL;
		} // catch
	} // get

//-------------------------------------------------------------------------

	// Returns True on success and False on failure.
	public function delete($key) {
		sirelLang::assert_sirel_Memcached_is_in_use(__FILE__,__LINE__,
			__CLASS__,__FUNCTION__);
		$success=False;
		try {
			sirelMemcached::$memcached_instance_->delete($key);
			$success=True;
		} catch (Exception $err_exception) {
			// It might be that the Memcached is not acessible.
		} // catch
		return $success;
	} // delete

//-------------------------------------------------------------------------

} // class sirelMemcached
//-------------------------------------------------------------------------

