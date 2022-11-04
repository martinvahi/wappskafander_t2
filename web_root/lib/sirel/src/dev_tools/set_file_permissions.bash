#!/bin/bash
#==========================================================================
if [ "$SIREL_HOME" == "" ]; then
        # The SIREL_HOME is expected to point to 
        # ./../../../sirel
        # i.e. the path of the file that contains the comment that 
        # You are currently reading is:
        #     $SIREL_HOME/src/dev_tools/set_file_permissions.bash
        echo"" 
        echo"" 
        echo "Mandatory environment variable, SIREL_HOME, has not been set. "
        echo"" 
        echo"" 
        exit;
fi
#--------------------------------------------------------------------------

chmod -f -R 0755  ./../../../sirel

# The server process must be able to write to the <path at the next line>
chmod 0777 ./../bonnet/tmp

chmod 0755 ./../bonnet/tmp/stub.txt



