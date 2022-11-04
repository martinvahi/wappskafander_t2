#                         wappskafander_t2
===========================================================================

The name, "wappskafander_t2" is a made up word that is derived from
"web application", "skafander", "type 2", where the "skafander"
stands for "space suit" in Estonian.

The wappskafander_t2 is a tool for publishing PHP based
web applications as if they were end-user-executable
stand-alone applications. 

wappskafander_t2 is Linux/BSD-specific and will probably never be
supported on Windows. It MIGHT run on the Windows Linux layer, the
Windows Subsystem for Linux, the WSL.

Project home: http://technology.softf1.com/wappskafander_t2/

The wappskafander_t2 includes a copy of the Hiawatha web server:
http://www.hiawatha-webserver.org/


---------------------------------------------------------------------------
##                            Warning
---------------------------------------------------------------------------

As of 2022_11 this "branch" of the wappskafander_t2 will not be 
incrementally updated. The current version does seem to work,
with the exception of one bug that is described at the config file

    (The bug is that comments in the config file are 
     not always treated as comments and an out-commented value 
     might be used in stead of a non-outcommented value.)
    ./etc/wappskafander_t2_configuration.bash

Future versions will require a total rewrite of the
Bash scripts and Ruby scripts, because the ones in the current
version is a mess. It was kind of polished according to my
skills, when I(Martin.Vahi@softf1.com) created this project,
but by my 2022 standards it's a nasty mess that I won't 
incrementally update, with the exception of this comment here and 
a few other comments in the project. As of 2022_10 I see this project 
as a usable "blob" with a nice command line interface that 
consists of 3 "function calls":

    ./bin/build_or_rebuild_core.bash
    ./bin/start_or_restart_server.bash 
    ./bin/stop_server.bash

For example, the "blob" might be used for serving HTML from 
a Virtual Private Server (VPS) or from some Raspberry_Pi like computer
that runs Linux.

---------------------------------------------------------------------------
##                         Requirements
---------------------------------------------------------------------------

Initially the wappskafander_t2 was used with PHP5, but it MIGHT work 
with PHP7. It has been tested to work with Ruby ("ruby -v") 

    ruby 3.1.2p20 (2022-04-12 revision 4491bb740a) [x86_64-linux]

on ("uname -a")

    Linux host1652785178-177 5.4.189-1-pve #1 SMP PVE 5.4.189-1 (Wed, 11 May 2022 07:10:20 +0200) x86_64 GNU/Linux

Once upon a time it worked with Ruby version 2.0 . The list of 
requirements includes:

* Bash
* Linux or BSD
* cmake
* GNU_awk/gawk
* a command-line tool named "php-cgi" (might be in Debian package php5-cgi)
* common C/C++ build tools (GCC/LLVM, Make, etc.)
* optionally FastCGI, which is required for using PHP


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

Sometimes it might be beneficial to use an iptables wrapper named 
ufw ("Uncomplicated Firewall") in stead of working with iptables directly.
https://launchpad.net/ufw

The

    ./bin/start_or_restart_server.bash

starts the server. The

    ./bin/stop_server.bash

only effects the wappskafander_t2 instance
that runs at the port that is listed at the

    ./etc/wappskafander_t2_configuration.bash


---------------------------------------------------------------------------
##               How to use wappskafander_t2 at port 80
---------------------------------------------------------------------------

The wappskafander_t2 MIGHT be used in conjunction with the 
"authbind" utility, which MIGHT be available from Linux/BSD 
standard package collection. authbind usage "nano-tutorial" as Bash code:

    # As root:
        echo "WhatEver" >> /etc/authbind/byport/80
        chown FooUser      /etc/authbind/byport/80
        chmod 0700         /etc/authbind/byport/80
    #
    # As FooUser:
        authbind --deep /path/to/wappskafander_t2/bin/start_or_restart_server.bash
        # and at the web server's own configuration id est
        # /path/to/wappskafander_t2/etc/wappskafander_t2_configuration.bash
        # the server binding port in this example is 80.
        # The web server will run at FooUser privileges.


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


===========================================================================
