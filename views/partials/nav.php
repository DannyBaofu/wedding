<link rel="stylesheet" href="../../assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<div class="ww-nav-bar sticky-top bg-light">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
          <h1 class="h2">
          <a class="pl-4 navbar-brand" href="#">Dreamwork Production</a></h1>
          <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse text-uppercase" id="navbarNavAltMarkup"> -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link smooth-scroll" href="/">Home</a></li>
                    <?php if(isset($_SESSION["user_details"]) && $_SESSION["user_details"]["isAdmin"]): ?>
                      <li  class="nav-item"><a class="nav-link smooth-scroll" href="/views/transaction.php">User's Transactions</a></li>
                      <li  class="nav-item"><a class="nav-link smooth-scroll" href="/controllers/auth/logout.php">Logout</a></li>
                    <?php elseif(isset($_SESSION["user_details"]) && !$_SESSION["user_details"]["isAdmin"]): ?>
                      <li  class="nav-item"><a class="nav-link smooth-scroll" href="/views/cart.php">
                    Cart
                        <span class="badge bg-primary"id="cart_count">
                    <?php if(isset($_SESSION['cart'])&& count($_SESSION['cart'])): ?>
                    <?php echo array_sum($_SESSION["cart"])?>
                    <?php else: ?>
                      0
                      </li>
                    <?php endif; ?>
                      </a>
                      <li class="nav-item"><a class="nav-link smooth-scroll" href="#couple">Couple</a></li>
                    <li class="nav-item"><a class="nav-link smooth-scroll" href="#events">Events</a></li>
                    <li class="nav-item"><a class="nav-link smooth-scroll" href="#people">People</a></li>
                    <li class="nav-item"><a class="nav-link smooth-scroll" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link smooth-scroll" href="#rsvp">RSVP</a></li>
                    <li class="nav-item"><a class="nav-link smooth-scroll" href="#contact">View Our Plans</a></li>
                      <li  class="nav-item"><a class="nav-link smooth-scroll" href="/views/my_transactions.php">My Transactions</a></li>
                      <li  class="nav-item"><a class="nav-link smooth-scroll" href="/controllers/auth/logout.php">Logout</a></li>
                      <?php else: ?>
                        <li  class="nav-item"><a class="nav-link smooth-scroll" href="/views/forms/register.php">Register</a></li>
                        <li  class="nav-item"><a class="nav-link smooth-scroll" href="/views/forms/login.php">Login</a></li>
                      <?php endif; ?>
                </ul>
          </div>
      </div>
  </nav>
</div>

