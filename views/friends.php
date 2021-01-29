<?php  

$title = "Product Details";
function get_content() { 
require_once '../controllers/connection.php';

?>
<form method="POST" class="w-100 mx-auto py-5" action="/controllers/update_data/update_friend.php" enctype="multipart/form-data">
<input type="hidden" name="friend_id" value="<?php echo $_GET['id'] ?>">
<div class="container">
<fieldset>
<legend class="text-center">Edit GroomMens & Bridemaids </legend>

<div class="form-group mt-3">
  <label class="col-md-4 control-label mt-4" for="textinput">Fullname</label>  
  <div>
  <input id="textinput" name="fullname" type="text" placeholder="Type the groom name " class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label mt-4" for="textarea">Relationship to Groom or Bride</label>
  <div>                     
  <input id="textinput" name="position" type="text" placeholder="Type the groom name " class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label mt-4" for="textinput">GroomMens or BrideMaids</label>  
  <div>
  <input id="textinput" name="wedding_position" type="text" placeholder="Type the groom name " class="form-control input-md">
  </div>
</div>

<div class="form-group">
<label class="mt-4">Image</label>
<input type="file" name="image" class="form-control" value="<?php echo $event['image'] ?>">
</div>

</fieldset>
<button id="button1id" name="button1id" class="btn btn-warning mt-4">Save</button>
</div>
</form>


<?php  
}
	require_once 'partials/layout.php';
?>
