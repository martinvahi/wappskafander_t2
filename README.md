                         wappskafander_t2
===========================================================================

The name, "wappskafander_t2" is a made up word that is derived from
"web application", "skafander", "type 2", where the "skafander"
stands for "space suit" in Estonian.

The wappskafander_t2 is a tool for publishing PHP based
web applications as if they were end-user-executable
stand-alone applications.

wappskafander_t2 is POSIX-specific and will probably never be
supported on Windows.

Project home: http://technology.softf1.com/wappskafander_t2/

Honorable mention: http://www.hiawatha-webserver.org/


---------------------------------------------------------------------------
##                         Requirements
---------------------------------------------------------------------------

Ruby 2.0 or newer, Bash, POSIX compliant operating system, cmake, 
awk/GNU awk/gawk, 
a command-line tool named "php-cgi" (might be in Debian package php5-cgi), 
common C/C++ build tools.



---------------------------------------------------------------------------
##                       Getting Started
---------------------------------------------------------------------------

The

    ./bin/build_or_rebuild_core.bash

builds the (POSIX compliant) operating system specific parts of the
wappskafander_t2 core. The

    ./etc/wappskafander_t2_configuration.bash

contains a few simplistic run-time parameters.


    php-cgi -b 127.0.0.1:<the port from the config file>

starts the PHP FastCGI server at port the_port_from_the_config_file.
An example of an iptables rule:

    iptables --append INPUT ! --source 127.0.0.1 --protocol tcp --destination-port 5555 -j DROP

where the 5555 designates the PHP FastCGI server port number from the

    ./etc/wappskafander_t2_configuration.bash

The

    ./bin/start_or_restart_server.bash

starts the server. The

    ./bin/stop_server.bash

only effects the wappskafander_t2 instance
that runs at the port that is listed at the

    ./etc/wappskafander_t2_configuration.bash



---------------------------------------------------------------------------
##              wappskafander_t2 Developer Perspective
---------------------------------------------------------------------------

All comments for developers reside at

    ./bonnet/wappskafander_t2_core/dev_tools/COMMENTS.txt



---------------------------------------------------------------------------
##                        Historical Notes
---------------------------------------------------------------------------

The name and project, wappskafander_t2, is a succession of
the project wappskafander_t1

http://technology.softf1.com/wappskafander_t1/

, which is meant for running Java servlets in stead of PHP applications.

The PHP interpreter does come with its own, built-in, web
server, but in September 2013 the

http://php.net/manual/en/features.commandline.webserver.php

reads:

    "This web server is designed for developmental purposes only, and 
    should not be used in production.
    Requests are served sequentially."

---------------------------------------------------------------------------
##                     License (The BSD License)
---------------------------------------------------------------------------

Copyright 2010, martin.vahi@softf1.com that has an
Estonian personal identification code of 38108050020.
All rights reserved.

Redistribution and use in source and binary forms, with or
without modification, are permitted provided that the following
conditions are met:

*   Redistributions of source code must retain the above copyright
    notice, this list of conditions and the following disclaimer.
*   Redistributions in binary form must reproduce the above copyright
    notice, this list of conditions and the following disclaimer
    in the documentation and/or other materials provided with the
    distribution.
*   Neither the name of the Martin Vahi nor the names of its
    contributors may be used to endorse or promote products derived
    from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND
CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES,
INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR
CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.



===========================================================================
