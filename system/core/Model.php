<?php

/**
 * Model
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */
 
class Model
{
	protected $_db;
	
	function __construct()
	{
		$this->_db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
	}
	
	// ------------------------------------------------------------------------
}

/** eof */
