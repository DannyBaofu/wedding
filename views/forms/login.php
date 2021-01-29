<?php  
	$title = "Login";
	function get_content() {
		
?>
<link rel="stylesheet" href="..assets/css/style.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin">
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap" media="all" onload="this.media='all'">
	<form class="col-md-6 mx-auto py-5" method="POST" action="/controllers/auth/login.php">
		<div class="mb-3">
			<label>Username</label>
			<input type="text" name="username" class="form-control">
		</div>
		<div class="mb-3">
			<label>Password</label>
			<input type="password" name="password" class="form-control">
		</div>
		<button class="btn btn-primary">Login</button>
	</form>
<?php  
	}
	require_once '../partials/layout.php';
?>
