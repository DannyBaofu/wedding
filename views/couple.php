<?php  

$title = "Product Details";
function get_content() { 
require_once '../controllers/connection.php';

?>
<form method="POST" class="mx-auto py-5" action="/controllers/update_data/update_profile.php" enctype="multipart/form-data">
<input type="hidden" name="product_id" value="<?php echo $_GET['id'] ?>">
<div class="container">
<fieldset>

<!-- Form Name -->
<legend class="text-center">Edit Couple Biography</legend>

<!-- Text input-->
<div class="form-group mt-4">
  <label class="col-md-4 control-label" for="textinput">Groom</label>  
  <div>
  <input id="textinput" name="groom" type="text" placeholder="Type the groom name " class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group mt-4">
  <label class=" col-md-4 control-label" for="textarea">The biography</label>
  <div>                     
    <textarea class="form-control" id="textarea" name="description">Story of U</textarea>
  </div>
</div>

<div class="form-group mt-4">
  <label class="col-md-4 control-label" for="textinput">Bride</label>  
  <div>
  <input id="textinput" name="bride" type="text" placeholder="Type the groom name " class="form-control input-md">
    
  </div>
</div>

<div class="form-group mt-4">
  <label class="col-md-4 control-label" for="textarea">The biography</label>
  <div >                     
    <textarea class="form-control" id="textarea" name="description1">Story of U</textarea>
  </div>
</div>

<div class="form-group mt-4">
  <label class="col-md-4 control-label" for="textinput">Wedding Date</label>  
  <div>
  <input id="textinput" name="date" type="date" placeholder="Wedding date " class="form-control input-md">
    
  </div>
</div>
<div class="form-group mt-4">
  <label>Image Groom</label>
  <input type="file" name="image" class="form-control" value="<?php echo $product['image'] ?>">
</div>
<div class="form-group mt-4">
  <label>Image Bride</label>
  <input type="file" name="image1" class="form-control" value="<?php echo $product['image1'] ?>">
</div>

</fieldset>
<button id="button1id" name="button1id" class="btn btn-warning mt-3">Save</button>
</div>
</form>


<?php  
}
	require_once 'partials/layout.php';
?>