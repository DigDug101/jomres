<?php
/**
 * Core file
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 4 
* @package Jomres
* @copyright	2005-2009 Vince Wooll
* Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly. 
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

global $jomresItemid;
$jomresConfig_live_site = get_showtime('live_site');

$scriptname=str_replace("/","",$_SERVER['PHP_SELF']);
if (strstr($scriptname,'install_jomres.php'))
	$jomresConfig_live_site=str_replace("/jomres","",$jomresConfig_live_site);

$ssllink	= str_replace("https://","http://",$jomresConfig_live_site);

if (isset($_GET['format']) )
	{
	if ($_GET['format'] == "raw")
		define("JOMRES_WRAPPED",1);
	}

define("JOMRES_SITEPAGE_URL_NOHTML",$jomresConfig_live_site.'/jomres/index.php?no_html=1&a=k');
define("JOMRES_SITEPAGE_URL_ADMIN",$jomresConfig_live_site.'/jomres/index.php?admin');
define("JOMRES_SITEPAGE_URL_SSL",$ssllink.'/jomres/index.php?a=k');
define("JOMRES_SITEPAGE_URL",$jomresConfig_live_site."/jomres/index.php?a=k");
define("JOMRES_SITEPAGE_URL_RAW",get_showtime('live_site')."/jomres/index.php?a=k&format=raw");
define("JOMRES_SITEPAGE_URL_NOSEF",get_showtime('live_site')."/index.php?option=com_jomres");
?>
