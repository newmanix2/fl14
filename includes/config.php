<?php
//config.php
include 'credentials.php';#database credentials
include 'common.php';#common functions
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
define('DEBUG',FALSE); #we want to see all errors
//echo THIS_PAGE;
//die;

date_default_timezone_set('America/Los_Angeles'); #sets default date/timezone for this website

/* automatic path settings - use the following 4 path settings for placing all code in one application folder */ 
define('VIRTUAL_PATH', 'http://zephir.seattlecentral.edu/~bnewman/fl14/'); # Virtual (web) 'root' of application for images, JS & CSS files
define('PHYSICAL_PATH', '/home/classes/bnewman/public_html/fl14/'); # Physical (PHP) 'root' of application for file & upload reference
define('INCLUDE_PATH', PHYSICAL_PATH . 'includes/'); # Path to PHP include files - INSIDE APPLICATION ROOT


# End Config area --------------------------------
ob_start();  #buffers our page to be prevent header errors. Call before INC files or ANY html!
header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

$title = THIS_PAGE; //fallback unique title - see title tag in header.php
if(DEBUG)
{# When debugging, show all errors & warnings
	ini_set('error_reporting', E_ALL | E_STRICT);  
}else{# zero will hide everything except fatal errors
	ini_set('error_reporting', 0);  
} 

$nav1['template.php'] = 'Home';
$nav1['customers.php'] = 'Customers';
$nav1['fiji.php'] = 'Fiji';
$nav1['jamaica.php'] = 'Jamaica';
$nav1['contact.php'] = 'Contact Us';

switch(THIS_PAGE)
{
	
	case 'hawaii.php':	
		$title = "Island Title Tag";
		break;
		
	default:
		$title = "Default Title Tag";
		$banner = "Site Banner";		
	
}

