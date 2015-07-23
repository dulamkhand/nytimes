<?php
#####################################################################
# PHP Web Counter, version 1.0                                      #
#                                                                   #
# A simple and light web hits counter                               #
#                                                                   #
# This is a Free Software under Gnu/GPL license                     #
#                                                                   #
# C 2006-2007 - Andre Bertelli Araujo <bertelli.andre@gmail.com>    #
#               Joao Eriberto Mota Filho <eriberto@eriberto.pro.br> #
#               Marcos Patricio do Santos <marpasan@ig.com.br>      #
#                                                                   #
# URL: http://phpwebcounter.sourceforge.net                         #
#####################################################################

# Counter identificator. It allow You may use one or more counters. 

$webcounter_id=0;

# hits is the control file and has the actual number of web hits. The
# path_hits_file variable establish the path of the hits file. This directory
# must have R/W permission to web server owner.
#
# Default value is /var/lib/phpwebcounter but you can set this to your site
# directory (for leased web space only). Don't touch here if you don't know how
# it works.

$path_hits_file='/var/www/html/sfapps/lib/helper/phpwebcounter';

# The visible variable establish if the counter will be visible. If invisible
# the counter will count the hits into hits file. 

$visible=true;

# Path of the digit images. If you want a text style then leave it blank.
# Example: $path_images='';
#
# The digit images are in /var/www/phpwebcounter/images. If you need more
# images you can get the phpwebcounter-extra tarball at
# http://phpwebcounter.sourceforge.net.
#
# Default value is /phpwebcounter/images/basic1 but you can set this to your
# site directory (for leased web space only). To use it with Apache2 and to
# put the images in /usr/share/phpwebcounter  you  will need to make an "alias"
# in Apache2 config.
#
# This must NOT be the path for the image files in the disk, but rather the 
# path to the image files as they're going to be accessed by a browser.
# Example: if you put the image files in /var/www/phpwebcounter/images/basic1,
# then the path must be /phpwebcounter/images/basic1 .
# Don't touch here if you don't know how it works.

$path_images='/var/www/html/addons/phpwebcounter/images/basic1';

# The counter_pad variable set the minimum number of digits to be displayed.

$counter_pad=6;

# Counter step... Don't use this to get the fame...
# Default value is 1.

$step=1;

# Put "0" value here to don't show a project banner. Please, think to keep
# the value as 1. It will help this project...

$banner=1;
?>
