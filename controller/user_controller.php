<?php

	$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';


	require_once $root . 'model/DB.php';


/**
* 
*/
class User {

	private $id;
	private $username;
	private $email;
	private $password;
	private $create;
	private $last_login;
	
	function __construct($username=null, $email=null, $password=null, $create=null, $last_login=null){
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->create = $create;
		$this->last_login = $last_login;
	}

	function setID($id){
		$this->id = $id;
	}
	function getID(){
		return $this->id;
	}function getUserName(){
		return $this->username;
	}
	function getEmail(){
		return $this->email;
	}
	function getCreate(){
		return $this->create;
	}
	function getLastLogin(){
		return $this->last_login;
	}

	function setFields($username, $email, $password){
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
	}

	function create(){

		$conn = new DB();

		$sql = 'INSERT INTO user(UserName, Email, Password) VALUES (?, ?, ?)';

		$state = $conn->exec($sql, array($this->username, $this->email, $this->password));

		if (!$state) {
			return false;
		}
		//$this->id = $conn->getLastId();
		$result = true;
		$sql = 'SELECT  ID, user_create, last_login FROM user WHERE UserName=?';
		$state = $conn->exec($sql, array($this->username), $result);

		$conn->close();
		$conn = null;

		/*echo '<pre>';
		var_dump($result);
		echo '</pre>';*/

		if(!$state)
			return false;

		$this->id = $result[0]['ID'];
		$this->create = $result[0]['user_create'];
		$this->last_login = $result[0]['last_login'];

		return $this->id != null ? true : false;
			
	}

	function read(){
		$conn = new DB();

		$sql = 'SELECT UserName, Email, user_create, last_login FROM Post WHERE ID=?';
		$result = true;

		$state = $conn->exec($sql, array($this->id), $result);
		if(isset($state['error']))
			return $state;

		$conn->close();
		$conn = null;

		/*echo '<pre>';
		var_dump($result);
		echo '</pre>';*/

		$this->username = $result[0]['UserName'];
		$this->email = $result[0]['Email'];
		$this->create = $result[0]['user_create'];
		$this->last_login = $result[0]['last_login'];
		return $state;
	}

	function delete(){
		$conn = new DB();

		$sql = 'DELETE FROM User WHERE ID=?';
		$params = array($this->id);
		$state = $conn->exec($sql, $params);

		return $state;
	}

	function checkPassword($password){
		return strcmp($this->password, $password) == 0 ? true : false;
	}

	function find_user_name(){
		$conn = new DB();

		$sql = 'SELECT * FROM user WHERE UserName=?';

		$result = true;

		$state = $conn->exec($sql, array($this->username), $result);
		$conn->close();
		$conn = null;

		if(count($result) != 1)
			return false;

		$this->id = $result[0]['ID'];
		$this->email = $result[0]['Email'];
		$this->password = $result[0]['Password'];

		return $this->id != null ? true : false;
	}

	function find_email(){
		$conn = new DB();

		$sql = 'SELECT * FROM user WHERE Email=?';

		$result = true;

		$state = $conn->exec($sql, array($this->email), $result);
		$conn->close();
		$conn = null;

		if(count($result) != 1)
			return false;

		$this->id = $result[0]['ID'];
		$this->username = $result[0]['UserName'];
		$this->password = $result[0]['Password'];

		return $this->id != null ? true : false;
	}

	function login(){
		//apdate last_login
		$conn = new DB();
		$sql = 'UPDATE user SET last_login = now() WHERE ID = ?';
		return $conn->exec($sql, array($this->id));
	}

}