<?php 

$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';


	require_once $root . 'model/DB_credential.php';
		
	class DB{

		private $DB_connection;
		private $DB_host;
		private $DB_name;
		private $DB_username;
		private $DB_password;
		
		private $link;

		function __construct($DB_connection=DB_CONNECTION, $DB_host=DB_HOST, $DB_name=DB_NAME, $DB_username=DB_USERNAME, $DB_password=DB_PASSWORD){

			$this->DB_connection = $DB_connection;
			$this->DB_host = $DB_host;
			$this->DB_name = $DB_name;
			$this->DB_username = $DB_username;
			$this->DB_password = $DB_password;
			$this->link = $this->connection();
		}


		private function connection(){

			try {
			    $conn = new PDO($this->DB_connection.':host='.$this->DB_host.';dbname='.$this->DB_name, $this->DB_username, $this->DB_password);
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    return $conn;
		    }catch(PDOException $e){

		    	return array('error' => $e->getCode());
		    }
		}

		function close(){
			$this->link = null;
		}

		function getLastId(){
			return $this->link->LastInsertId();
		}

		function countRow($query, $parameters=array()){
			
		}

		function exec($query, $parameters=array(), &$results=null){
			try{

				$stmt = $this->link->prepare($query);
				$state = $stmt->execute($parameters);

				if($results != null)
					$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

				return array('state' => $state);

			}catch(PDOException $e){
				return array('error' => $e->getCode());
			}
		}

		/*function exec($query, $parameters=array(), &$results=null, $class=null){
			try{

				$stmt = $this->link->prepare($query);
				$state = $stmt->execute($parameters);
				echo $class;

				if($results != null){
					$stmt->setFetchMode(PDO::FETCH_CLASS, $class);
					$results = $stmt->fetchAll();
					var_dump($results);
				}

				return $state;

			}catch(PDOException $e){

				trigger_error('SQL error '.$e->getMessage(), E_USER_ERROR);

			}
		}*/


	}
