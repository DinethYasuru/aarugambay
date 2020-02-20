<?php
if(isset($_POST['submit'])){
	$user=$_POST['user'];
	$pass=md5($_POST['pass']);

	if ($user == "")
		echo '  <input id="user" class="form-control" type="text" required data-error-msg="The email is required in valid format!">';
}
?>