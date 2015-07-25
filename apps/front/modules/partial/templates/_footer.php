<!--banner footer-->    
<div class="wrapper">
		<?php $rs = GlobalTable::doFetchOne('Banner', array('path', 'ext', 'link', 'target'), array('position'=>'footer', 'limit'=>1));?>
		<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>1100, 'height'=>150));?>
</div>

<?php //include_partial("partial/clients", array());?>

<div id="footer">
	<div class="wrapper" style="border-top:2px solid #e2e2e2;padding:2px 0px;">
		<div style="border-top:1px solid #e2e2e2;border-bottom:1px solid #e2e2e2;padding:5px 0px;">
				<!--logo-->
        <a href="<?php echo url_for('@homepage')?>" style="margin:0 8px 0 0;">
            <?php echo image_tag('logo377.png', array('style'=>'max-width:200px;'))?>
        </a>
        <br clear="all">
        <ul>  
       		<?php $rss = GlobalTable::doFetchArray('Page', array('type', 'title'), array('limit'=>100));?>
					<?php foreach ($rss as $rs):?>
							<li style="padding:5px 0;">
									<a href="<?php echo url_for('main/'.$rs['type'])?>">
										&raquo; <?php echo $rs['title']?>
									</a>
							</li>
					<?php endforeach;?>
 		   	</ul>
  	</div>
  	<span>&copy;2015 <?php echo sfConfig::get('app_domain_www')?></span>
  </div><!--wrapper-->
</div><!--footer-->