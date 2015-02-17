<?php

/**
 * Database
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class Database extends PDO
{
    
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME.';charset=utf8', $DB_USER, $DB_PASS);
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
    }
	
	// ------------------------------------------------------------------------
	
    
    /**
     * select
     * @param string $sql An SQL Query
     * @param array $array Paramters to bind
     * @param constant $fetchMode A PDO Fetch mode
     * @return mixed
     */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_OBJ)
    {
        $sth = $this->prepare($sql);
		
        foreach ($array as $key => $value)
		{
			if(is_int($value)){
				$sth->bindValue("$key", $value, PDO::PARAM_INT);
			}
			else
			{
				$sth->bindValue("$key", $value);
			}
        }
		
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }
	
	// ------------------------------------------------------------------------
	

    /**
     * insert
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function insert($table, $data)
    {
        ksort($data);
        
        $fieldNames = implode(', ', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        
        $sth = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");
        
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        
        $sth->execute();
    }
	
	// ------------------------------------------------------------------------
	
    
    /**
     * update
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where the WHERE query part
     */
    public function update($table, $data, $where){
		
		ksort($data);

		$fieldDetails = NULL;
		
		foreach($data as $key => $value)
		{
			$fieldDetails .= "$key = :$key,";
		}
		
		$fieldDetails = rtrim($fieldDetails, ',');

		$whereDetails = NULL;
		$i = 0;
		
		foreach($where as $key => $value)
		{
			if($i == 0)
			{
				$whereDetails .= "$key = :$key";
			}
			else
			{
				$whereDetails .= " AND $key = :$key";
			}
			
			$i++;
		}
		
		$whereDetails = ltrim($whereDetails, ' AND ');

		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $whereDetails");

		foreach($data as $key => $value)
		{
			$sth->bindValue(":$key", $value);
		}

		foreach($where as $key => $value)
		{
			$sth->bindValue(":$key", $value);
		}

		$sth->execute();

	}
	
	// ------------------------------------------------------------------------
	
    
    /**
     * delete
     * 
     * @param string $table
     * @param string $where
     * @param integer $limit
     * @return integer Affected Rows
     */
    public function delete($table, $where, $limit = 1)
    {
		ksort($where);
		
		$whereDetails = NULL;
		$i = 0;
		
		foreach($where as $key => $value)
		{
			if($i = 0)
			{
				$whereDetails .= "$key = :$key";
			}
			else
			{
				$whereDetails .= " AND $key = :$key";
			}
			
			$i++;
		}
		
		$whereDetails = ltrim($whereDetails, ' AND ');
		
		if(is_numeric($limit))
		{
			$theLimit = "LIMIT $limit";
		}
		
        $sth = $this->prepare("DELETE FROM $table WHERE $whereDetails $theLimit");
		
		foreach($where as $key => $value)
		{
			$sth->bindValue(":$key", $value);
		}
		
		$sth->execute();
    }
	
	// ------------------------------------------------------------------------
    
}
