<?php

/**
 * ErrorController
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class ErrorController extends BaseController {
	
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
	 * GET: /error/index
	 */
	public function index()
	{		
		// ************************************** //
		// ******** SET PAGE INFORMATION ******** //
		
		// Set the Page Title ('pageName', 'pageSection', 'areaName')
		$viewData['pageTitle'] = array('Error');
		// Set Page Description
		$viewData['pageDescription'] = 'An Error has occurred.';
		// Set Page Section 
		$viewData['pageSection'] = 'Error';
		
		// ************************************** //
		// ******** SET PAGE INFORMATION ******** //
		

		// Render the view ($renderBody, $viewData, array(area, layout, layoutArea))
		View::render('error/index', $viewData);
	}
	
	// ------------------------------------------------------------------------
	
	
	/**
	 * PARTIAL: _PartialError
	 * GET: /error/_partial_error
	 */
	public function partialError()
	{
		// Render the Partial View ($renderPartial)
		View::renderPartial('error/_partial-error');
	}
	
	// ------------------------------------------------------------------------
	
}
?>
