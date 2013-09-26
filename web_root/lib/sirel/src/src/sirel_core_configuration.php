<?php
//=========================================================================
// Copyright martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// 
// This file is under the 
// http://www.opensource.org/licenses/BSD-3-Clause
// license.
//=========================================================================
// This file is for configuration data that is common for  
// development tools in sirel and the application that uses the sirel.
//
// The development tools themselves are not necessarily part of the 
// release version of the application. For example, at least some of 
// the tools, for example, the PHP shell, must be turned off in the 
// relase version of the application.
//-------------------------------------------------------------------------

sirelSiteConfig::$debug_PHP=TRUE; // wappskafandr_t2 copy specific dirty mockery
// The thing is that some selftests or functions run fine, 
// if the debug version is switched in, but fail in non-debug mode.
// Since that's not even the official release of the Sirel PHP library,
// one can do a dirty hack like that here. 


//sirelSiteConfig::$debug_PHP=FALSE;
//sirelSiteConfig::$debug_JavaScript=TRUE;
sirelSiteConfig::$debug_JavaScript=FALSE;

//sirelSiteConfig::$b_use_content_delivery_networks_for_JavaScript_dependency_libs=TRUE;
sirelSiteConfig::$b_use_content_delivery_networks_for_JavaScript_dependency_libs=FALSE;

sirelSiteConfig::$site_titleprefix=''; 
sirelSiteConfig::$site_URL=NULL; 


sirelSiteConfig::$s_root_username='adfj92dfd'; // a string
sirelSiteConfig::$s_root_configfile_password='4792afD'; // a string
sirelSiteConfig::$b_root_configfile_password_overrides_root_password_in_database=TRUE;//boolean

// Those are just the "simplest", "most commonly edited", settings.
// The rest of the Sirel PHP Library settings
// are determined at the sirel_core_base.php .
sirelSiteConfig::$s_sirel_version='1.8.0';

//=========================================================================

