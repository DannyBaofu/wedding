<?php  
$title = "All Transactions";
require_once 'partials/layout.php';
if(!isset($_SESSION["user_details"]) && !$_SESSION["user_details"]["isAdmin"]) {
	header("Location: /");
}


function get_content() {
	require_once '../controllers/connection.php';


	$query = "SELECT * FROM news ";
	$stmt = $cn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $news = $result->fetch_assoc();
?>

<div class="container">
	<div class="row">
    <h2 class="mt-5 mb-5 text-center">Upcoming and Ongoing Event</h2>
	<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
	<div class="w-100" style="overflow:hidden">
	<img src="<?php echo $news['img1'] ?>" class="d-block w-100" style="overflow:hidden" alt="...">
	</div>
      <div class="carousel-caption d-none d-md-block">
        <h5>Danny & Nancy Wedding Upcoming</h5>
        <p>12th March 2021<?php echo $news['description1'] ?></p>
      </div>
    </div>
    <div class="carousel-item">
	<div class="w-100" style="overflow:hidden">
	<img src="<?php echo $news['img2'] ?>" class="d-block w-100" style="overflow:hidden" alt="...">
	</div>
      <div class="carousel-caption d-none d-md-block">
        <h5>Micheal & Felicia Wedding Upcoming</h5>
        <p>25th April 2021<?php echo $news['description2'] ?></p>
      </div>
    </div>
    <div class="carousel-item">
	<div class="w-100" style="overflow:hidden">
	<img src="<?php echo $news['img3'] ?>" class="d-block w-100" style="overflow:hidden" alt="...">
	</div>
      <div class="carousel-caption d-none d-md-block">
        <h5>New R&B houses for honeymoon</h5>
        <p>The price is reasonable and it is definetly the best place to go for.<?php echo $news['description3'] ?></p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
	</div>
</div>
<?php if(isset($_SESSION["user_details"])&& $_SESSION["user_details"]["isAdmin"]): ?>
<button type="button" class="btn btn-primary bg-white mx-auto" data-toggle="button" aria-pressed="false" autocomplete="off">
  <a href ="news_form.php">Edit</a>
</button>
<?php endif; ?>

<?php  
}
?>