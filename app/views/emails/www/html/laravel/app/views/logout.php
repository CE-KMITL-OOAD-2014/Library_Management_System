<?php
	session_start();
	session_destroy();
	echo "Logout Complete!" ;
	echo "<br> Go to <a href='login'>Login</a>";
?>