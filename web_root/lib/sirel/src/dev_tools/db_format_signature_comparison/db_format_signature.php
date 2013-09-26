<?php
//=======================================================================
$s_lc_failure='failure';
$s_linebreak="\n";
$b_use_HTML_linebreaks=True;
if($b_use_HTML_linebreaks) {
	$s_linebreak='<br/>';
} // if
$s_lc_verbatim_start='------verbatim--start------';
$s_lc_verbatim_end='------verbatim--end--------';
$s_status='sirel_db_format_signature_operation_status: '; // for autointerpretation
try {
	//------subject-to-application-specific-editing--start----
	$application_root=NULL;
//$s_deployment_type='live_system';
	$s_deployment_type='2ikeselaulja';
//$s_deployment_type='alpha_or_beta_testing';
	switch ($s_deployment_type) {
		case '2ikeselaulja':
			$application_root='/home/zornilemma/Projektid/enda2ri/'.
				'tooted/aktiivsed/InspektoVeeb/inspekto/inspekto/src';
			break;
		case 'live_system':
		// The constant here is defined due to a difference in
		// sirel versions and the application config files.
			define('s_path_lib_sirel',$s_path_lib_sirel);
			$application_root='/home/zornilemma/Projektid/enda2ri/'.
				'tooted/aktiivsed/InspektoVeeb/inspekto/inspekto/src';
			break;
		case 'alpha_or_beta_testing':
			break;
		default:
			throw new Exception(
			__CLASS__.'->'.__FUNCTION__.
				': There\'s no branch for '.
				'$s_deployment_type=='.$s_deployment_type.'.');
			break;
	} // switch
	require_once($application_root.'/etc/site_configuration.php');
	//------subject-to-application-specific-editing--end------
	$s_path_lib_sirel=constant('s_path_lib_sirel');
	require_once($s_path_lib_sirel.'/src/src/sirel.php');
	$ob_html=new sirelHTMLPage();
	if(sirelSiteConfig::$debug_PHP==False) {
		$s_msg=$s_status.$s_lc_failure.$s_linebreak.
			$s_linebreak.
			'For the sake of security this tool works only, '.$s_linebreak.
			'if the sirelSiteConfig::$debug_PHP==True. '.$s_linebreak.
			'The assumption is that live sites '.
			'are never run in the debug mode.';
		$ob_html->add_2_ar_body($s_msg);
		echo($ob_html->to_s());
		exit;
	} // if
	//------
	$s_type='';
	try {
		$s_type=sirelLang::type_2_s($db1_descriptor);
		sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
			__FUNCTION__,
			'sirelTD_is_class_sirelDatabaseDescriptor',
			$db1_descriptor);
	}catch (Exception $err_exception) {
		$s_msg='It seems that the $db1_descriptor is either '.
			'missing or of a wrong type. <br/>'.
			'$s_type=='.$s_type.
			'</br/>'.
			'</br/>'.
			'Of curce, it could also be something else:<br/>'.
			'<br/>: '.
			$err_exception;
		echo $s_msg;
		exit;
	} // catch
	$s_1=$s_status.' success '.$s_linebreak.
		$s_linebreak.
		$s_lc_verbatim_start.$s_linebreak.
		'<pre>'.sirel_db_format_signature::s_get($db1_descriptor,False).
		'</pre>'.$s_linebreak.
		$s_lc_verbatim_end;
	$ob_html->add_2_ar_body($s_1);
	echo($ob_html->to_s());
}catch (Exception $err_exception) {
	echo($s_status.$s_lc_failure.$s_linebreak.
		$s_linebreak.$err_exception);
} // catch

//=======================================================================
?>
