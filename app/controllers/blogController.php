<?php

/**
 * BlogController
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class BlogController extends BaseController {
	
	/**
	 * __construct
	 */
	public function __construct()
	{
		parent::__construct();
		
	    // Load the Blog Post Model ($modelName, $area)
		$this->_blogPostModel = $this->loadModel('blogPost');
	}
	
	// ------------------------------------------------------------------------


	/**
	 * PAGE: Index
	 * GET: /blog/index
	 */
	public function index()
	{
		// Get all published posts
		$viewData['posts'] = $this->_blogPostModel->getAll('Publish');
		
		
		// ************************************** //
		// ******** SET PAGE INFORMATION ******** //
		
		// Set the Page Title ('pageName', 'pageSection', 'areaName')
		$viewData['pageTitle'] = array('Blog', 'Resources');
		// Set Page Description
		$viewData['pageDescription'] = 'Blog Page Description';
		// Set Page Section 
		$viewData['pageSection'] = 'Resources';
		// Set Page SubSection 
		$viewData['pageSubSection'] = 'Blog';
		
		// Set Page Specific CSS
		$pageCss[] = (object) array('theFile' => 'blogCss', 'theArea' => false);
		$viewData['pageCss'] = $pageCss;
		// Set Page Specific Javascript		
		$pageJs[] = (object) array('theFile' => 'blogJs', 'theArea' => false);
		$viewData['pageJs'] = $pageJs;
		
		// ************************************** //
		// ******** SET PAGE INFORMATION ******** //
		

		// Render the view ($renderBody, $viewData, array(area, layout, layoutArea))
		View::render('blog/index', $viewData);
	}
	
	// ------------------------------------------------------------------------
	
	
	/**
	 * PARTIAL: _getLatest
	 * GET: /blog/_latest
	 */
	public function getLatest()
	{
		// Get latest posts
		$viewData['latest'] = $this->_blogPostModel->getLatest();
	

		// Render the partial view ($renderBody, $viewData, array(area))
		View::renderPartial('blog/_latest', $viewData);
	}
	
	// ------------------------------------------------------------------------
	
}
?>
