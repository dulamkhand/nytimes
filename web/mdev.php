<?php

error_reporting(E_ALL);

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('mobile', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
