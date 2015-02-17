<?php

/**
 * Form
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class Form {
	
	/**
	 * __construct
	 */
	 public function __construct()
	 {
		 
	 }
	 
	// ------------------------------------------------------------------------
	

	/**
	 * ACTION: Check Form Input
	 * This method sanatizes the form input fields
	 */
	public static function checkInput($data)
	{
		$data = trim($data);
		$data = strip_tags($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// ------------------------------------------------------------------------
	
}
