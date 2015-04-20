<?php

class BannerProperties {
		public function __construct() {
  			
		}

		public function getBannerPropetries() {
			$db = new PDO('mysql:host=localhost;dbname=db', 'root', '');
			$sth = $db->prepare("SELECT * FROM banners
									INNER JOIN banner_url
									ON banners.id = banner_url.banner_id
									INNER JOIN url
									ON banner_url.id = url.id
									WHERE iduser=:author AND url.page=:url AND display='block' ORDER BY RAND() LIMIT 1");

			$sth->execute(array(
			':author' => $_GET['author'],
			':url' => $_GET['url']
			));
			while ($row = $sth->fetch(PDO::FETCH_ASSOC)){		
					echo json_encode($row);
			}
		}
	}

	$co= new BannerProperties();
	$co->getBannerPropetries();