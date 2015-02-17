<?php

/**
 * Page
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class Page {

	/**
	 * Function: getPageTitle
	 * @param mixed $pageTitle - An array of the Page Title
	 */
	public static function getPageTitle($pageTitle)
	{
		$theTitle = '';
		
		// Loop through the array
    	foreach(array_filter($pageTitle) as $value)
    	{
  			$theTitle .= $value . ' - ';
		}
		
		// Add the Site Name 
    	$theTitle .= SITE_NAME;
		
		// Return the Page Title
		return $theTitle;
	}

	// ------------------------------------------------------------------------
	
	
	/**
	 * Function: getPageDescription
	 * @param mixed $pageDescription - An array of the Page Description
	 */
	public static function getPageDescription($pageDescription)
	{
		$theDescription = $pageDescription;
		
		// Return the Page Description
		return $theDescription;
	}

	// ------------------------------------------------------------------------
	
	
	/**
	 * Function: getPageCss
	 * @param mixed $pageCss - An array of the Page Css
	 */
	public static function getPageCss($pageCss)
	{
		$theCss = '';
		
		// Loop through the array
    	foreach($pageCss as $value)
    	{
			$theCss .= '<link rel="stylesheet" type="text/css" href="' . BASE_URL;
			$theCss .= !empty($value->theArea) ? 'app/areas/' . $value->theArea . '/' : '';
			$theCss .= 'public/css/' . $value->theFile . '.css">';
		}
		
		// Return the Page Css
		return $theCss;
	}

	// ------------------------------------------------------------------------
	

	/**
	 * Function: getPageJs
	 * @param mixed $pageJs - An array of the Page Js
	 */
	public static function getPageJs($pageJs)
	{
		$theJs = '';
			
		// Loop through the array
    	foreach($pageJs as $value)
    	{
			$theJs .= '<script src="' . BASE_URL;
			$theJs .= !empty($value->theArea) ? 'app/areas/' . $value->theArea . '/' : '';
			$theJs .= 'public/scripts/' . $value->theFile . '.js"></script>';
		}
		
		// Return the Page Js
		return $theJs;
	}

	// ------------------------------------------------------------------------
	
}
