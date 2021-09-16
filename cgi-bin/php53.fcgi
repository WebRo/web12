#!/bin/sh
export PHP_FCGI_CHILDREN=0 
export PHP_FCGI_MAX_REQUESTS=10
exec /usr/local/cpanel/cgi-sys/php53
