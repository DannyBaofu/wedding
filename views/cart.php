<?php  
	$title = "My Cart";
	function get_content() {
	require_once '../controllers/connection.php';
?>

	<div class="container py-5">
		<?php if(isset($_SESSION["cart"]) && count($_SESSION['cart'])): ?>

		<table class="table table-hover">
			<thead class="table-dark">
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
 				$total = 0;
				foreach($_SESSION['cart'] as $id => $quantity):
                $packages_query = "SELECT * FROM packages WHERE package_id = ?";
                $packages_stmt = $cn->prepare($packages_query);
                $packages_stmt->bind_param("i",$id);
                $packages_stmt->execute();
                $packages_result = $packages_stmt->get_result();
                $packages = $packages_result->fetch_assoc();
				$subtotal = floatval($packages['price']) * intval($quantity);
                $total += $subtotal;
				?>
				<tr>
					<td><?php echo $packages["name"] ?></td>
					<td><?php echo $packages["price"] ?></td>
					<td>
						<form action="/controllers/cart/update_cart.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
							<input class="quantity_input" type="number" name="quantity" value="<?php echo $quantity ?>">
						</form>
					</td>
					<td><?php echo number_format($subtotal, 2); ?></td>
					<td>
						<a href="/controllers/cart/delete_cart_item.php?id=<?php echo $id ?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<td>
						<a href="/controllers/cart/empty_cart.php" class="btn btn-danger">Empty Cart</a>
					</td>
					<td>
						<!-- <button class="btn btn-outline-success" data-bs-toggle="modal"data-bs-target="#checkout-modal">Checkout</button> -->

						<div class="modal fade" id="checkout-modal">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Confirm Checkout</h5>
									</div>
									<div class="modal-body">
										<p>Are you really sure about your orders?</p>
										<strong>Total: <?php echo number_format($total,2) ?></strong>
									</div>
									<div class="modal-footer">
										<button class="btn btn-secondary" data-bs-dismiss="modal">Close
										</button>
										<a href="/controllers/cart/checkout.php?pid=1" class="btn btn-success">Checkout</a>
									</div>
								</div>
							</div>
						</div>
					</td>
					<td id="paypal-button-container">
					
					</td>
					<td>
					Total: <?php echo number_format($total,2) ?>
					</td>
				</tr>
			</tbody>
		</table>

		<?php else: ?>
		<h2>Your cart is empty</h2>
		<a href="/">Go back to shopping.</a>
		<?php endif; ?>
	</div>

	<script src="https://www.paypal.com/sdk/js?client-id=AWslSGI_tOkBQX6po_1jAnpu5ye3OQXgVEfli5KPWm6VF4Cb7HYDqndfH78wePdDjfXDgk9KPerO96dL"></script>


	<script>

paypal.Buttons({
	createOrder: function(data, actions) {
		return actions.order.create({
			purchase_units: [{
				amount: { value: <?php echo number_format($total, 2); ?> }
			}]
		})
	},
	onApprove: function(data, actions) {
		return actions.order.capture().then(function(details) {
			alert("Transaction completed by " + details.payer.name.given_name)
			fetch('/controllers/cart/checkout.php?pid=2')
		})
	}
}).render('#paypal-button-container');

</script>


<script type="text/javascript">
    let quantityInputs = document.querySelectorAll('.quantity_input');
    quantityInputs.forEach(input => {
        input.addEventListener('change', () => {
            input.parentElement.submit();
        })
    })
</script>

<?php  
	}
	require_once 'partials/layout.php';
?>