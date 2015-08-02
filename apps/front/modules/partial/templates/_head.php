<?php $host = sfConfig::get('app_host')?>
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
	  <meta charset="ISO-8859-1">
    <link rel="shortcut icon" href="<?php echo $host?>images/favicon.ico" />

    <?php use_stylesheet('/css/front.css');?>    
    <!-- JQUIRY -->
    <script src="<?php echo $host?>js/jquery.min.js"></script>
    
    <!-- ADDONS -->
    <?php use_javascript('/addons/sticky/jquery.sticky.js');?>    
    <?php use_javascript('/addons/scrollup/jquery.scrollUp.min.js');?>
     
  	<?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    
    <script type="text/javascript">
    // scroll-up
    $(function(){
        $.scrollUp({scrollText:''});
    });
    // redirect to mobile
    /* if (screen.width <= 800) {
        window.location = "http://<?php echo sfConfig::get('app_host')?>/m.php";
    }*/
    </script>
</head>