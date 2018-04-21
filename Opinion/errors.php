<?php 
	if (count($errors)>0) {
		echo '<div class="error">';
		foreach ($errors as $error) {
			echo '<p style="margin:0px;">'.$error.'</p>';
		}
		echo '</div>';
	}
?>