<?php 
/**
 * 
 */
 class home
 {
 	protected $db;
 	public function __construct()
 	{
 		include 'libs/db.php';
 		$this->db = new db();
 	}
 	public function GET()
 	{
 		return $this->db->fetchAll("Select * from users",[]);
 	}
 	public function POST()
 	{
        print_r($_POST);
        
 		include 'libs/form.php';
        $form = new form();
 		if($form->check([$_POST["username"],$_POST["password"]])){
            return $this->db->fetch("insert into users(username,password) values(?,?)",[$_POST["username"],$_POST["password"]]);
            
        }
        return "-1";
    }
 	public function PUT()
 	{
        parse_str(file_get_contents("php://input"),$_POST);
       	include 'libs/form.php';
        $form = new form();
 		if($form->check([$_POST["id"],$_POST["username"],$_POST["password"]])){
            $this->db->fetch("update users set username =?,password=? where user_id = ?",
            	[$_POST["username"],$_POST["password"],$_POST["id"]]);
            return true;
        }
        return false;
 		
 	}
 	public function DELETE()
 	{
 		parse_str(file_get_contents("php://input"),$_POST);
       	include 'libs/form.php';
        $form = new form();
 		if($form->check([$_POST["id"]])){
            $this->db->fetch("delete from users where user_id = ?",
            	[$_POST["id"]]);
            return true;
        }
        return false;

 	}
 }