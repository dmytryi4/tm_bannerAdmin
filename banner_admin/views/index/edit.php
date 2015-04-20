<div class="container">
	<div class="row">
<?php
	foreach($banner as $ban){
		echo '<form name="editform" id="editform" action="http://localhost/update&id='.$_GET['id'].'" method="POST">'; 
		 echo '<label><h2>Edit Banner</h2></label><br>'; 
		echo '<label>Banner name:</label><br>'; 
		echo '<input type="text" name="name" class="input" value="'.$ban['name'].'"><br>'; 
		echo '<label>width:</label><br>'; 
		echo '<input type="text" name="width" class="input" value="'.$ban['width'].'"><br>'; 
		echo '<label>height:</label><br>'; 
		echo '<input type="text" name="height" class="input" value="'.$ban['height'].'"><br>'; 
?>
		<label>page:</label> <br>
		<select id="page" name="page" size="1">
				<option value="index" <?php if($ban['page']=='index'){?>selected="selected"<?php }?>>Home</option>
				<option value="templates" <?php if($ban['page']=='templates'){?>selected="selected"<?php }?>>Templates</option>
				<option value="search" <?php if($ban['page']=='search'){?>selected="selected"<?php }?>>Search</option>
				<option value="category" <?php if($ban['page']=='category'){?>selected="selected"<?php }?>>Category</option>
				<option value="contact" <?php if($ban['page']=='contact'){?>selected="selected"<?php }?>>Contact us</option>
		</select><br>
		<label>display:</label><br>
		<select id="display" name="display" size="1">
				<option value="none" <?php if($ban['display']=='none'){?>selected="selected"<?php }?>>none</option>
				<option value="block"<?php if($ban['display']=='block'){?>selected="selected"<?php }?>>block</option>
		</select><br>
<?php 
		echo '<label>body: </label><br>'; 
		echo '<textarea name="body" id="body" class="input">'.$ban['body'].'</textarea><br>'; 
		echo '<input type="hidden" name="id" class="input" value="'.$ban['id'].'"><br>'; 
		echo '<input type="submit" name="btnsave" class="btn" value="Save">'; 
		echo '<input type="submit" name="btncancel" class="btn" onClick="history.back();" value="Cancel">'; 
		echo '</form>'; 
	}?>
	</div>
</div>