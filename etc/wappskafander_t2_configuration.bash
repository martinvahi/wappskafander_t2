
#--------start-of-warning-----------------------------------
# There is a bug/flaw that the setting parameters
# in this config file are also looked from the 
# comments of this file and the first value found wins.
# As this is a frozen branch of the wappskafander_t2 project, 
# this bug will not be fixed in this branch. 
#--------end---of-warning-----------------------------------

# If the SETTING_PORT_NUMBER==20077, then
# the demo index.html will be available at:
#
# http://localhost:20077/

SETTING_PORT_NUMBER="20070"

SETTING_REQUEST_SERVICING_MAXIMUM_DURATION_IN_SECONDS="300"
SETTING_REQUEST_SIZE_MAX_IN_KIBIBYTES="20000"

SETTING_SB_ENABLE_PHP5="t" # "t" for true and "f" for false

# The PHP5 is used by using the 
# operating system global FastCGI installation.
# The PHP FastCGI server must be started "manually", like
#
#     php-cgi -b 127.0.0.1:5555
#
# and it stays up as a wappskafander_t2 independent process.
# If the SETTING_SB_ENABLE_PHP5=="f", then PHP
# files are served as ordinary text files.
# 
# If the operating system is the Ubuntu Linux, then 
# the php-cgi command might be installed by 
#
#    apt-get install php5-cgi
#

# The
SETTING_PHP_FASTCGI_SERVER_PORT_NUMBER="5555"
# is used only, when the SETTING_SB_ENABLE_PHP5=="t".

