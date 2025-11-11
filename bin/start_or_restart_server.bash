#!/usr/bin/env bash
#==========================================================================
# The following line is a spdx.org license label line:
# SPDX-License-Identifier: BSD-3-Clause-Clear
#--------------------------------------------------------------------------

S_FP_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

# The following environment variables are "exported"
# to make them available to other Bash scripts that
# include (the Bash keyword: "source") this script.
# This script is included to others because it's
# the central location for the definitions of those
# environment variables.

export S_FP_RUBY="`which ruby`"
export S_FP_PROJECT_HOME="`cd $S_FP_DIR/../; pwd`"
export S_FP_PROJECT_BONNET="$S_FP_PROJECT_HOME/bonnet"
export S_FP_CORE="$S_FP_PROJECT_BONNET/wappskafander_t2_core"
export S_FP_ENGINE="$S_FP_CORE/script_components/engine.rb"
export S_FP_DEV_TOOLS="$S_FP_CORE/dev_tools"
export S_FP_TMP="$S_FP_CORE/tmp"
export S_FP_WEB_SERVER="$S_FP_CORE/web_server"
export S_FP_WEB_SERVER_ETC="$S_FP_WEB_SERVER/etc"
export S_FP_WEB_SERVER_ETC_TEMPLATES="$S_FP_WEB_SERVER/etc_templates"
export S_FP_PROJECT_WEB_ROOT="$S_FP_PROJECT_HOME/web_root"
export S_FP_PROJECT_ETC="$S_FP_PROJECT_HOME/etc"
export S_FP_WEB_SERVER_POSIX="$S_FP_CORE/web_server/compiled_for_posix"
export S_FP_WEB_SERVER_POSIX_EXEC="$S_FP_WEB_SERVER_POSIX/v_9_2/sbin/hiawatha"

export S_FP_MIMETYPES_ORIG="/etc/mime.types"
export S_FP_MIMETYPES_LINK="$S_FP_WEB_SERVER_ETC/mime.types"
export S_FP_MIMETYPES_LINK_2="$S_FP_WEB_SERVER_ETC/mimetype.conf"

#--------------------------------------------------------------------------

if [ ! -e $S_FP_WEB_SERVER_ETC ]; then
    mkdir -p $S_FP_WEB_SERVER_ETC
fi

if [ ! -e $S_FP_TMP ]; then
    mkdir -p $S_FP_TMP
fi

#--------------------------------------------------------------------------

if [ -e $S_FP_MIMETYPES_ORIG ]; then
    if [ -d $S_FP_MIMETYPES_ORIG ]; then
        echo ""
        echo "$S_FP_MIMETYPES_ORIG is a folder, but it is expected to be a file."
        echo "Server NOT started."
        echo "GUID=='2256891f-dc63-4b5e-a25d-a35221b0b9e7'"
        echo ""
        exit
    fi
else
    echo ""
    echo "$S_FP_MIMETYPES_ORIG not found. Server NOT started."
    echo "GUID=='c762f13a-2551-42e7-945d-a35221b0b9e7'"
    echo ""
    exit
fi

rm -f $S_FP_MIMETYPES_LINK # should the existing symbolic link be broken
ln -s $S_FP_MIMETYPES_ORIG $S_FP_MIMETYPES_LINK
rm -f $S_FP_MIMETYPES_LINK_2
ln -s $S_FP_MIMETYPES_ORIG $S_FP_MIMETYPES_LINK_2

#--------------------------------------------------------------------------

S_SUFFIX_1="`$S_FP_RUBY $S_FP_ENGINE suffix_1`"
S_WS_LINK_NAME="wappskafander_t2_$S_SUFFIX_1"

#--------------------------------------------------------------------------

