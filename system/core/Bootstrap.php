<?php

/**
 * Bootstrap
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class Bootstrap
{
    /** @var null The url */
    private $_url = null;
	
    /** @var null The URL for the controller */
    private $_urlForController = null;
    
    /** @var null The Area */
    private $_area = null;

    /** @var null The Area Name */
    private $_areaName = null;

    /** @var null The Controller */
    private $_controller = null;
	
    /** @var null The Controller Name */
    private $_controllerName = null;
	
    /** @var null The Action Name */
    private $_actionName = null;
	
    /** @var null The Parameter 1 */
    private $_parameter1 = null;
	
    /** @var null The Parameter 2 */
    private $_parameter2 = null;
	
    /** @var null The Parameter 3 */
    private $_parameter3 = null;
	
	function __construct()
	{
		//start sessions
		Session::init();
        
        /**
         * Check the ENVIRONMENT for offline mode
         * Show Holding Page
         */
        if (ENVIRONMENT == 'offline')
        {
            $this->_HoldingPage();
             return false;
        }
		
        // Sets the protected $_url
        $this->_GetUrl();
		
		// If URL is empty Load Default Controller
        if (empty($this->_url[0]))
        {
            $this->_LoadDefaultController();
            return false;
        }
		
		// Check for an area
		$areaPath ='app/areas/' . $this->_urlForController[0];
		
		if (file_exists($areaPath))
		{
            // Load the Area Registration File
            require_once('app/areas/' . $this->_urlForController[0] . '/' . $this->_urlForController[0] . 'AreaRegistration.php');
            
            // Set the Area Name
			$this->_areaName = $this->_urlForController[0];
			
			// Set the theArea by appending it with 'Area'
			$theArea = $this->_areaName.'Area';
			
            // Instantiate the Area
            $this->_area = new $theArea();
			
            // if the action exists
            if (method_exists($this->_area, 'registerArea'))
            {
                // Load the action
				$areaDetails = $this->_area->{'registerArea'}();
				// Get the Default Area Controller
				$areaController = $areaDetails['areaController'];
				// Get the Default Area Action
				$areaAction = $areaDetails['areaAction'];
            }
            else
            {
                $this->_Error();
            }
				
            // Set the Controller Name
            $this->_controllerName = (empty($this->_urlForController[1]) ? $areaController : $this->_urlForController[1]);
            
            // Set File path to Controller
            $controllerPath = 'app/areas/' . $this->_areaName .'/controllers/' . $this->_controllerName . 'Controller.php';
            
            // Set the Action Name and remove hyphens
            $this->_actionName = (empty($this->_url[2]) ? $areaAction : str_replace('-', '', $this->_url[2]));
            
            // Get Parameters
            $this->_parameter1 = (empty($this->_url[3]) ? false : $this->_url[3]);
            $this->_parameter2 = (empty($this->_url[4]) ? false : $this->_url[4]);
            $this->_parameter3 = (empty($this->_url[5]) ? false : $this->_url[5]);
        }
        else
        {
            // Get the Controller Name
            $this->_controllerName = $this->_urlForController[0];
            
            // Set File path to Controller
            $controllerPath = 'app/controllers/' . $this->_controllerName . 'Controller.php';
            
            // Get the Action Name and remove hyphens
            $this->_actionName = (empty($this->_url[1]) ? 'index' : str_replace('-', '', $this->_url[1]));
            
            // Get Parameters
            $this->_parameter1 = (empty($this->_url[2]) ? false : $this->_url[2]);
            $this->_parameter2 = (empty($this->_url[3]) ? false : $this->_url[3]);
            $this->_parameter3 = (empty($this->_url[4]) ? false : $this->_url[4]);
        }
            
        // If the file exists
        if (file_exists($controllerPath))
        {			
            // Require the Controller
            require_once ($controllerPath);
            
            // Set the Controller Name by appending it with 'Controller'
			$theController = $this->_controllerName.'Controller';
            
			// Instantiate the Controller
			$this->_controller = new $theController();
            
			// if the action exists within the controller
			if (method_exists($this->_controller, $this->_actionName))
			{
				// Load the action and pass through parameters
                $this->_controller->{$this->_actionName}($this->_parameter1,$this->_parameter2,$this->_parameter3);
			}
			elseif (file_exists('app/app_start/routeConfig.php'))
			{
				// Load Route File
				require_once('app/app_start/routeConfig.php');
                
				// Set match
				$match = false;
				
				// Loop
				foreach($routeArray as $key => $value) {										
					if($value->routeArea == $this->_urlForController[0] && $value->routeController == $this->_urlForController[1])
					{						
						// Set Match
						$match = true;
                        
						// Check for an area
						$areaPath ='app/areas/' . $value->routeArea;
                      
						if (file_exists($areaPath))
						{							
							// Set the Area Name
							$this->_areaName = $value->routeArea;
                            
							// Set the Controller Name
							$this->_controllerName = $value->routeController;
                        
							// Set File path to Controller
                            $controllerPath = 'app/areas/' . $this->_areaName .'/controllers/' . $this->_controllerName . 'Controller.php';

							// Set the Action Name
							$this->_actionName = $value->routeAction;
							
							// Get Parameters
							$this->_parameter1 = (empty($this->_url[2]) ? false : $this->_url[2]);
							$this->_parameter2 = (empty($this->_url[3]) ? false : $this->_url[3]);
							$this->_parameter3 = (empty($this->_url[4]) ? false : $this->_url[4]);
						}
					}
					elseif ($value->routeController == $this->_urlForController[0])
					{
						// Set Match
						$match = true;
						
						// Get the Controller Name
						$this->_controllerName = $value->routeController;
						
						// Set File path to Controller
						$controllerPath = 'app/controllers/' . $this->_controllerName . 'Controller.php';
						
						// Get the Action Name and remove hyphens
						$this->_actionName = $value->routeAction;
						
						// Get Parameters
						$this->_parameter1 = (empty($this->_url[1]) ? false : $this->_url[1]);
						$this->_parameter2 = (empty($this->_url[2]) ? false : $this->_url[2]);
						$this->_parameter3 = (empty($this->_url[3]) ? false : $this->_url[3]);
					}

					if ($match == true)
					{
						// If the file exists
						if (file_exists($controllerPath))
						{
							// Require the Controller
							require_once ($controllerPath);
                            
							// Set the Controller Name by appending it with 'Controller'
							$theController = $this->_controllerName.'Controller';
                            
							// Instantiate the Controller
							$this->_controller = new $theController();
                            
							// if the action exists within the controller
							if (method_exists($this->_controller, $this->_actionName))
							{
								// Load the action and pass through parameters
								$this->_controller->{$this->_actionName}($this->_parameter1,$this->_parameter2,$this->_parameter3);
							}
						}
						else
						{
							$this->_Error();
						}
					}
				}// foreach
				
				if ($match == false)
				{
				    $this->_Error();
				}
			}
			else
			{
				$this->_Error();
			}
		}
		else
		{
			$this->_Error();
		}
    }

	// ------------------------------------------------------------------------


    /**
	 * _GetUrl
	 *
	 * If the URL is set Get URL Else URL is null
	 * Right Trim the URL to remove trailing slash
	 * Removes all illegal URL characters from the string
	 * Creates an Array from the URL
	 * Set the url
	 *
	 * Check URL for spaces or hyphens and set First Character after these to Uppercase
	 * Remove any hyphens
	 * Set the urlForController
	 */
	private function _GetUrl()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode('/', $url);
		$this->_url = $url;
		
		$urlForController = preg_replace_callback('/(?<=( |-|_))./',
			function ($m)
			{
				return strtoupper($m[0]);
			},
			$url);
		$urlForController = str_replace('-', '', $urlForController);
		$this->_urlForController = $urlForController;
		
		// End the function
		return false;
	}
	
	// ------------------------------------------------------------------------
	
	
    /**
	 * _HoldingPage
	 */
	private function _HoldingPage()
	{
		// Require the Controller
		require 'app/controllers/holdingController.php';
		
		// Instantiate the Controller
		$this->_controller = new HoldingController();
        
		// Call the Method
		$this->_controller->index();
		
		// End the function
		return false;
	}
        
	// ------------------------------------------------------------------------

	
    /**
	 * _LoadDefaultController
	 */
	private function _LoadDefaultController()
	{
		/**
		 * Check ENVIRONMENT
		 * If in development mode only allow access to site for admin
		 * while only showing Holding Page to users
		 */
		if (ENVIRONMENT == 'development')
		{
			$this->_HoldingPage();
		}
		else
		{
			// Require the Controller
            require 'app/controllers/homeController.php';
			
			// Instantiate the Controller	
            $this->_controller = new HomeController();
			
			// Call the Method
			$this->_controller->index();
			
			// End the function
			return false;
		}
	}
	
	// ------------------------------------------------------------------------
	
	
    /**
	 * _Error
	 */
	private function _Error()
	{
		// Require the Controller
		require_once ('app/controllers/errorController.php');
		
		// Instantiate the Controller
		$this->_controller = new ErrorController();
		
		// Call the Method
		$this->_controller->index();
		
		// End the function
		return false;
	}
	
    // ------------------------------------------------------------------------
	
}

/** eof */
