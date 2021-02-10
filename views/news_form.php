<?php  

$title = "Product Details";
function get_content() { 
require_once '../controllers/connection.php';

?>
<form method="POST" class="w-100 mx-auto py-5" action="/controllers/update_data/update_news.php" enctype="multipart/form-data">
<input type="hidden" name="new_id" value="<?php echo $_GET['id'] ?>">
<div class="container">
<fieldset>
<legend class="text-center">Edit News Feeds ! </legend>

<div class="form-group mt-3">
  <label class="col-md-4 control-label mt-4" for="textinput">Image 1</label>  
  <div>
  <input id="file" name="img1" type="file" placeholder="Insert for first slide " class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label mt-4" for="textarea">Description 1st slide</label>
  <div>                     
  <input id="textinput" name="description1" type="text" placeholder="Description " class="form-control input-md">
  </div>
</div>

<div class="form-group mt-3">
  <label class="col-md-4 control-label mt-4" for="textinput">Image 2</label>  
  <div>
  <input id="file" name="img2" type="file" placeholder="Insert for second slide " class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label mt-4" for="textarea">Description 2nd slide</label>
  <div>                     
  <input id="textinput" name="description2" type="text" placeholder="Description " class="form-control input-md">
  </div>
</div>

<div class="form-group mt-3">
  <label class="col-md-4 control-label mt-4" for="textinput">Image 3</label>  
  <div>
  <input id="file" name="img3" type="file" placeholder="Insert for third slide " class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label mt-4" for="textarea">Description 3rd slide</label>
  <div>                     
  <input id="textinput" name="description3" type="text" placeholder="Description " class="form-control input-md">
  </div>
</div>

</fieldset>
<button id="button1id" name="button1id" class="btn btn-warning mt-4">Save</button>
</div>
</form>


<?php  
}
	require_once 'partials/layout.php';
?>
