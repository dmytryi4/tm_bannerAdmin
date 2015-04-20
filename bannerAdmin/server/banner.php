<?php

class ShowBanner {

	public function showBnanneById() {
		$db = new PDO('mysql:host=localhost;dbname=db', 'root', '');	
		$sth = $db->prepare("SELECT body FROM banners WHERE id=:ban_id");
		$sth->execute(array(
		':ban_id' => $_GET['banner_id']
		));
			while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
			$body = $row['body'];
		}	
			echo $body;
	}
}

$sB = new ShowBanner();
$sB->showBnanneById();