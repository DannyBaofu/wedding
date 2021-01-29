<?php 
    $title = "Register";
    function get_content(){
?>
<link rel="stylesheet" href="..assets/css/style.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin">
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap" media="all" onload="this.media='all'">
<form action="/controllers/auth/register.php" method="POST" class="col-md-6 mx-auto py-5">
        <div class="mb-3">
            <label>Groom First Name</label>
            <input type="text" name="firstname" class="form-control">
        </div>
        <div class="mb-3">
            <label>Bride First Name</label>
            <input type="text" name="lastname" class="form-control">
        </div>
        <div class="mb-3">
            <label>Username to login</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Address</label>
            <input type="address" name="address" class="form-control">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password2" class="form-control">
        </div>
        <button class="btn btn-primary">Register</button>
</form>

<?php
    }
    require_once '../partials/layout.php';
?>