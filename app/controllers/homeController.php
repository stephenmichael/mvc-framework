<?php

/**
 * HomeController
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class HomeController extends BaseController {
	
	/**
	 * __construct
	 */
	public function __construct()
	{
		parent::__construct();
	}
	
	// ------------------------------------------------------------------------


	/**
	 * PAGE: Index
	 * GET: /home
	 */
	public function index()
	{
		// ************************************** //
		// ******** SET PAGE INFORMATION ******** //
		
		// Set the Page Title ('pageName', 'pageSection', 'areaName')
		$viewData['pageTitle'] = array('Home');
		// Set Page Description
		$viewData['pageDescription'] = 'Home Page Description';
		// Set Page Section 
		$viewData['pageSection'] = 'Home';
		
		// ************************************** //
		// ******** SET PAGE INFORMATION ******** //
		

		// Render the view ($renderBody, $viewData, array(area, layout, layoutArea))
		View::render('home/index', $viewData);
	}
	
	// ------------------------------------------------------------------------
	
}
?>
