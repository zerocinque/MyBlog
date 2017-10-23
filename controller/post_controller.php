
<?php

$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';

	require_once $root . 'model/DB.php';

/**
* 
*/
class Post {

	private $id;
	private $title;
	private $body;
	private $tags;
	private $create;
	private $update;
	
	function __construct($id=null, $title=null, $body=null, $tags=null, $create=null, $update=null){
		$this->id = $id;
		$this->title = $title;
		$this->body = $body;
		$this->tags = $tags;
		$this->create = $create;
		$this->update = $update;
	}

	function setID($id){
		$this->id = $id;
	}

	function setFields($title, $body, $tags = null){
		$this->title = $title;
		$this->body = $body;
		$this->tags = $tags;
	}

	function getID(){
		return $this->id;
	}
	function getTitle(){
		return $this->title;
	}
	function getBody(){
		return $this->body;
	}
	function getTags(){
		return $this->tags;
	}
	function getCreate(){
		return $this->create;
	}
	function getUpdate(){
		return $this->update;
	}
	function getDate(){
		return date('jS \of F', strtotime($this->update));
	}

	function create(){
		
		$conn = new DB();

		$sql = 'INSERT INTO post(Title, Body, Tags) VALUES (?, ?, ?)';

		$state = $conn->exec($sql, array($this->title, $this->body, $this->tags));

		if(isset($state['error']))
			return $tate;

		$result = true;
		$sql = 'SELECT ID, post_create, post_update FROM post WHERE Title=?';
		$state = $conn->exec($sql, array($this->title), $result);

		$conn->close();
		$conn = null;

		if(isset($state['error']))
			return $state;

		$this->id = $result[0]['ID'];
		$this->create = $result[0]['post_create'];
		$this->update = $result[0]['post_update'];

		return $this->id != null ? $this->id : false;
	}

	function read($client = 0){
		$conn = new DB();

		$sql = 'SELECT Title, Body, Tags, post_update FROM Post WHERE ID=?';

		$results = true;

		$state = $conn->exec($sql, array($this->id), $results);
		if(isset($state['error']))
			return $state;

		if($client){
			$sql = 'UPDATE post SET views = views + 1 WHERE id = ?';
			$state = $conn->exec($sql, array($this->id));
			if(isset($state['error']))
				return $state;

		}

		$conn->close();
		$conn = null;

		/*echo '<pre>';
		var_dump($results);
		echo '</pre>';*/

		$this->title = $results[0]['Title'];
		$this->body = $results[0]['Body'];
		$this->tags = $results[0]['Tags'];
		$this->update = $results[0]['post_update'];
		return $state;
	}

	function update(){
		$conn = new DB();

		$sql = 'UPDATE Post SET Title=?, Body=?, Tags=? WHERE ID=?';
		$params = array($this->title, $this->body, $this->tags, $this->id);
		$state = $conn->exec($sql, $params);

		return $state;
	}

	function delete(){
		$conn = new DB();

		$sql = 'DELETE FROM Post WHERE ID=?';
		$params = array($this->id);
		$state = $conn->exec($sql, $params);

		return $state;
	}

}