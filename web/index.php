<?php

error_reporting(0);

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('front', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
