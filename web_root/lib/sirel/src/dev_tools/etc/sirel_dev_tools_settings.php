<?php
// ------------------------------------------------------------------------

class sirel_dev_tools_settings{
        // https://github.com/martinvahi/mmmv_devel_tools
	public static $s_fp_mmmv_devel_tools_home='';
	public static $s_fp_mmmv_devel_tools_info_bash='';
} // class sirel_dev_tools_settings

sirel_dev_tools_settings::$s_fp_mmmv_devel_tools_home=getenv('MMMV_DEVEL_TOOLS_HOME');
sirel_dev_tools_settings::$s_fp_mmmv_devel_tools_info_bash=sirel_dev_tools_settings::$s_fp_mmmv_devel_tools_home.'/src/api/mmmv_devel_tools_info.bash'

?>

