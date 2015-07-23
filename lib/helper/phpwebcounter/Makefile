# Makefile for PHP Web Counter
#
# by Eriberto
#
# Possible targets: install and uninstall

WEB_STUFF_PATH	= /var/www
PROGRAM_PATH	= $(WEB_STUFF_PATH)/phpwebcounter
IMAGES_PATH	= $(PROGRAM_PATH)/images
CONFIG_PATH	= /etc/phpwebcounter
HITS_PATH	= /var/lib/phpwebcounter
HTTP_USER	= www-data
HTTP_GROUP	= www-data

all: phpwebcounter

phpwebcounter: 
	#
	# ------------------------------------------------
	# Run "# make install" to install PHP Web Counter.
	# ------------------------------------------------
	#

install:
	@if [ ! -d $(PROGRAM_PATH) ]; then echo; echo Creating $(PROGRAM_PATH)...; mkdir -p $(PROGRAM_PATH); echo Installing program...; cp phpwebcounter.php $(PROGRAM_PATH); else echo "Run uninstall before install"; exit 1; fi
	@if [ ! -d $(CONFIG_PATH) ]; then echo Creating $(CONFIG_PATH)...; mkdir -p $(CONFIG_PATH); fi
	@echo Installing config file...; cp phpwebcounter.config.php $(CONFIG_PATH)	
	@if [ ! -d $(IMAGES_PATH) ]; then echo Creating $(IMAGES_PATH)...; mkdir -p $(IMAGES_PATH); fi
	@echo Copying images...; cp -a images/* $(IMAGES_PATH)
	@if [ ! -d $(HITS_PATH) ]; then echo Creating $(HITS_PATH)...; mkdir $(HITS_PATH); echo; fi
	@chown $(HTTP_USER).$(HTTP_GROUP) $(HITS_PATH)
	#
	# --------------------------
	# PHP Web Counter installed.
	# --------------------------
	#

uninstall:
	rm -rf $(PROGRAM_PATH)
	rm -rf $(HITS_PATH)
	rm -rf $(CONFIG_PATH)
	#
	# ----------------------------
	# PHP Web Counter uninstalled.
	# ----------------------------
	#
