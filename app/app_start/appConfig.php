<?php

/*
 *---------------------------------------------------------------
 * BASE URL
 *---------------------------------------------------------------
 *
 * Site BASE URL (base for all redirections):
 * Check if request has come from HTTP or HTTPS
 * Get the trailing name component of path
 * Set BASE_URL
 */

$baseURL = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
$baseURL .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
define ('BASE_URL', $baseURL);
	
	
	
	
	
/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * developmet - holding page is shown to users but access is allowed via direct links
 * production - site is live
 * offline - holding page is shown and no access past it is allowed
 */

define('ENVIRONMENT', 'development');





/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * By default development will show errors but production will hide them.
 */

if (defined('ENVIRONMENT')){

	switch (ENVIRONMENT){
		case 'development':
			//error_reporting(E_ALL);
		break;

		case 'production':
			//error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}

}





/*
 *---------------------------------------------------------------
 * SITE ADDRESS
 *---------------------------------------------------------------
 *
 * Site URL.
 */

define('DIR', 'http://thewebsite.com');





/*
 *---------------------------------------------------------------
 * DEFAULT LANGUAGE
 *---------------------------------------------------------------
 *
 * Site Language.
 */
 
define('LANGUAGE_CODE', 'en');





/*
 *---------------------------------------------------------------
 * DATABASE
 *---------------------------------------------------------------
 *
 * Database details - ONLY NEEDED IF USING A DATABASE
 */

define('DB_TYPE', 'mysql');
define('DB_HOST', 'THEHOST');
define('DB_NAME', 'THEDATABASE');
define('DB_USER', 'THEUSER');
define('DB_PASS', 'THEPASSWORD');






/*
 *---------------------------------------------------------------
 * SITE TITLE
 *---------------------------------------------------------------
 *
 * Site Title
 */

define('SITE_NAME', 'Your Title Here');





/*
 *---------------------------------------------------------------
 * SITE EMAIL
 *---------------------------------------------------------------
 *
 * Site Email.
 */
 
define('SITE_EMAIL', 'info@thewebsite.com');





/*
 *---------------------------------------------------------------
 * SITE TIMEZONE
 *---------------------------------------------------------------
 *
 * Site Timezone
 */
 
date_default_timezone_set('Europe/London');
