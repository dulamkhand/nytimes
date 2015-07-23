<?php $host = sfConfig::get('app_host')?>
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
	<meta charset="ISO-8859-1">
    <meta name="msvalidate.01" content="7D0EF8A459619EDBCE446844709FFDB9" />
    <link rel="shortcut icon" href="<?php echo $host?>images/favicon.ico" />
  
    <!-- JQUIRY -->
    <script src="<?php echo $host?>js/jquery.min.js"></script>
    <script src="<?php echo $host?>addons/ui/jquery-ui.min.js"></script>
    
    <!-- ADDONS -->
    <?php use_stylesheet('/addons/ui/jquery-ui.css') ?>
    <?php use_javascript('/addons/sticky/jquery.sticky.js');?>    
    <?php use_javascript('/addons/scrollup/jquery.scrollUp.min.js');?>
    <?php use_javascript('/addons/flexslider/jquery.flexslider-min.js');?>
    <?php use_stylesheet('/addons/flexslider/flexslider.css');?>
    <?php use_javascript('/addons/fancybox/jquery.fancybox.pack.js');?>
    <?php use_stylesheet('/addons/fancybox/jquery.fancybox.css');?>
     
    <!-- FONTS -->
    <?php use_stylesheet('/addons/fonts/open-sans.css') ?>
    <?php use_stylesheet('/addons/fonts/roboto.css') ?>  
    
  	<?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    
    <script type="text/javascript">
    // scroll-up
    $(function(){
        $.scrollUp({scrollText:''});
    });
    // redirect to mobile
    /* if (screen.width <= 800) {
        window.location = "http://baavar.mn/m.php";
    }*/
    </script>
</head>