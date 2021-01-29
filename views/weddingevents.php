<?php  

$title = "Events";
function get_content() { 
require_once '../controllers/connection.php';

?>
<form method="POST" class="mx-auto py-5" action="/controllers/update_data/update_event.php" enctype="multipart/form-data">
<div class="container">
<input type="hidden" name="event_id" value="<?php echo $_GET['id'] ?>">
<fieldset>

<!-- Form Name -->
<legend class="text-center">Edit Wedding Events </legend>

<!-- Text input-->
<div class="form-group mt-3">
  <label class="col-md-4 control-label " for="textinput">Wedding Party Address</label>  
  <div>
  <input id="textinput" name="address1" type="text" placeholder="Type the address " class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group mt-3">
  <label class="col-md-4 control-label" for="textarea">The time for the event</label>
  <div>                     
  <input id="textinput" name="time_date" type="time" placeholder="Type the address " class="form-control input-md">
  </div>
</div>

<div class="form-group mt-3">
  <label class="col-md-4 control-label" for="textarea">Description of wedding party</label>
  <div>                     
    <textarea class="form-control" id="textarea" name="description1"></textarea>
  </div>
</div>

<div class="form-group mt-3">
  <label class="col-md-4 control-label" for="textinput">Reception Address</label>  
  <div>
  <input id="textinput" name="address2" type="text" placeholder="Type the address " class="form-control input-md">
    
  </div>
</div>

<div class="form-group mt-3">
  <label class="col-md-4 control-label" for="textarea">The time for the event</label>
  <div>                     
    <input class="form-control input-md" id="textinput" name="time" type="time"></input>
  </div>
</div>

<div class="form-group mt-3">
  <label class="col-md-4 control-label" for="textarea">Description of wedding party</label>
  <div>                     
    <textarea class="form-control" id="textarea" name="description2"></textarea>
  </div>
</div>

<div class="form-group mt-3">
<label>Image for wedding party</label>
<input type="file" name="img1" class="form-control" value="<?php echo $product['img1'] ?>">
</div>
<div class="form-group mt-3">
<label>Image for Reception</label>
<input type="file" name="img2" class="form-control" value="<?php echo $product['img2'] ?>">
</div>

</fieldset>
<button class="btn btn-warning mt-4">Save</button>
</form>
</div>

<?php  
}
	require_once 'partials/layout.php';
?>