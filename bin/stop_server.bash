#!/usr/bin/env bash
#==========================================================================
# The following line is a spdx.org license label line:
# SPDX-License-Identifier: BSD-3-Clause-Clear
#--------------------------------------------------------------------------

S_FP_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

export WAPPSKAFANDER_T2_AC_X_SKIP_WEB_SERVER_STARTUP="t"

source $S_FP_DIR/start_or_restart_server.bash

#==========================================================================

