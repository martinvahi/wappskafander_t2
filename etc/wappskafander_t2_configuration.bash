

# If the WAPPSKAFANDER_T2_PORT_NUMBER==20070, then
# the demo index.html will be available from:
#
# http://localhost:20070/

SETTING_PORT_NUMBER="20070"

SETTING_REQUEST_SERVICING_MAXIMUM_DURATION_IN_SECONDS="300"
SETTING_REQUEST_SIZE_MAX_IN_KIBIBYTES="20000"

# The PHP5 is used by using operating system global FastCGI installation.
SETTING_SB_ENABLE_PHP5="t" # "t" for true and "f" for false

# The
SETTING_PHP_FASTCGI_SERVER_PORT_NUMBER="5555"
# is used only, when the SETTING_SB_ENABLE_PHP5=="t".
# The PHP FastCGI server must be started "manually", like
#
#     php-cgi -b 127.0.0.1:5555
#
# and it stays up as a wappskafander_t2 independent process.

