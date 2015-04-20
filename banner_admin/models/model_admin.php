<?php

Class Model_Admin { 

	//проверка существует ли сессия
	public function checkSession() {
		Session::init();
		if(Session::get('loggedIn')!=true)
		{
			header('Location: /login');
		}
	}

	//генерирование кода для вставки
	public static function generate() {

		echo htmlspecialchars('<iframe id="banner" src="" width="0" height="0" style="display: none;"></iframe>')."<br>";
		echo htmlspecialchars('<script type="text/javascript">')."<br>";
		echo "var author = ".Session::get('id').";<br>";
		echo htmlspecialchars('</script>');
	}

	//создание баннера и добавлнеие в БД
	public function createBanner(){
		$this->db = new Database();
		if (!empty($_POST))
	    {
			$sth = $this->db->prepare("INSERT INTO banners
							(id,name,iduser,width,height,display,body) 
							VALUES(NULL,:name,:iduser,:width,:height,:display,:body)");
			$sth->execute(array(
			':name'=>$_POST['name'],
			':iduser' => Session::get('id'),
			':width'=>$_POST['width'],
			':height'=>$_POST['height'],
			':display'=>$_POST['display'],
			':body'=>$_POST['body']
			));

			$lastIDBanner=$this->db->lastInsertId();
			$sth1 = $this->db->prepare("INSERT INTO url (id, page) VALUES(NULL,:page)");
			$sth1->execute(array(
			':page'=>$_POST['page']
			));
			$lastID=$this->db->lastInsertId();
			$sth2 = $this->db->prepare("INSERT INTO banner_url (id,banner_id) VALUES(:lastID, :lastIDBanner)");
			$sth2->execute(array(
			':lastID'=>$lastID,
			':lastIDBanner' =>$lastIDBanner
			));
		}
	}
	//получение баннеров по автору создания
	public function getBanner() {

			$this->db = new Database();
			$all = array();
			$sth =  $this->db->prepare("SELECT * FROM banners
									INNER JOIN banner_url
									ON banners.id = banner_url.banner_id
									INNER JOIN url
									ON banner_url.id = url.id
		 							WHERE iduser=:author");

			$sth->execute(array(
			':author' => Session::get('id')
			));
			while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
				 $all[] = $row;
			}
			return $all;
	}

	// Функция формирует форму для редактирования записи в таблице БД 
	public  function get_edit_banner_form() {
	 
	 		$this->db = new Database();
			$banner = array();
			$sth =  $this->db->prepare("SELECT * FROM banners
									INNER JOIN banner_url
									ON banners.id = banner_url.banner_id
									INNER JOIN url
									ON banner_url.id = url.id
		 							WHERE banner_id=:id");

			$sth->execute(array(
			':id' => $_GET['id']
			));

			while ( $row = $sth->fetch(PDO::FETCH_ASSOC)) {
				 $banner[] = $row;
			}

			return $banner;		
	} 

	// Функция обновляет запись в таблице БД  
	public function update_item() { 

			$this->db = new Database();
			$sth =  $this->db->prepare("UPDATE banners SET banners.name = :name, banners.width=:width, banners.height=:height,
			banners.display=:display, banners.body=:body WHERE banners.id=:id");

			$sth->execute(array(
			':name' => $_POST['name'],
			':width' => $_POST['width'],
			':height' => $_POST['height'],
			':display' => $_POST['display'],
			':body' => $_POST['body'],
			':id' => $_GET['id']
			));

			$sth1 =  $this->db->prepare("UPDATE url SET url.page = :page WHERE url.id=:url_id"); 
			$sth1->execute(array(
			':page' => $_POST['page'],
			':url_id' => $_POST['id']
			));

			header( 'Location: /admin#tab2' );
			die();
	} 

	// Функция удаляет запись в таблице БД 
	public function delete_item() { 
			
   			$this->db = new Database();
			$sth =  $this->db->prepare("SELECT id FROM banner_url WHERE banner_id=:banner_id");
			$sth->execute(array(
			':banner_id' => $_GET['id']
			));
			while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
				$id = $row['id'];
			}	

			$sth1 =  $this->db->prepare("DELETE FROM url WHERE url.id=:id_url");
			$sth1->execute(array(
			':id_url' => $id
			)); 
			
			$sth2 =  $this->db->prepare("DELETE FROM banners WHERE banners.id=:id");
			$sth2->execute(array(
			':id' => $_GET['id']
			)); 
  			header( 'Location: /admin#tab2' );
  			die();
	} 
}