<?php
    $title = "Homepage";
    function get_content(){
    require_once 'controllers/connection.php';
    $query = "SELECT * FROM categories";
    $stmt = $cn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $categories = $result->fetch_all(MYSQLI_ASSOC);
    
    $products_query = "SELECT * FROM products";
    $products_stmt = $cn->prepare($products_query);
    $products_stmt->execute();
    $products_result = $products_stmt->get_result();
    $products = $products_result->fetch_all(MYSQLI_ASSOC);
    
	  $user_query = "SELECT * FROM products ";
	  $user_stmt = $cn->prepare($user_query);
	  $user_stmt->execute();
	  $user_result = $user_stmt->get_result();
    $user = $user_result->fetch_assoc();

    $event_query = "SELECT * FROM events ";
	  $event_stmt = $cn->prepare($event_query);
	  $event_stmt->execute();
	  $event_result = $event_stmt->get_result();
    $event = $event_result->fetch_assoc();

    $friends_query = "SELECT * FROM friends ";
	  $friends_stmt = $cn->prepare($friends_query);
	  $friends_stmt->execute();
	  $friends_result = $friends_stmt->get_result();
    $friends = $friends_result->fetch_all(MYSQLI_ASSOC);

    $packages_query = "SELECT * FROM packages";
    $packages_stmt = $cn->prepare($packages_query);
    $packages_stmt->execute();
    $packages_result = $packages_stmt->get_result();
    $packages = $packages_result->fetch_all(MYSQLI_ASSOC);
    
   
    // echo $_SESSION['user_details']['user_id'];
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dreamwork Production | <?php echo $title; ?> </title>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap" media="print" onload="this.media='all'"/>
<noscript>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap"/>
</noscript>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap" media="print" onload="this.media='all'"/>
<noscript>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap"/>
</noscript>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheetintegrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link gref="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>
      <body id="top" data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0">
<div class="page-content">
    <div class="div">
        <div class="ww-home-page" id="home">
            <div class="ww-wedding-announcement d-flex align-items-center justify-content-start">
                <div class="container ww-announcement-container">
                    <p class="ww-couple-name ww-title aos-init aos-animate" data-aos="zoom-in-down" data-aos-delay="300" data-aos-duration="1000">
                    <?php echo $user['groom']?> &amp; <?php echo $user['bride']?></p> 
                    <!--Home Showing Page-->
                    <p class="h2 mt-5 ww-title aos-init aos-animate" data-aos="zoom-in-down" data-aos-delay="300" data-aos-duration="1000" data-aos-offset="10"><?php echo $user['date']?><sup>th</sup> ,  <?php echo $user['h']?>h:  <?php echo $user['m'] ?> m: <?php echo $user['s']?>s</p> 
                    <!--Time display-->
                </div>
            </div>
        </div>
<div class="ww-section" id="couple">
    <div class="container">
        <h2 class="h1 text-center pb-3 ww-title aos-init aos-animate" data-aos="zoom-in-down" data-aos-duration="1000">Groom &amp; Bride</h2>
            <div class="row text-center"> 
                <div class="col-md-6">
                    <div class="mt-3">
                        <img class="img-fluid aos-init aos-animate" src="<?php echo $user['image'] ?>" alt="Groom" data-aos="flip-left" data-aos-duration="1000">
                        <p class="pt-3 text-left ">Hi I am <?php echo $user['groom']?>, </p>
                        <p class="ww-text">
                        Lorem ipsum dolor sit amet consectetur adipiscing, elit nulla enim arcu dictum lobortis, ac congue non hendrerit accumsan. Ut penatibus litora platea mi mus tempus eros proin, maecenas hac eget hendrerit inceptos per tempor sodales, id varius nulla commodo augue lectus pulvinar. Etiam suscipit leo sollicitudin vivamus tempor himenaeos vitae mattis dictum posuere, tincidunt aenean litora aptent facilisis eu est gravida.<?php echo $user ['description'] ?><!--Groom profile intro--> </p>
                        <h3 class="h2 ww-title"><?php echo $user['groom'] ?><!--Groom name--></h3>
                    <div class="ww-social-links"><a class="btn btn-link" href="#"><i class="fa fa-facebook-f" aria-hidden="true"></i></a><a class="btn btn-link" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a class="btn btn-link" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
                </div>
            </div>


                  <div class="col-md-6">
                      <div class="mt-3">
                          <img class="img-fluid aos-init aos-animate" src="<?php echo $user['image1']?>" alt="Bride" data-aos="flip-right" data-aos-duration="1000">
                          <p class="ww-text pt-3 text-left ">Hi I am <?php echo $user['bride']?>, </p> 
                          <p class="ww-text ">
                          Lorem ipsum dolor sit amet consectetur adipiscing, elit nulla enim arcu dictum lobortis, ac congue non hendrerit accumsan. Ut penatibus litora platea mi mus tempus eros proin, maecenas hac eget hendrerit inceptos per tempor sodales, id varius nulla commodo augue lectus pulvinar. Etiam suscipit leo sollicitudin vivamus tempor himenaeos vitae mattis dictum posuere, tincidunt aenean litora aptent facilisis eu est gravida.<?php echo $user ['description1'] ?> <!--Bride profile intro--></p>
                          <h3 class="h2 ww-title"><?php echo $user ['bride'] ?> <!--Bride name--></h3>
                      <div class="ww-social-links"><a class="btn btn-link" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></i></a><a class="btn btn-link" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></i></a><a class="btn btn-link" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></i></a></div>
                      </div>
                      </div>
                      <?php if(isset($_SESSION["user_details"])&& $_SESSION["user_details"]["isAdmin"]): ?>
                      <button type="button" class="btn btn-primary bg-white" data-toggle="button" aria-pressed="false" autocomplete="off">
                        <a href ="views/couple.php?id=<?php echo $user['product_id'] ?>">Edit</a>
                      </button>
                      <?php endif; ?>
                      </form>
                  </div>
                </div>
            </div>


<div class="ww-section bg-light" id="events">
    <div class="container ww-wedding-event">
      <h2 class="h1 text-center pb-3 ww-title aos-init aos-animate" data-aos="zoom-in-down" data-aos-duration="1000">Wedding Events</h2>
    <div class="row">
      <div class="col-md-7 col-sm-12">
        <div class="my-3">
          <div class="h4">Wedding Party</div>
              <ul>
              <li><i class="text-muted fas fa-map-marker-alt"></i><span class="pl-2 text-muted"><?php echo $event['address1'] ?></span></li>
              <li class="pt-2"><i class="text-muted far fa-calendar-alt"></i><span class="pl-2 "> The Event will be starting at : <?php echo $event['time_date'] ?></span></li>
              </ul>
          </div>
        </div>

<div class="col-md-5 col-sm-12">
    <div class="my-3">
        <img class="img-fluid aos-init aos-animate" src="<?php echo $event['img1'] ?>" alt="Wedding Party" data-aos="fade-down-right" data-aos-duration="1000"></div>
    </div>
</div>

<div class="row">
    <div class="col-md-7 col-sm-12">
      <div class="my-3">
        <div class="h4">Reception</div>
          <ul>
            <li><i class="text-muted fas fa-map-marker-alt "></i><span class="pl-2 text-muted"><?php echo $event['address2'] ?></span></li>
            <!-- <li class="pt-2"><i class="text-muted far fa-calendar-alt "></i><span class="pl-2 "> The Event will be starting at : </span></li> -->
            <li class="pt-2"><i class="text-muted far fa-calendar-alt"></i><span class="pl-2 "> The Event will be starting at : <?php echo $event['time'] ?></span></li>
          </ul>
          <p><?php echo $event['description2'] ?></p>
        </div>
      </div>
<div class="col-md-5 col-sm-12">
    <div class="my-3">
      <img class="img-fluid aos-init aos-animate" src="<?php echo $event['img2'] ?>" alt="Reception" data-aos="fade-up-right" data-aos-duration="1000">
        </div>
      </div>
      <?php if(isset($_SESSION["user_details"])&& $_SESSION["user_details"]["isAdmin"]): ?>
      <button type="button" class="btn btn-primary bg-white" data-toggle="button" aria-pressed="false" autocomplete="off">
      <a href ="views/weddingevents.php?id=<?php echo $event['event_id'] ?>">Edit</a>
      </button>
      <?php endif; ?>
    </div>
  </div>
</div>


<div class="ww-section" id="people">
  <div class="container ww-couple-friends">
    <h2 class="h1 text-center pt-3 ww-title" data-aos="zoom-in-down" data-aos-duration="1000">Groomsmen & Bridesmaids</h2>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
          <?php foreach($friends as $friend): ?>
            <div class="col-md-4">
              <div class="card d-block mb-3"><img class="card-img-top" src="<?php echo $friend['img'] ?>" alt="Groom Men 1"/>
                <div class="card-body text-center">
                  <div class="h5"><?php echo $friend['fullname'] ?></div>
                  <p class="mb-0 text-muted"><?php echo $friend['position'] ?></p>
                  <p class="text-muted"><?php echo $friend['wedding_position'] ?></p>
                  <div class="ww-social-links"><a class="btn btn-link " href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a class="btn btn-link" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a class="btn btn-link" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
                </div>
              </div>
              <?php if(isset($_SESSION["user_details"])&& $_SESSION["user_details"]["isAdmin"]): ?>
              <button type="button" class="btn btn-primary bg-white" data-toggle="button" aria-pressed="false" autocomplete="off">
              <a href ="views/friends.php?id=<?php echo $friend['friends_id'] ?>">Edit</a>
              </button>
              <?php endif; ?>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="ww-section bg-light" id="gallery">
  <div class="ww-photo-gallery">
    <div class="container">
      <h2 class="h1 text-center pb-3 ww-title" data-aos="zoom-in-down" data-aos-duration="1000">Photo Gallery</h2>
      <div class="col-md-12 text-center ww-category-filter mb-4"><a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="all">All</a><a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="vacation">Our Vacation</a><a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="party">Party</a><a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="ceremony">Ceremony</a><a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="wedding">Wedding</a></div>
      <div class="ww-gallery" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-duration="1000" data-aos-offset="0">
        <div class="card-columns">
          <div class="card" data-groups="[&quot;vacation&quot;,&quot;ceremony&quot;]"><a href="images/gallery-pic-1.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="images/gallery-pic-1.jpg" alt="Gallery Pic 1"/></a></div>
          <div class="card" data-groups="[&quot;party&quot;,&quot;wedding&quot;]"><a href="images/gallery-pic-2.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="images/gallery-pic-2.jpg" alt="Gallery Pic 2"/></a></div>
          <div class="card" data-groups="[&quot;vacation&quot;]"><a href="images/gallery-pic-3.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="images/gallery-pic-3.jpg" alt="Gallery Pic 3"/></a></div>
          <div class="card" data-groups="[&quot;party&quot;,&quot;vacation&quot;]"><a href="images/gallery-pic-4.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="images/gallery-pic-4.jpg" alt="Gallery Pic 4"/></a></div>
          <div class="card" data-groups="[&quot;vacation&quot;]"><a href="images/gallery-pic-5.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="images/gallery-pic-5.jpg" alt="Gallery Pic 5"/></a></div>
          <div class="card" data-groups="[&quot;wedding&quot;,&quot;ceremony&quot;,&quot;party&quot;]"><a href="images/gallery-pic-6.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="images/gallery-pic-6.jpg" alt="Gallery Pic 6"/></a></div>
          <div class="card" data-groups="[&quot;vacation&quot;]"><a href="images/gallery-pic-7.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="images/gallery-pic-7.jpg" alt="Gallery Pic 7"/></a></div>
          <div class="card" data-groups="[&quot;wedding&quot;,&quot;party&quot;]"><a href="images/gallery-pic-8.jpg" data-toggle="lightbox" data-gallery="ww-gallery"><img class="img-fluid" src="images/gallery-pic-8.jpg" alt="Gallery Pic 8"/></a></div>
        </div>
      </div>
    </div>
  </div>
</div>
  

<div class="ww-section ww-rsvp-detail text-white" id="rsvp">
    <div class="container " data-aos="zoom-in-up" data-aos-duration="1000">
      <div class="col text-center">
        <h2 class="h1 ww-title pb-3" data-aos="zoom-in-down" data-aos-duration="1000">Join Our Party</h2>
      </div>

<div class="row ww-rsvp-form">
    <div class="col-md-10">
      <div class="card-body">
      <form method="POST" action="/controllers/update_data/reservation.php" enctype="multipart/form-data">
      <div class="row">
        <div class="col md-6 pb-3">
          <div class="form-group">
            <label for="name-input">Your Name*</label>
            <input class="form-control" id="name-input" type="text" name="name" required="required">
          </div>
        </div>

        <div class="col-md-6 pb-3">
          <div class="form-group">
            <label for="email-input">Your Email*</label>
            <input class="form-control" id="email-input" type="email" name="email" required="required">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col md-6 pb-3">
          <div class="form-group">
            <label for="guest-input">Number of Guests</label>
            <select class="form-control" id="guest-input" name="guest">
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
            <option value="4">Four</option>
            </select>
          </div>
        </div>
        
        <div class="col-md-6 pb-3">
            <div class="form-group">
                <label for="events-input">I am Attending</label>
                <select class="form-control" id="events-input" name="events">
                <option value="0">All Events</option>
                <option value="1">Wedding ceremony</option>
                <option value="2">Reception Party</option>
                </select>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col">
              <div class="form-group">
                <label for="message-input">Your Message</label>
                <textarea class="form-control" id="message-input" name="message" rows="4"></textarea>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col text-center mt-5">
            <button class="btn btn-primary btn-submit" type="submit">Send</button>
          </div>
        </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="scripts/jquery.min.js?ver=1.1.0"></script>
<script src="scripts/bootstrap.bundle.min.js?ver=1.1.0"></script>
<script src="scripts/main.js?ver=1.1.0"></script>

</body>
</html>


<div class="container" id="contact">
  <?php if(isset($_SESSION["user_details"]) && $_SESSION["user_details"]["isAdmin"]): ?>
	<form class="py-5 col-md-6 mx-auto" method="POST" action="/controllers/booking/add_product.php" enctype="multipart/form-data">
		<div class="mb-3">
  			<label>Name</label>
  			<input type="text" name="name" class="form-control">
		</div>
		<div class="mb-3">
  			<label>Price</label>
  			<input type="number" name="price" class="form-control">
		</div>
		<div class="mb-3">
  			<label>Image</label>
  			<input type="file" name="image" class="form-control">
		</div>
		<div class="mb-3">
			<label>Category</label>
  			<select name="category" class="form-select">
  				<?php foreach($categories as $category): ?>
  					<option value="<?php echo $category['category_id'] ?>">
  						<?php echo $category["name"]; ?>
  					</option>
  				<?php endforeach; ?>
  			</select>
		</div>
		<div class='mb-3'>
			<label>Description</label>
			<textarea class="form-control" name="description" rows="5"></textarea>
		</div>
		<button class="btn btn-success">Add Product</button>
	</form>
<?php endif; ?>
</div>
<?php if(isset($_SESSION["user_details"])): ?>
<h1 class="h1 text-center pt-3 ww-title mt-5" data-aos="zoom-in-down" data-aos-duration="1000"> Our Package </h1>
<h5 class="h1 text-center pt-3 ww-title" data-aos="zoom-in-down" data-aos-duration="1000"> - The perfect wedding where dreams come true. </h5>
<div class="row">
    <?php foreach($packages as $package): ?>
        <div class="col-md-4 py-5">
            <div class="card">
                <img src="<?php echo $package['img'] ?>" class="card-img-top">
                <div class="card-body">
                <a href = "/views/products.php?id=<?php echo $package['package_id']?>" class="card-title">
                    <h5 class="card-title"><?php echo $package['name']?></h5></a>
                    <p c;accesskey="card-text"><?php echo $package['description'];?></p>
                    <strong>RM <?php echo $package['price']?></strong>
                </div>
                <?php if(isset($_SESSION["user_details"])&& !$_SESSION["user_details"]["isAdmin"]): ?>
                <div class="card-footer">
                    <div class="input-group">
                        <input type="number" name="quanti1ty" min="1" class="form-control">
                        <button class="btn btn-outline-success add-to-cart" data-id="<?php echo $package['package_id'] ?>" >Add To Cart</button>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>

<script>
var countDownDate = <?php echo strtotime("$date $h:$m:$s" ) ?> * 1000;
var now = <?php echo time() ?> * 1000;

// Update the count down every 1 second
var x = setInterval(function() {
now = now + 1000;
// Find the distance between now an the count down date
var distance = countDownDate - now;
// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);

// Output the result in an element with id="demo"
document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
minutes + "m " + seconds + "s ";
// If the count down is over, write some text 
if (distance < 0) {
clearInterval(x);
 document.getElementById("demo").innerHTML = "EXPIRED";
}
    
}, 1000);

    </script>



<?php
    }
    require_once 'views/partials/layout.php';
?>