<div class="left" style="width:210px;border:0px solid #e2e2e2;margin:0 0 0 15px;padding:0 10px;">
		<ul class="navigation">
				<li>
        		<span class="details left" style="margin:0;">Ангилал: &nbsp;</span>
						<?php $i=0; $nb = sizeof($rs->getCategoryContent());?>
						<?php $categoryIds = array()?>
						<?php foreach ($rs->getCategoryContent() as $catcon):?>
								<a href="<?php echo url_for('page/index?categoryRoute='.$catcon->getCategory()->getRoute())?>" class="left details" style="text-decoration:underline;">
										<?php echo $catcon->getCategory()?><?php echo (++$i < $nb) ? ',' : '';?>
								</a>
							 <?php $categoryIds[$catcon->getCategoryId()] = $catcon->getCategoryId()?>
						<?php endforeach?>
						<br clear="all">
				</li>
				<li>
        		<span class="details" style="margin:0;">Нэмэгдсэн: <?php echo time_ago($rs->getCreatedAt())?></span>
				</li>
				<li>
						<span class="details" style="margin:0;">Нээгдсэн:</span>
        		<span class="details" style="margin:-1px 0 0 2px;font-size:14px;"><?php echo $rs->getNbViews()?></span>
        </li>
				<li>
						<span class="details" style="margin:0;">Сэтгэгдэл:</span>
        		<span class="details" style="margin:-1px 0 0 2px;font-size:14px;"><?php echo $rs->getNbComment()?></span>	
				</li>
				<li>
						<!--fb like-->
						<?php $host = sfConfig::get('app_host')?>
						<div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false" 
    						 data-href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url?>&amp;title=<?php echo $title?>"></div>
				</li>
				<li>
						<!--fb share-->
						<div class="fb-share-button" data-layout="button_count"
								 data-href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url?>&amp;title=<?php echo $title?>"></div>
				</li>
				<li>
						<!--fb send-->
						<div class="fb-send" data-href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url?>&amp;title=<?php echo $title?>"></div>
				</li>
				<li>
						<!--tweet-->
						<a class="twitter-share-button" href="https://twitter.com/share?url=<?php echo $url?>&amp;via=<?php echo sfConfig::get('app_domain');?>&amp;text=<?php echo $title?>">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</li>
				<li>
						<?php $rs = Doctrine::getTable('Content')->doFetchOne(array('title', 'route', 'cover', 'intro'), array('idGt'=>$id));?>
						<?php if($rs):?>
						    <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" class="details">
				            Дараагийн нийтлэл: <br>
				            <span style="float:left;color:#000;margin:4px 0 0 0;line-height:24px;text-decoration:underline;" class="details">
				                <?php echo GlobalLib::clearOutput($rs['title'])?>
				            </span>
				            <br clear="all">
						    </a>
						<?php endif?>
				</li>
		</ul><!--navigation-->
		<br clear="all">
		<br clear="all">
		
		<!--similars-->
		<?php include_partial('similars', array('id'=>$rs->getId(), 'categoryIds'=>$categoryIds));?>
		<br clear="all">
</div>
<br clear="all">