# The "ps -A w w" also lists grep, because the wappskaf... is  one
# of the grep parameters. To eliminate the grep from the list, the
# grep parameter, "wappblabla",
# is converted to [w][a][p][p][b][l][a][b][l][a][b][l][a]
S_TMP_1="`$S_FP_RUBY -e \"s=\\\"$S_WS_LINK_NAME\\\";s_0=\\\"\\\"; s.length.times{|i| s_0<<(\\\"[\\\"+s[i..i]+\\\"]\\\")}; puts(s_0)\"`"
S_TMP_2="`ps -A w w | grep -E $S_TMP_1 | awk '{ gsub(/^[^0-9]+/, ""); print }' | awk '{ gsub(/[^0-9].+/, ""); print } '`"
if [ "$S_TMP_2" != "" ]; then
    kill -s 5 $S_TMP_2
    sleep 1s
    # Rechecks, if the process is still alive.
    S_TMP_2="`ps -A w w | grep -E $S_TMP_1 | awk '{ gsub(/^[^0-9]+/, ""); print }' | awk '{ gsub(/[^0-9].+/, ""); print } '`"
    if [ "$S_TMP_2" != "" ]; then
        kill -s 9 $S_TMP_2
    fi
fi

#--------------------------------------------------------------------------

if [ "$WAPPSKAFANDER_T2_AC_X_SKIP_WEB_SERVER_STARTUP" != "t" ]; then
    if [ ! -e "$S_FP_WEB_SERVER_POSIX" ]; then
        S_FP_00="`pwd`"
        cd $S_FP_DEV_TOOLS
        bash ./compile_posix_version.bash
        sync ; wait ;
        cd $S_FP_00
    fi
fi
#--------------------------------------------------------------------------

func_exit_wpskf_if_len_greater_than_zero_t1() {
    if [ "$S_TMP_1" != "" ]; then
        echo ""
        echo "$S_TMP_1"
        echo ""
        echo "Wappskafander_t2 web server is not started."
        echo "GUID=='6e929250-ae70-4b41-b15d-a35221b0b9e7'"
        echo ""
        rm -f $S_FP_WS_LINK
        exit
    fi
} # func_exit_wpskf_if_len_greater_than_zero_t1


if [ "$WAPPSKAFANDER_T2_AC_X_SKIP_WEB_SERVER_STARTUP" != "t" ]; then
    #---------------------------
    S_FP_WS_LINK="$S_FP_WEB_SERVER_POSIX/v_9_2/sbin/$S_WS_LINK_NAME"
    rm -f $S_FP_WS_LINK
    ln -s $S_FP_WEB_SERVER_POSIX_EXEC $S_FP_WS_LINK
    #---------------------------
    S_TMP_1="`$S_FP_RUBY $S_FP_ENGINE gen_server_config 2>&1 `"
    func_exit_wpskf_if_len_greater_than_zero_t1
    #---------------------------
    S_TMP_1="`$S_FP_WS_LINK -c $S_FP_WEB_SERVER_ETC 2>&1 | \
              grep -v '/v_9_2/var/log/hiawatha/' | \
              grep -v '/v_9_2/var/run/hiawatha.pid' `"
    S_TMP_2="`echo $S_TMP_1 | grep Error`"
    if [ "$S_TMP_2" == "" ]; then
        echo "$S_TMP_1"
        S_TMP_1="`$S_FP_RUBY $S_FP_ENGINE ip_address`"
        S_TMP_2="`$S_FP_RUBY $S_FP_ENGINE port_number`"
        echo ""
        echo -e "\e[32mWeb server location: $S_TMP_1:$S_TMP_2 \e[39m"
        echo ""
    else
        echo ""
        echo -e "\e[31mERROR\e[39m:"
        echo "$S_TMP_1"
        echo "GUID=='41ebfe9c-6bab-4095-a25d-a35221b0b9e7'"
        echo ""
    fi
    # The link name depends on IP-address and port, which
    # might differ at the next run.
    # To avoid the accumulation of unused links:
        rm -f $S_FP_WS_LINK
    # right here, before the exit.
    #
    # The IP-address and port based process naming
    # scheme is used to avoid killing wappskafander_t2
    # instances that were not started by this copy of
    # the wappskafander_t2 deployment deliverables.
fi
#==========================================================================
