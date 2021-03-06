<?php $host = sfConfig::get('app_host')?>

<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
    FB.init({
      appId      : '824938190895781',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<?php
// zoom body to 95% on mobile
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
	echo '<style>body{zoom:95%!important;}</style>';
}
?>

<div id="header" >
    <div class="wrapper">
        <!--banner header-->
				<?php $rs = GlobalTable::doFetchOne('Banner', array('path', 'ext', 'link', 'target'), array('position'=>'header', 'limit'=>1));?>
        <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>1100, 'height'=>100, 'close'=>false));?>
        
        <table width="100%" style="margin:5px 0 10px 0;">
        		<tr>
        				<td width="33%" align="left">
        						<!--banner header left-->
										<?php $rs = GlobalTable::doFetchOne('Banner', array('path', 'ext', 'link', 'target'), array('position'=>'header-left', 'limit'=>1));?>
						        <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>260, 'height'=>60, 'close'=>false));?>
        				</td>
        				<td width="40%" align="center">
        						<!--logo-->
						        <a href="<?php echo url_for('@homepage')?>">
						            <?php echo image_tag('logo377.png', array('style'=>''))?>
						        </a>
        				</td>
        				<td width="30%" align="right">
        						<div class="right">
	        						<!--banner header right -->
											<?php $rs = GlobalTable::doFetchOne('Banner', array('path', 'ext', 'link', 'target'), array('position'=>'header-right', 'limit'=>1));?>
							        <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>260, 'height'=>60, 'close'=>false));?>
						        </div>
        				</td>
        		</tr>
        </table>
    </div><!--wrapper-->  
      
   	<!--menu-->
    <div id="mainmenu">
   	    <div class="wrapper">
  		      <ul id="mainmenu-ul">	
  		      		<li><a href="<?php echo url_for('@homepage')?>" style="padding-left:0;">Нүүр</a></li>
   				 			<?php $cat_param = $sf_params->get('categoryRoute')?>
							  <?php $cats = GlobalTable::doFetchArray('Category', array('route', 'name'), array('limit'=>9));?>
								<?php foreach ($cats as $cat):?>
										<li>
												<a href="<?php echo url_for('page/index?categoryRoute='.$cat['route'])?>" class=" <?php if($cat['route'] == $cat_param) echo 'current'?>">
													<?php echo $cat['name']?>
												</a>
										</li>
								<?php endforeach;?>
								<li style="float:right;"><a href="https://twitter.com/<?php echo sfConfig::get('app_twitter')?>" target="_blank" style="padding:3px 5px;"><?php echo image_tag('icons/socials/twitter-16.png', array())?></a></li>
								<li style="float:right;"><a href="http://facebook.com/<?php echo sfConfig::get('app_facebook')?>" target="_blank" style="padding:3px 5px;"><?php echo image_tag('icons/socials/facebook-16.png', array())?></a></li>
            </ul>
            <br clear="all">
        </div><!--wrapper-->
    </div><!--mainmenu-->

    <?php //include_partial("partial/socialsFloating", array());?>
</div><!--header-->

<script type="text/javascript">
/* menu sticky */
$(document).ready(function(){
    $("#mainmenu").sticky({topSpacing:0});
});

/* menu dropdown */
$(document).ready(function() {
		$('#mainmenu-ul > li').bind('mouseover', openSubMenu);
		$('#mainmenu-ul > li').bind('mouseout', closeSubMenu);
		function openSubMenu() {
				$(this).find('ul').css('display', 'block');	
		};
		function closeSubMenu() {
				$(this).find('ul').css('display', 'none');	
		};
});

/*search*/
$('#search').click(function(){
    if($(this).val().trim() == "Хайлт") { $(this).val(''); }
}).blur(function() {
    if($(this).val().trim() == "") { $(this).val('Хайлт'); }
});
</script>

