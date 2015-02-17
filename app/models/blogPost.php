<?php

/**
 * BlogPost
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class BlogPost extends Model
{
	//blogPostID
	//title
	//slug
	//publishedOn
	//author
	//excerpt
	//content
	//status

	
	/**
	 * __construct
	 */
	public function __construct()
	{
		parent::__construct();
	}
	
	// ------------------------------------------------------------------------
	
	
	/**
	 * FUNCTION: getLatest
	 * This function gets the latest blog posts
	 * @param int $limit Limit
	 */
	public function getLatest($limit = 3)
	{		
		return $this->_db->select('SELECT * FROM blogPost as bp
			INNER JOIN user as u ON bp.author = u.userID
			WHERE bp.status = :status
			ORDER BY publishedOn
			LIMIT :limit', array(':status' => 'Publish', ':limit' => $limit));	
	}
	
	// ------------------------------------------------------------------------
	
	
	/**
	 * FUNCTION: createPost
	 * This function adds new blog post to the Database.
	 * Admin access is required for this function.
	 */
	public function createPost($data)
	{
		// Administrator Access
		Auth::administrator();
		
		// Insert into the Database
		$this->_db->insert('blogPost', $data);
	}
	
	// ------------------------------------------------------------------------
	
	
	/**
	 * FUNCTION: editPost
	 * This function updates a blog post in the Database.
	 * Admin access is required for this function.
	 */
	public function editPost($data, $where)
	{
		// Administrator Access
		Auth::administrator();
		
		// Update in the Database
        $this->_db->update('blogPost', $data, $where);
	}
	
	// ------------------------------------------------------------------------	
	
}
