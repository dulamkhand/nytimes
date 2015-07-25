<?php
function pager($pager, $uri)
{
  if ($uri[0] != '/') {
    $uri = url_for($uri);
  }

  $navigation = '<div class="pager">';
  if ($pager->haveToPaginate()) {
	    $uri .= (preg_match('/\?/', $uri) ? '&amp;' : '?').'page=';    
	
	    // First and previous page
	    if ($pager->getPage() != 1) {
		      $navigation .= '<a href="'.$uri.'1">&laquo; Эхлэл</a>';
		      $navigation .= '<a href="'.$uri.$pager->getPreviousPage().'">Өмнөх хуудас</a>';
	    }
	
	    // Pages one by one
	    $links = array();
	    $options = '';
	    foreach ($pager->getLinks(10) as $page) {
	      	$links[] = '<a href="'.$uri.$page.'" class="'.($page == $pager->getPage() ? "selected" : "").'">'.$page.'</a>';
	    }
	    $navigation .= join('', $links);
	    // Next and last page
	    if ($pager->getPage() != $pager->getCurrentMaxLink()) {
		      $navigation .= '<a href="'.$uri.$pager->getNextPage().'" >Дараах хуудас</a>';
	  	    $navigation .= '<a href="'.$uri.$pager->getLastPage().'" >Сүүлийн хуудас &raquo;</a>';
	    }
  }

  if ($pager->getNbResults() > 0) {
    	$navigation .= '<span class="total">Нийт: <b>'.$pager->getNbResults().'</b> мэдээ. Энэ хуудсанд <b>'.$pager->getFirstIndice().'-'.$pager->getLastIndice().'</b> мэдээ харагдаж байна.</span>';
  }
  $navigation .= '</div>';
  return $navigation;
}

function time_ago($from_time, $to_time = null, $include_seconds = false)
{
  if(!is_numeric($from_time)){
    $from_time = strtotime($from_time);
  }
  
  $to_time = $to_time? $to_time: time();
  
  if ($from_time > $to_time) $from_time = $to_time;

  $distance_in_minutes = floor(abs($to_time - $from_time) / 60);
  $distance_in_seconds = floor(abs($to_time - $from_time));

  $string = '';
  $parameters = array();

  if ($distance_in_minutes <= 1)
  {
    if (!$include_seconds)
    {
      $string = $distance_in_minutes == 0 ? 'саяхан' : '1 минут өмнө';
    }
    else
    {
      if ($distance_in_seconds <= 5)
      {
        $string = '5 секундийн өмнө';
      }
      else if ($distance_in_seconds >= 6 && $distance_in_seconds <= 10)
      {
        $string = '10 секундийн өмнө';
      }
      else if ($distance_in_seconds >= 11 && $distance_in_seconds <= 20)
      {
        $string = '20 секундийн өмнө';
      }
      else if ($distance_in_seconds >= 21 && $distance_in_seconds <= 40)
      {
        $string = '30 секундийн өмнө';
      }
      else if ($distance_in_seconds >= 41 && $distance_in_seconds <= 59)
      {
        $string = '50 секундийн өмнө';
      }
      else
      {
        $string = '1 минутын өмнө';
      }
    }
  }
  else if ($distance_in_minutes >= 2 && $distance_in_minutes <= 44)
  {
    $string = '%minutes% минутын өмнө';
    $parameters['%minutes%'] = $distance_in_minutes;
  }
  else if ($distance_in_minutes >= 45 && $distance_in_minutes <= 89)
  {
    $string = '1 цагийн өмнө';
  }
  else if ($distance_in_minutes >= 90 && $distance_in_minutes <= 1439)
  {
    $string = '%hours% цагийн өмнө';
    $parameters['%hours%'] = round($distance_in_minutes / 60);
  }
  else if ($distance_in_minutes >= 1440 && $distance_in_minutes <= 2879)
  {
    $string = '1 өдрийн өмнө';
  }
  else if ($distance_in_minutes >= 2880 && $distance_in_minutes <= 43199)
  {
    $string = '%days% өдрийн өмнө';
    $parameters['%days%'] = round($distance_in_minutes / 1440);
  }
  else if ($distance_in_minutes >= 43200 && $distance_in_minutes <= 86399)
  {
    $string = '1 сарын өмнө';
  }
  else 
  {
    return date("Y-m-d H:i", $from_time);
  }

  return strtr($string, $parameters);
}



function utf8_substr($str,$from,$len) {
    # utf8 substr
    $str = preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
    '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
    '$1',$str);
    return GlobalLib::clearOutput($str);
}

function blurBadWords($text) {
    // TODO: find magic
    $a = GlobalLib::getArray('bad_words');
    foreach ($a as $word) {
        $text = str_ireplace($word, '<span class="bluring">'.$word.'</span>', $text);
    }
    return $text;
}

// HIT COUNTER
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

//require("/var/www/html/sfapps/lib/helper/phpwebcounter/phpwebcounter.config.php");

##########################
##########################
### Part 2 - The code! ###
##########################
##########################

function hits_webcounter($webcounter_id=0, $hits_file=null, $vis=null, $path_images=null, $counter_pad, $step) 
{
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
	echo "<SPAN style='position:absolute;left:0;bottom:0;'>";
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

//hits_webcounter($webcounter_id,$path_hits_file,$visible,$path_images,$counter_pad, $step);

?>