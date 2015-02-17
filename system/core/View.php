<?php

/**
 * View
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class View
{
	/**
	 * __construct
	 */
	function __construct()
	{

	}
	
	// ------------------------------------------------------------------------
	
	
    /**
	 * FUNCTION: render
	 *
	 * @param string $renderBody
	 * @param string $viewData
	 * @param mixed $attributes
     */
	public static function render($renderBody, $viewData = false, $attributes = false)
	{		
		// Build the Path to the Views Folder
		$pathToViewsFolder = 'app/';
		
		if(isset($attributes['area']))
		{
			$pathToViewsFolder .= 'areas/' . $attributes['area'] . '/';
		}
		
		$pathToViewsFolder .= 'views/';
		
		// Check if View Exists
		if (!file_exists($pathToViewsFolder . $renderBody . '.php'))
		{
			header('location: ../error');	
		}
		
		
		// Check if alternative Layout requested
		if(isset($attributes['layout']))
		{
			// Build the Path to Layout
			$pathToLayout = 'app/';
			
			if(isset($attributes['areaLayout']))
			{
				$pathToLayout .= 'areas/' . $attributes['areaLayout'] . '/';
			}
		
			$pathToLayout .= 'views/';
		
			// Check if Layout Exists
			if (!file_exists($pathToLayout . $attributes['layout'] . '.php'))
			{
				header('location: ../error');	
			}
			else
			{
		    	require_once $pathToLayout . $attributes['layout'] . '.php';
			}
		}
		else
		{
		    // Set Path to _ViewStart
		    $pathToViewStart = $pathToViewsFolder . '_viewStart.php';
		  
		    // Check if a _ViewStart file exists
		    // If the file exists require it
		    // Require the layout
		    if (file_exists($pathToViewStart)) {
			    require_once $pathToViewStart;
	    		if($layout)
				{
			    	require_once $layout;
				}
		    	else
		    	{
			    	// Require default layout
			    	require_once 'app/views/shared/_layout.php';
		    	}
		    }
		    else
		    {
			    // Require default layout
			    require_once 'app/views/shared/_layout.php';
		    }
		}
	}
	
	// ------------------------------------------------------------------------
	
	
    /**
     * FUNCTION: renderPartial
	 * @param string $renderPartial
	 * @param string $viewData
	 * @param mixed $attributes
     */
	public static function renderPartial($renderPartial, $viewData = false, $attributes = false)
	{
		// Build the Path to the Views Folder
		$pathToViewsFolder = 'app/';
		
		if($attributes['area'])
		{
			$pathToViewsFolder .= 'areas/' . $attributes['area'] . '/';
		}
		
		$pathToViewsFolder .= 'views/';
		
		require $pathToViewsFolder . $renderPartial . '.php';
	}
	
	// ------------------------------------------------------------------------
	
}
