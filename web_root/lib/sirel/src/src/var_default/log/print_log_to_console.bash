#!/bin/bash


#-----logmessagefiles--existence--verification--start----

B_LOGMESSAGES_FOLDER_EXISTS="false"
#------
if [ -e ./individual_log_entries ]; then
if [ -d ./individual_log_entries ]; then
    B_LOGMESSAGES_FOLDER_EXISTS="true"
fi
else
    B_LOGMESSAGES_FOLDER_EXISTS="false"
fi
#------
if [ "$B_LOGMESSAGES_FOLDER_EXISTS" == "false" ]; then
    mkdir -p ./individual_log_entries 
    if [ -e ./individual_log_entries ]; then
    if [ -d ./individual_log_entries ]; then
        B_LOGMESSAGES_FOLDER_EXISTS="true"
    fi
    else
        B_LOGMESSAGES_FOLDER_EXISTS="false"
        echo ""
        echo "It seems that the folder ./individual_log_entries "
        echo "does not exist. "
        echo "pwd==`pwd`"
        echo ""
        exit;
    fi
fi

#-----logmessagefiles--existence--verification--end------

PHP_SCRIPT="
        \$s_path_lib_sirel=realpath('./../../../../');
        define(\"s_path_lib_sirel\",\$s_path_lib_sirel);
        require_once(\$s_path_lib_sirel.'/src/src/sirel_core.php');
        sirelSiteConfig::\$log_folder='$PWD'; 
        \$s_0=sirelLogger::to_s(); 
        \$s_1=mb_ereg_replace('<br/>',\"\\n\",\$s_0); 
        \$s_0=mb_ereg_replace('<p>','',\$s_1); 
        \$s_1=mb_ereg_replace('</p>','',\$s_0); 
        print(\$s_1); 
"

#echo "$PHP_SCRIPT" ;
php5 -r "$PHP_SCRIPT" ;

