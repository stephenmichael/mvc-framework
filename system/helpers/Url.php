<?php

/**
 * Url
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class Url {

	/**
	 * FUNCTION: redirect
	 *
	 * @param string $url  The given URL
	 */
	public static function redirect($url = null){
		header('location: ' . BASE_URL . $url);
		exit();
	}

	// ------------------------------------------------------------------------
	
	
	/**
	 * FUNCTION: httpsRedirect
	 *
	 * @param string $url The given URL
	 */
	public static function httpsRedirect($url = null){
		header('location: ' . HTTPS_BASE_URL . $url);
		exit();
	}

	// ------------------------------------------------------------------------
	
}
