	
	<?php
		session_start();
			if ($_SESSION['status'] == 'logged_in') {
				echo "Inloggad";
			}
			else {
				echo "inte inloggad";
			}
		?>