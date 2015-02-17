<?php

/**
 * Session
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class Session
{
	private static $_sessionStarted = false;
	
	public static function init()
	{
		if(self::$_sessionStarted == false){
			session_start();
			self::$_sessionStarted = true;
		}
	}
	
	// ------------------------------------------------------------------------
	
	
	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}
	
	// ------------------------------------------------------------------------
	
	
	public static function get($key)
	{
		if(isset($_SESSION[$key]))
		return $_SESSION[$key];
	}
	
	// ------------------------------------------------------------------------
	
	
	public static function display()
	{
		return $_SESSION;
	}
	
	// ------------------------------------------------------------------------
	
	
	public static function destroy($key){

		if(isset($_SESSION[$key]))
		unset($_SESSION[$key]);
	}
	
	// ------------------------------------------------------------------------
	
	
	public static function destroyAll(){

		if(self::$_sessionStarted == true){
			session_unset();
			session_destroy();
		}

	}
	
	// ------------------------------------------------------------------------

}
