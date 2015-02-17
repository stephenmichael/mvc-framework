<?php

/**
 * LoginController
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */
 
class LoginController extends BaseController {
	
	/**
	 * __construct
	 */
	public function __construct() {

		parent::__construct();
		
	    // Load the User Model ($modelName, $area)
		$this->_userModel = $this->loadModel('user');
		
	    // Load the Roadblock Model ($modelName, $area)
		$this->_roadblockModel = $this->loadModel('roadblock');
	}
	
	// ------------------------------------------------------------------------
	
	
	/**
	 * PAGE: Index
	 * GET: /admin/login
	 * This method handles the admin login page
	 */
	public function index()
	{
		// ************************************** //
		// ******** SET PAGE INFORMATION ******** //
		
		// Set the Page Title ('pageName', 'pageSection', 'areaName')
		$this->_view->pageTitle = array('login', '', 'admin');
		// Set Page Description
		$this->_view->pageDescription = 'This log in is for Administrators only';
		// Set Page Section 
		$this->_view->pageSection = 'Login';
		
		// ************************************** //
		// ******** SET PAGE INFORMATION ******** //	
		
		
		// Render the view ($renderBody, $area, $layout, $layoutArea)
		$this->_view->render('login/index', 'admin', 'shared/_layout-minimal');
	}

	// ------------------------------------------------------------------------

}
?>
