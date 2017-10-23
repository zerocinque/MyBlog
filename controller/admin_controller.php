<?php

$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';

	require_once $root . 'model/DB.php';

/**
* 
*/
class Admin {

	public $id;
	public $user_name;
	public $password;
	
	function __construct($user_name=null, $password=null){
		$this->user_name = $user_name;
		$this->password = $password;
	}

	function setUserName($user_name){
		$this->user_name = $user_name;
	}

	function setFields($user_name, $password){
		$this->user_name = $user_name;
		$this->password = $password;
	}

	function getID(){
		return $this->id;
	}
	function getUserName(){
		return $this->user_name;
	}
	function getPassword(){
		return $this->password;
	}


	function find(){
		$conn = new DB();

		$sql = 'SELECT ID, Password FROM Administrator WHERE UserName=?';

		$results = true;

		$state = $conn->exec($sql, array($this->user_name), $results);

		$conn->close();
		$conn = null;

		if(count($results)!=1)
			return false;


		/*echo '<pre>';
		var_dump($state);
		var_dump($results);
		echo '</pre>';*/

		$this->id = $results[0]['ID'];
		$this->password = $results[0]['Password'];
		//echo "<br>fine create<br>";
		return $this->id != null ? true : false;
	}

	function compare($input_user){
		if(strcmp($this->user_name, $input_user->user_name) != 0){
			return false;
		}
		if(strcmp($this->password, $input_user->password) != 0){
			return false;
		}

		return true;
	}

}