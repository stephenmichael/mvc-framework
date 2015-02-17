<?php

/**
 * BundleConfig
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class Bundle {
	
	/**
	 * jQuery
	 */
	public static function scriptsJQuery()
	{
		echo '<script src="' . BASE_URL . 'public/scripts/vendor/jquery-1.11.0.min.js"></script>';
	}
	
	// ------------------------------------------------------------------------
	
	
	/**
	 * stylesDefault
	 */
	public static function stylesDefault()
	{
		echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . 'public/css/vendor/normalize.css">';
		echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . 'public/css/base.css?' . date('dmYHis') . '">';
		echo '<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">';
	}
	
	// ------------------------------------------------------------------------
	
	
	/**
	 * scriptsDefault
	 */
	public static function scriptsDefault()
	{
		echo '<script src="' . BASE_URL . 'public/scripts/default.js?' . date('dmYHis') . '"></script>';
	}
	
	// ------------------------------------------------------------------------
	
	
	/**
	 * stylesSite
	 */
	public static function stylesSite()
	{
		echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . 'public/css/site.css?' . date('dmYHis') . '">';
	}
	
	// ------------------------------------------------------------------------
	
	
	public static function scriptsSite()
	{
		echo '<script src="' . BASE_URL . 'public/scripts/site.js?' . date('dmYHis') . '"></script>';
	}
	
	// ------------------------------------------------------------------------
	
	
	public static function stylesAdminSite()
	{
		echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . 'public/css/admin.css?' . date('dmYHis') . '">';
	}
	
	// ------------------------------------------------------------------------
	
	
	public static function scriptsAdminSite()
	{
		echo '<script src="' . BASE_URL . 'public/scripts/admin.js?' . date('dmYHis') . '"></script>';
	}
	
	// ------------------------------------------------------------------------

}
