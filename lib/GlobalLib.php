<?php

class GlobalLib
{
  
    public static $alpha_en = array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E','F'=>'F','G'=>'G','H'=>'H','I'=>'I',
                  'J'=>'J','K'=>'K','L'=>'L','M'=>'M','N'=>'N','O'=>'O','P'=>'P','Q'=>'Q','R'=>'R','S'=>'S','T'=>'T',
                  'U'=>'U','V'=>'V','W'=>'W','X'=>'X','Y'=>'Y','Z'=>'Z');
    public static $alpha_mn = array('A'=>'A','Б'=>'Б','В'=>'В','Г'=>'Г','Д'=>'Д','Е'=>'Е','Ё'=>'Ё','Ж'=>'Ж','З'=>'З','И'=>'И',
                  'Й'=>'Й','К'=>'К','Л'=>'Л','М'=>'М','Н'=>'Н','О'=>'О','Ө'=>'Ө','П'=>'П','Р'=>'Р','С'=>'С','Т'=>'Т','У'=>'У',
                  'Ү'=>'Ү','Х'=>'Х','Ц'=>'Ц','Ч'=>'Ч','Ш'=>'Ш','Щ'=>'Щ','Ъ'=>'Ъ','Ь'=>'Ь','Э'=>'Э','Ю'=>'Ю','Я'=>'Я');
    public static $years = array(2014=>2014,2013=>2013,2011=>2011,2010=>2010,
                  2009=>2009,2008=>2008,2007=>2007,2006=>2006,2005=>2005,
                  2004=>2004,2003=>2003,2002=>2002,2001=>2001,2000=>2000,
                  1990=>1990,1980=>1980,1970=>1970,1960=>'1960-с өмнө');
    public static $days = array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,11=>11,12=>12,13=>13,14=>14,15=>15,16=>16,
            17=>17,18=>18,19=>19,20=>20,21=>21,22=>22,23=>23,24=>24,25=>25,26=>26,27=>27,28=>28,29=>29,30=>30,31=>31);

    public static $banner_position = array(
                  'header'   		=> 'Header 1100 x 100', 
                  'header-left' => 'Header left 200 x 93', 
                  'header-right'=> 'Header right 200 x 93', 
                  'home-top' 		=> 'Home top 600 x 150', 
                  'floating' 		=> 'Floating 150 x 150', 
                  'middle1'  		=> 'Middle1 600 x 150', 
                  'middle2'  		=> 'Middle2 600 x 150', 
                  'middle3'  		=> 'Middle3 600 x 150', 
                  'left-top'		=> 'Left top 235 x 400',
                  'left-middle' => 'Left middle 235 x 400',
                  'right-top'		=> 'Right top 250 x 400',
                  'right-middle'=> 'Right middle 250 x 400',
                  'footer'			=> 'Footer 1100 x 150', 
    );

    public static $mod_permissions = array('content'=>'Content', 'comment'=>'Comment', 'category'=>'Category', 'poll'=>'Poll',
                  'banner'=>'Banner', 'client'=>'Clients',  'page'=>'Page', 'feedback'=>'Feedback', 'admin'=>'Admin');
              
    public static $bad_words = array('shit','crap','damn','bugger','jerk','asshole','bastard','douche','slut','fucking','fuck','bitch','cock','dick','darn','fag','piss','penis','pussy');

    public static function getArray($type) {
        switch ($type) {
          	case 'alpha_en': return self::$alpha_en;
          	case 'alpha_mn': return self::$alpha_mn;
          	case 'years': return self::$years;
          	case 'days': return self::$days;
          	case 'mod_permissions': return self::$mod_permissions;
          	case 'banner_position': return self::$banner_position;
          	case 'bad_words': return self::$bad_words;
        }
       return array();
    }
    
    public static function getValues($type)
    {
        return array_values(self::getArray($type));
    }    
    
    public static function getKeys($type)
    {
        return array_keys(self::getArray($type));
    }
    
    public static function getValue($type, $key)
    {
        $array = self::getArray($type);
        return $array[$key];
    }
    
    

    ################################################################################################################################################################
    
    public static function getNumbers($a=1, $b=1000)
    {
        $array = array();
        if($a < $b) {
            for($i=$a; $i <= $b; $i++) {
                $array[$i] = $i;
            }       
        } else {
            for($i=$a; $i >= $b; $i--) {
                $array[$i] = $i;
            }
        }
        return $array;
    }
    
    static public function slugify($text)
    {
        // replace all non letters or digits by -
        $text = preg_replace('/\W+/', '-', GlobalLib::mn2en($text));
        // trim and lowercase
        $text = strtolower(trim($text, '-'));
        return $text;
    }
    
    
  
    public static function getFileName($fileName) {
        try {
          return substr($fileName, strrpos($fileName,'/')+1,strlen($fileName)-strrpos($fileName,'/'));
        }catch (Exception $e) {
    
        }
        return ;
    }
  
    public static function getFileExtension($fileName) {
        return strtolower(substr(strrchr($fileName, '.'), 1));
    }
  
    public static function get3FileExtension($fileName) {
        $ext = strtolower(substr(strrchr($fileName, '.'), 1));
        if(in_array($ext, array('doc','docx','xls','xlsx','pdf','pdfx'))) {
          return $ext;
        }
        return 'pdf';
    }
    
    
    public static function mn2en($st) {
        $replacement = array(
                "й"=>"i","ц"=>"ts","у"=>"u","к"=>"k","е"=>"ye","н"=>"n",'ү'=>'u',
                "г"=>"g","ш"=>"sh","щ"=>"sh","з"=>"z","х"=>"h","ъ"=>"-",'ө'=>'u',
                "ф"=>"f","ы"=>"ii","в"=>"v","а"=>"a","п"=>"p","р"=>"r",
                "о"=>"o","л"=>"l","д"=>"d","ж"=>"j","э"=>"e","ё"=>"yo",
                "я"=>"ya","ч"=>"ch","с"=>"s","м"=>"m","и"=>"i","т"=>"t",
                "ь"=>"-","б"=>"b","ю"=>"yu","\""=>"-","'"=>"-",
                "Й"=>"I","Ц"=>"TS","У"=>"U","К"=>"K","Е"=>"YE","Н"=>"N",'Ү'=>'U',
                "Г"=>"G","Ш"=>"SH","Щ"=>"SH","З"=>"Z","Х"=>"H","Ъ"=>"-",'Ө'=>'U',
                "Ф"=>"F","Ы"=>"II","В"=>"V","А"=>"A","П"=>"P","Р"=>"R",
                "О"=>"O","Л"=>"L","Д"=>"D","Ж"=>"J","Э"=>"E","Ё"=>"YO",
                "Я"=>"YA","Ч"=>"CH","С"=>"S","М"=>"M","И"=>"I","Т"=>"T",
                "Ь"=>"-'","Б"=>"B","Ю"=>"YU",
        );
    
        foreach($replacement as $i=>$u) {
            $st = mb_eregi_replace($i,$u,$st);
        }
        return $st;
    }
    
    public static function createThumbs($filename, $folder, $thumbs=array(), $removeOrg=false) 
    {
        try {
            $ext = GlobalLib::getFileExtension($filename);
            if(in_array($ext, array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'))) 
            {
                $uploadDir = sfConfig::get('sf_upload_dir').'/'.$folder.'/';
                if (sizeof($thumbs) && $filename && file_exists($uploadDir.$filename)) {
                    // create thumbs
                    foreach ($thumbs as $thumb) {
                        $thumbnail = new sfThumbnail($thumb, null, true, true, 75);
                        $thumbnail->loadFile($uploadDir.$filename);
                        $thumbnail->save($uploadDir."t".$thumb."-".$filename);
                    }
                    // remove orig image
                    if($removeOrg) unlink($uploadDir.$filename);
                    return true;
                }
            } // not an image file
        }catch (Exception $e) {
    
        }
        return false;
    }  
    
    public static function createQualities($filename, $folder, $qualities=array(), $removeOrg=false) 
    {
        try {
            $ext = GlobalLib::getFileExtension($filename);
            if(in_array($ext, array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'))) 
            {
                $uploadDir = sfConfig::get('sf_upload_dir').'/'.$folder.'/';
                if (sizeof($qualities) && $filename && file_exists($uploadDir.$filename)) {
                    // create quilities
                    foreach ($qualities as $quality) {
                        $thumbnail = new sfThumbnail(null, null, true, false, $quality);
                        $thumbnail->loadFile($uploadDir.$filename);
                        $thumbnail->save($uploadDir."q".$quality."-".$filename);
                    }
                    // remove orig image
                    if($removeOrg) unlink($uploadDir.$filename);
                    return true;
                }
            } // not an image file
        }catch (Exception $e) {
    
        }
        return false;
    }
    
    public static function isMobileDevice(){
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$mobile_agents = Array(
			"240x320",
			"acer",
			"acoon",
			"acs-",
			"abacho",
			"ahong",
			"airness",
			"alcatel",
			"amoi",	
			"android",
			"anywhereyougo.com",
			"applewebkit/525",
			"applewebkit/532",
			"asus",
			"audio",
			"au-mic",
			"avantogo",
			"becker",
			"benq",
			"bilbo",
			"bird",
			"blackberry",
			"blazer",
			"bleu",
			"cdm-",
			"compal",
			"coolpad",
			"danger",
			"dbtel",
			"dopod",
			"elaine",
			"eric",
			"etouch",
			"fly " ,
			"fly_",
			"fly-",
			"go.web",
			"goodaccess",
			"gradiente",
			"grundig",
			"haier",
			"hedy",
			"hitachi",
			"htc",
			"huawei",
			"hutchison",
			"inno",
			"ipad",
			"ipaq",
			"ipod",
			"jbrowser",
			"kddi",
			"kgt",
			"kwc",
			"lenovo",
			"lg ",
			"lg2",
			"lg3",
			"lg4",
			"lg5",
			"lg7",
			"lg8",
			"lg9",
			"lg-",
			"lge-",
			"lge9",
			"longcos",
			"maemo",
			"mercator",
			"meridian",
			"micromax",
			"midp",
			"mini",
			"mitsu",
			"mmm",
			"mmp",
			"mobi",
			"mot-",
			"moto",
			"nec-",
			"netfront",
			"newgen",
			"nexian",
			"nf-browser",
			"nintendo",
			"nitro",
			"nokia",
			"nook",
			"novarra",
			"obigo",
			"palm",
			"panasonic",
			"pantech",
			"philips",
			"phone",
			"pg-",
			"playstation",
			"pocket",
			"pt-",
			"qc-",
			"qtek",
			"rover",
			"sagem",
			"sama",
			"samu",
			"sanyo",
			"samsung",
			"sch-",
			"scooter",
			"sec-",
			"sendo",
			"sgh-",
			"sharp",
			"siemens",
			"sie-",
			"softbank",
			"sony",
			"spice",
			"sprint",
			"spv",
			"symbian",
			"tablet",
			"talkabout",
			"tcl-",
			"teleca",
			"telit",
			"tianyu",
			"tim-",
			"toshiba",
			"tsm",
			"up.browser",
			"utec",
			"utstar",
			"verykool",
			"virgin",
			"vk-",
			"voda",
			"voxtel",
			"vx",
			"wap",
			"wellco",
			"wig browser",
			"wii",
			"windows ce",
			"wireless",
			"xda",
			"xde",
			"zte"
		);
		$is_mobile = false;
		foreach ($mobile_agents as $device) {
			if (stristr($user_agent, $device)) {
				$is_mobile = true;
				break;
			}
		}
		return $is_mobile;
	}
    
    public static function clearOutput($text)
    {
        return nl2br(htmlspecialchars_decode(strip_tags(trim($text), '<strong><b><i><em><u><sup><sub><ol><ul><li><a><img><embed><object><iframe>')));
    }
    
    public static function clearQuote($text)
    {
        $text = trim($text);
        // xss, html tags are escaped here?
        //$text = preg_replace('/\"/', ' ', $text);
        //$text = preg_replace('/\'/', ' ', $text);
        $text = preg_replace('/</', ' ', $text);
        $text = preg_replace('/>/', ' ', $text);
        return $text;
    }
    
    public static function clearInput($text)
    {
        $text = trim($text);
        // xss, html tags are escaped here?
        //$text = preg_replace('/\?/', ' ', $text);
        //$text = preg_replace('/\"/', ' ', $text);
        //$text = preg_replace('/\'/', ' ', $text);
        $text = preg_replace('/</', ' ', $text);
        $text = preg_replace('/>/', ' ', $text);
        
        // strip tags
        $text = strip_tags($text);
        return $text;
    }

}

?>