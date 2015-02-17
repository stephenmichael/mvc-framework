<?php

/**
 * Debug
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class Debug {

	/**
	 * Function: printr
	 * $data mixed An array of data
	 */
	public static function printr($data)
	{
    	echo '<pre>';
    	print_r($data);
    	echo '</pre>';
	}

	// ------------------------------------------------------------------------
	
}
