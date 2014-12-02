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
		return $sth->fetch(PDO::FETCH_ASSOC);
 	}
 	public function fetchAll($sql,array $args)
 	{
 		$sth = $this->link->prepare($sql);
		$sth->execute($args);
		return $sth->fetchAll(PDO::FETCH_ASSOC);
 	}
 } ?>