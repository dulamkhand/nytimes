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


##############################
##############################
### Part 1 - Configuration ###
##############################
##############################

require("/var/www/html/sfapps/lib/helper/phpwebcounter/phpwebcounter.config.php");

##########################
##########################
### Part 2 - The code! ###
##########################
##########################

function hits_webcounter($webcounter_id=0, $hits_file=null, $vis=null, $path_images=null, $counter_pad, $step) 
{
	echo 'aaa'; die();
	if (is_null($hits_file))
		$hits_file = $path_hits_file;
	if (is_null($vis))
		$vis = $visible;

	$counter = read_webcounter($webcounter_id, $hits_file);
	increment_webcounter($webcounter_id, $counter, $step, $hits_file);
	
	if (!$vis) return;
	if (is_null($path_images)) {
		echo $counter;
	} else {
		show_webcounter($counter, $path_images, $counter_pad);
	}
}

function show_webcounter($counter, $path_images, $counter_pad=6)
{
	echo "<SPAN>";
		$counter = str_pad($counter, $counter_pad, '0', STR_PAD_LEFT);
		for ($i=0; $i< strlen($counter) ; $i++) {
			$digit=$counter[$i];
			echo "<IMG src='$path_images/$digit.png' alt='$digit' />";
		}
	echo "</SPAN>";
}

function read_webcounter($webcounter_id, $hits_file=null)
{
	if (is_null($hits_file))
		$hits_file = $path_hits_file;

	$file="$hits_file/hits_webcounter.$webcounter_id";
	$fp = fopen($file, 'a+');
	$counter= fread($fp,1024);
	fclose($fp);
	return $counter;
}

function increment_webcounter($webcounter_id, $counter, $step=1, $hits_file=null)
{
	if (is_null($hits_file))
		$hits_file = $path_hits_file;

	$file="$hits_file/hits_webcounter.$webcounter_id";
	$fp = fopen($file, 'w');
	fwrite($fp,$counter+$step);
	fclose($fp);
}

########################
########################
### Part 3 - Running ###
########################
########################

hits_webcounter($webcounter_id,$path_hits_file,$visible,$path_images,$counter_pad, $step);

if ($banner == '1') { 
    echo '<br><a href="http://phpwebcounter.sourceforge.net"><font size=1px>PHP Web Counter</a></font size><br>';
    }
?>
