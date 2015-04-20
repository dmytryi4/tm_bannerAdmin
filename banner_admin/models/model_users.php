<?php

Class Model_Users { 

	public function getUser(){
		$this->db = new Database();
		if (isset($_POST['login']) && isset($_POST['password']))
		{
			$sth = $this->db->prepare("SELECT id FROM users WHERE login = :login and password= md5(:password)");
			$sth->execute(array(
			':login' => $_POST['login'],
			':password' => $_POST['password']
			));	

			while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
				$id = $row['id'];
			}	
	  		$count = $sth->rowCount();
			if($count > 0) {
				Session::init();
				Session::set('id', $id);
				Session::set('loggedIn',true);
				header('Location: /admin');
			} else {
				echo "Invalid login or password!";
			}
		}
	}	
	
}