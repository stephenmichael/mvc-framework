<?php

/**
 * AdminArea
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class AdminArea
{
	/**
	 * Register Admin Area
	 */
	public static function registerArea()
	{    
		$area = array(
			"areaName" => "Admin",
			"areaUrl" => "admin/",
			"areaController" => "login",
			"areaAction" => "index"
		);
		
		return $area;
	}
	
	// ------------------------------------------------------------------------
	
}
