<?php $host = sfConfig::get('app_host')?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>  
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
	<link rel="shortcut icon" href="<?php echo $host?>images/favicon.ico" />
	
  <!-- JQUIRY -->
  <script src="<?php echo $host?>js/jquery.min.js"></script>
  <script src="<?php echo $host?>addons/ui/jquery-ui.min.js"></script>

  <!-- ADDONS -->
  <?php use_stylesheet('/addons/ui/jquery-ui.css') ?>
  <?php use_javascript('/addons/fancybox/jquery.fancybox.pack.js');?>
  <?php use_stylesheet('/addons/fancybox/jquery.fancybox.css');?>
  
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
</head>

<body>
    <?php if($sf_user->isAuthenticated()):?>
        <div id="topmenu"><ul>
            <?php $tab = isset($tab) ? $tab : $sf_request->getParameter('module'); ?>
            <?php $act = isset($act) ? $act : $sf_request->getParameter('action'); ?>
            		<li <?php echo $tab == 'content' ? 'class="current"' : '' ?>>
                  <?php echo link_to('content', 'content/index')?>
                </li>
                <?php if($sf_user->hasCredential('comment')):?>
                		<li <?php echo $tab == 'comment' ? 'class="current"' : '' ?>>
		                  <?php echo link_to('comment', 'comment/index')?>
		                </li>
                <?php endif?>
                <?php if($sf_user->hasCredential('menu')):?>
                		<li <?php echo $tab == 'menu' ? 'class="current"' : '' ?>>
		                  	<?php echo link_to('menu', 'menu/index')?>
		                </li>
                <?php endif?>
                <?php if($sf_user->hasCredential('category')):?>
                		<li <?php echo $tab == 'category' ? 'class="current"' : '' ?>>
		                  <?php echo link_to('category', 'category/index')?>
		                </li>
                <?php endif?>
                <?php if($sf_user->hasCredential('poll')):?>
                		<li <?php echo $tab == 'poll' ? 'class="current"' : '' ?>>
		                  <?php echo link_to('poll', 'poll/index')?>
		                </li>
                <?php endif?>
                <?php if($sf_user->hasCredential('banner')):?>
                		<li <?php echo $tab == 'banner' ? 'class="current"' : '' ?>>
		                  <?php echo link_to('banner', 'banner/index')?>
		                </li>
                <?php endif?>
                <?php if($sf_user->hasCredential('client')):?>
                		<li <?php echo $tab == 'client' ? 'class="current"' : '' ?>>
		                  <?php echo link_to('client', 'client/index')?>
		                </li>
                <?php endif?>
                <?php if($sf_user->hasCredential('page')):?>
                		<li <?php echo $tab == 'page' ? 'class="current"' : '' ?>>
		                  <?php echo link_to('page', 'page/index')?>
		                </li>
                <?php endif?>
                <?php if($sf_user->hasCredential('feedback')):?>
                		<li <?php echo $tab == 'feedback' ? 'class="current"' : '' ?>>
		                  <?php echo link_to('feedback', 'feedback/index')?>
		                </li>
                <?php endif?>
                <?php if($sf_user->hasCredential('admin')):?>
		                <li <?php echo $tab == 'admin' ? 'class="current"' : '' ?>>
		                    <?php echo link_to('admin', 'admin/index')?>
		                </li>
                <?php endif?>
            <li><?php echo link_to('Logout ('.$sf_user->getEmail().')', 'admin/logout')?></li>
        </ul></div><!--topmenu-->
    
        <br clear="all">   
        <div id="submenu">
            <?php 
            if($tab == 'image') { 
                echo link_to('+ new', 'image/new?contentId='.$sf_params->get('contentId'));
                echo link_to('list', 'content/index');
            } else if($tab == 'page') {
                echo link_to('list', 'page/index');
            } else {
            		echo link_to('+ new', $tab.'/new');
                echo link_to('list', $tab.'/index');
            }
            ?>
            <br clear="all">
        </div><!--topmenu-->
    <?php endif ?>

    <div id="wrapper">
      <div id="content" class="full">
          <?php if ($sf_user->hasFlash('flash')): ?>
              <div class="flash"><?php echo $sf_user->getFlash('flash')?></div>
          <?php endif; ?>
  
          <?php echo $sf_content ?>
      </div><!--content-->
    </div><!--wrapper-->
</body>
</html>
