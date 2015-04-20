<div class="container">
	<div class="row">
		<div class="menu1">
				<br id="tab2">
				<a href="#tab1">Create Banner</a><a href="#tab2">All Banners</a>
			<div class="tab">
				
				<div id="generate"></div>
				<form method="POST" name="form" id="addAttrForm" action="">
					<textarea id="gencode" class="input"><?php Model_admin::generate();?></textarea>
					<input type="text" id="name" name="name" class="input" value="" required placeholder="Banner name "><br>
					<input type="text" id="width" name="width" class="input" value="" required placeholder="Banner width"><br>
					<input type="text" id="height" name="height" class="input" value="" required placeholder="Banner height"><br>
					<select id="page" name="page" size="1">
						<option selected="selected" value="index">Home</option>
						<option value="templates">Templates</option>
						<option value="search">Search</option>
						<option value="category">Category</option>
						<option value="contact">Contact us</option>
					</select><br>

					<select id="display" name="display" size="1"><br>
						<option selected="selected" value="none">none</option>
						<option value="block">block</option>
					</select>
					<textarea id="body" name="body" class="input" required placeholder="Banner code"></textarea><br>
					<input type="submit" name="btn" class="btn"  value="Create">
				</form><br>

			</div>
			<div class="tab" >
					<div class="container">
						<div class="row">
						   <?php echo '<table class="edit-table" cellspacing=0>';
						   		echo '<tr>
										<th>№</th>
										<th>Banner name</th>
										<th>Width</th>
										<th>Height</th>
										<th>Body</th>
										<th>Page</th>
										<th>Display</th>
									  </tr>';	
							foreach($getbanners as $banner){
								echo '<tr><td>'.$banner['banner_id'].'</td>';
								echo '<td>'.$banner['name'].'</td>';
								echo '<td>'.$banner['width'].'</td>';
								echo '<td>'.$banner['height'].'</td>';
								echo '<td>'.$banner['body'].'</td>';
								echo '<td>'.$banner['page'].'</td>';
								echo '<td>'.$banner['display'].'</td>';
								echo '<td><a href="http://localhost/editform&id='.$banner['banner_id'].'"><img class="edit" src="img/edit.png" title="edit"></a></td>'; 
	    						echo '<td><a href="http://localhost/delete&id='.$banner['banner_id'].'"><img class="edit" src="img/delete.png" title="delete"></a></td></tr>';
							} 
								echo '</table>';?>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>