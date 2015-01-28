<?php

/**
 * BaseController
 *
 * @author      Stephen Michael <info@stephenmichael.net>
 * @copyright   Copyright (C), 2015 Stephen Michael
 * @version     1.0
 */

class BaseController
{
    protected $_view;
	
    /**
     * __construct
     */
     public function __construct() 
     {
         $this->_view = new View();
     }
	
    // ------------------------------------------------------------------------
	
    /**
     * loadModel - Loads a Model
     *
     * @param string $modelName - The name of the Model
     * @param string $area - The Area where the Model is located
     * @return \app\$area\models
     */
    public function loadModel($modelName, $area = false)
    {
    	// Create the modelPath
    	$modelPath = 'app/';
	
	// Check if an Area has been defined
	if ($area)
	{
	    // Create the modelPath
	    $modelPath .= 'areas/' . $area . '/';
	}
		
	// Create the modelPath
	$modelPath .= 'models/'. $modelName . '.php';
		
	// Check if the Model Path Exists
	if (file_exists($modelPath))
	{
	    // Require the Model
	    require_once ($modelPath);
			
	    // Instantiate the Model
	    return new $modelName();
	}
    }

    // ------------------------------------------------------------------------
	
}
/** eof */
