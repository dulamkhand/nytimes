<div class="wrapper">
		<!--banner footer-->    
		<?php $rs = GlobalTable::doFetchOne('Banner', array('path', 'ext', 'link', 'target'), array('position'=>'footer', 'limit'=>1));?>
		<?php if($rs):?>
				<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>1000, 'height'=>150));?>
		<?php endif?>
</div>

<?php include_partial("partial/clients", array());?>

<div id="footer">
	<div class="wrapper" style="border-top:2px solid #e2e2e2;padding:2px 0px;">
		<div style="border-top:1px solid #e2e2e2;border-bottom:1px solid #e2e2e2;padding:5px 0px;">
				<!--logo-->
        <a href="<?php echo url_for('@homepage')?>" style="">
            <?php echo image_tag('logo377.png', array('style'=>'max-width:200px;'))?>
        </a>
        <br clear="all"> 	
        <br clear="all">
		
		    <div class="left" style="margin:0 10px 0 0;">
						<!--<a><img src="http://hitwebcounter.com/counter/counter.php?page=5945219&style=0038&nbdigits=5&type=page&initCount=50000" title="" alt="" border="0"></a>-->
						<?php //echo hits_webcounter(0);?>
				</div>
		    <div class="right" style="margin:0 10px 0 0;">
		        <ul>
		            <li class="left"><a href="<?php echo url_for('main/about')?>">Вэбийн тухай</a> &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
		            <li class="left"><a href="<?php echo url_for('main/advertisement')?>">Реклам байршуулах</a> &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
		            <li class="left"><a href="<?php echo url_for('main/contact')?>">Холбогдох</a></li>
		        </ul>
		    </div>
  	</div>
  	<span style="color:#000;font-family:Arial;font-size:11px;">&copy;2015 <?php echo sfConfig::get('app_domain_www')?></span>
  </div><!--wrapper-->
</div><!--footer-->