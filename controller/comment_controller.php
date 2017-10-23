<?php

	require('../model/DB.php');


/**
* 
*/
class Comment {

	private $id;
	private $text;
	private $userid;
	private $postid;
	private $create;
	private $parent;
	

	//// AGGIUNGERE create!!!!!!!!!1

	function __construct($text=null, $userid=null, $postid=null, $create=null, $parent=null){
		$this->text = $text;
		$this->userid = $userid;
		$this->postid = $postid;
		$this->create = $create;
		$this->parent = $parent;
	}

	function setID($id){
		$this->id = $id;
	}

	function setFields($text, $userid, $postid, $parent=null){
		$this->text = $text;
		$this->userid = $userid;
		$this->postid = $postid;
		$this->parent = $parent;
	}

	function create(){

	}

	function read(){

	}

	function update(){

	}

	function delete(){
		
	}


}