<?php

/**
 * Auth
 * 
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class Auth
{
	/**
	 * FUNCTION: administrator
	 * This method checks if the current user is an Administrator
	 * If False Session is destroyed
	 * User is redirected to login as they don't have permission
	 */
	public static function administrator()
	{
		if(Session::get('Administrator') == false)
		{
			Session::destroy('Administrator');
			header('Location: ' . BASE_URL .'admin/login');
			exit();
		}
	}

	// ------------------------------------------------------------------------
	
	
	/**
	 * FUNCTION: user
	 * This method checks if the current user is logged in
	 * If False Session is destroyed
	 * User is redirected to login as they don't have permission
	 */
	public static function user()
	{
		if(Session::get('userID') == false)
		{
			Session::destroy('userID');
			header('Location: ' . BASE_URL .'login');
			exit();
		}
	}

	// ------------------------------------------------------------------------
	

	/**
	 * FUNCTION: owner
	 * This method checks if the current user is an Owner
	 * If False redirected to admin dashboard as they don't have permission
	 */
	public static function owner()
	{
		if(Session::get('Owner') == false)
		{
			Session::destroy('Owner');
			header('Location: ' . BASE_URL .'admin/dashboard');
			exit();
		}
	}

	// ------------------------------------------------------------------------
	
	
	/**
	 * FUNCTION: subscriber
	 * This method checks if the current user is logged in
	 * If False destroy the session
	 * Redirected to login
	 */
	public static function subscriber()
	{
		if(Session::get('Subscriber') == false)
		{
			Session::destroy('Subscriber');
			header('Location: ' . BASE_URL .'login');
			exit();
		}
	}

	// ------------------------------------------------------------------------
	
	
	/**
	 * FUNCTION: blogAuthor
	 * This method checks if the current user is a Blog Author
	 * If False redirected to admin dashboard as they don't have permission
	 */
	public static function blogAuthor()
	{
		if(Session::get('BlogAuthor') == false)
		{
			header('Location: ' . BASE_URL .'admin/dashboard');
			exit();
		}
	}

	// ------------------------------------------------------------------------
	
}
