#!/usr/bin/env bash
#==========================================================================

S_FP_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

export WAPPSKAFANDER_T2_AC_X_SKIP_WEB_SERVER_STARTUP="t"

source $S_FP_DIR/start_or_restart_server.bash

#==========================================================================

