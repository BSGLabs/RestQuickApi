<?php 
/**
 * 
 */
 class db
 {
 	protected $link;
 	function __construct()
 	{
 		$this->link = new  PDO('mysql:host=localhost;dbname=bsg;charset=utf8', "root","");
	
 	}
 	public function fetch($sql,array $args)
 	{
 		$sth = $this->link->prepare($sql);
		$sth->execute($args);
		$data = $sth->fetch(PDO::FETCH_ASSOC);
		return ( $data === false)? $this->link->lastInsertId() : $data;
 	}
 	public function fetchAll($sql,array $args)
 	{
 		$sth = $this->link->prepare($sql);
		$sth->execute($args);
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		return ( $data === false)? $this->link->lastInsertId() : $data;
 	}
 }