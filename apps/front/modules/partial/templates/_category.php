<div style="margin:10px 0 0 0;border-top:2px solid #000;padding:2px 0;">
		<span style="color:#000;padding:2px;">Бүх ангилал</span>
		<ul style="border-top:1px solid #ccc;">	
		 		<?php $cat_param = $sf_params->get('categoryRoute')?>
			  <?php $cats = GlobalTable::doFetchArray('Category', array('route', 'name'), array());?>
				<?php foreach ($cats as $cat):?>
						<li>
								<a href="<?php echo url_for('page/index?categoryRoute='.$cat['route'])?>" style="<?php if($cat['route'] == $cat_param) echo 'font-weight:bold;'?>;margin:3px 0;border-bottom:1px dotted #e2e2e2;width:235px;" class="left">
										&raquo; <?php echo $cat['name']?>
								</a>
								<br clear="all">
						</li>
				<?php endforeach;?>
    </ul>
</div>
<br clear="all"> 	