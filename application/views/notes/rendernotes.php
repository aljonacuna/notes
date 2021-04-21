<!DOCTYPE html>
	<html>
	<head>
		
	</head>
	<body>
		<?php
		$count = 0;
		  foreach($notes as $note)
		  {  
		  	$count++;
		  	?>
		    <div class="note">
		    	<form action="notes/update" method="post" class="update" id="update">
		    		<p>
		    			<input type="hidden" name="id" value="<?= $note['id'] ?>">
		    			<p class="update-title-p"><?= $note['title'] ?></p>
		    			<input type="text" name="title" class="update-title" 
		    			id="update-title<?= $count ?>" value="<?= $note['title']?>" placeholder="title">
		    			<textarea class="update-desc" name="desc" id="<?= $count ?>"><?= $note['description'] ?></textarea>
	    			</p>
	    			<p>
	    				<input type="submit" value="Update" id="update-btn<?= $count ?>" class="update-btn">
	    			</p>
	    		</form>
	    		<form action="notes/delete" method="post" class="delete" id="delete">
	    			<input type="hidden" name="id" value="<?= $note['id'] ?>">
	    			<input type="submit" value="Delete" id="delete-btn">
	    		</form>
		    </div>
		<?php
  			}  ?>

	</body>
</html>