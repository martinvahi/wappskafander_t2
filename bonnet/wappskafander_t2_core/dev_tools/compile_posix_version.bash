#!/usr/bin/env bash
#==========================================================================
# The following line is a spdx.org license label line:
# SPDX-License-Identifier: BSD-3-Clause-Clear
#--------------------------------------------------------------------------

S_FP_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
S_FP_DEV_TOOLS="$S_FP_DIR"
S_FP_CORE="`cd $S_FP_DEV_TOOLS/../; pwd`"
S_FP_PROJECT_BONNET="`cd $S_FP_CORE/../; pwd`"
S_FP_PROJECT_HOME="`cd $S_FP_PROJECT_BONNET/../; pwd`"

export WAPPSKAFANDER_T2_AC_X_SKIP_WEB_SERVER_STARTUP="t"
source $S_FP_PROJECT_HOME/bin/start_or_restart_server.bash # to get common ENVs

S_FP_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
#--------------------------------------------------------------------------

func_exit_if_not_on_path_t1() {
    local S_LOCAL_VARIABLE="`which $S_TMP`"
    if [ "$S_LOCAL_VARIABLE" == "" ]; then
        echo ""
        echo "Command \"$S_TMP\" could not be found from the PATH. "
        echo "The $S_APPLICATION_NAME depends on the availability of the command \"$S_TMP\". "
        echo "No action taken."
        echo ""
        exit;
    fi
} # func_exit_if_not_on_path_t1


func_exit_if_file_missing_t1() {
    if [ ! -e $S_TMP ]; then
        echo ""
        echo "The $S_APPLICATION_NAME depends on the existence of a file"
        echo "    $S_TMP , "
        echo "but the file or folder with that path does not exist."
        echo "No action taken."
        echo ""
        exit;
    fi
    if [ -d $S_TMP ]; then
        echo ""
        echo "The $S_APPLICATION_NAME depends on the existence of a file"
        echo "    $S_TMP , "
        echo "A folder with that path exists, but it must be a file."
        echo "No action taken."
        echo ""
        exit;
    fi
} # func_exit_if_file_missing_t1


#--------------------------------------------------------------------------

S_APPLICATION_NAME="wappskafander_t2"
S_TMP="ruby"
    func_exit_if_not_on_path_t1
S_TMP="cmake"
    func_exit_if_not_on_path_t1
S_TMP="make"
    func_exit_if_not_on_path_t1
S_TMP="gcc"
    func_exit_if_not_on_path_t1
S_TMP="gunzip"
    func_exit_if_not_on_path_t1
S_TMP="tar"
    func_exit_if_not_on_path_t1
S_TMP="nice"
    func_exit_if_not_on_path_t1

#--------------------------------------------------------------------------
S_FP_PROJECT_WEB_ROOT="$S_FP_PROJECT_HOME/web_root"
S_FP_PROJECT_ETC="$S_FP_PROJECT_HOME/etc"

S_FP_WEB_SERVER_POSIX="$S_FP_WEB_SERVER/compiled_for_posix"

export CFLAGS=" -mtune=native -ftree-vectorize "
export CXXFLAGS="$CFLAGS"

#source $S_FP_PROJECT_HOME/etc/server_configuration.bash 
#--------------------------------------------------------------------------
rm -fr $S_FP_TMP
mkdir -p $S_FP_TMP

rm -fr $S_FP_WEB_SERVER_POSIX
mkdir -p $S_FP_WEB_SERVER_POSIX

#--------------------------------------------------------------------------

cd $S_FP_WEB_SERVER_POSIX
cp $S_FP_WEB_SERVER/2013_09/originals/hiawatha-9.2.tar.gz $S_FP_WEB_SERVER_POSIX/

gunzip ./hiawatha-9.2.tar.gz 
tar -xf ./hiawatha-9.2.tar
rm -f ./hiawatha-9.2.tar
mkdir ./v_9_2
cd ./hiawatha-9.2
nice -n10 cmake -DENABLE_CACHE=OFF -DENABLE_RPROXY=OFF -DENABLE_XSLT=OFF -DCMAKE_INSTALL_PREFIX:PATH=$S_FP_WEB_SERVER_POSIX/v_9_2
nice -n10 make
nice -n10 make install
cd ..
rm -fr ./hiawatha-9.2

#==========================================================================
