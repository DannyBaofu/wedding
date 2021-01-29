<?php  

$title = "Product Details";

function get_content() { 
	require_once '../controllers/connection.php';
	
	$query = "SELECT * FROM categories";
	$stmt = $cn->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$categories = $result->fetch_all(MYSQLI_ASSOC);

	$id = $_GET['id'];
	$packages_query = "SELECT * FROM packages WHERE package_id = ?";
	$packages_stmt = $cn->prepare($packages_query);
	$packages_stmt->bind_param("i",$id);
    $packages_stmt->execute();
    $packages_result = $packages_stmt->get_result();
    $packages = $packages_result->fetch_assoc();
?>

<div class="container">
	<div class="row">
		<div class="col-md-4 py-5 mx-auto">
			<div class="card">
				<img src="<?php echo $packages['img'] ?>" class="card-img-top">
				<div class="card-body">
					<h5 class="card-title"><?php echo $packages["name"] ?></h5>
					<p class="card-text"><?php echo $packages['description'] ?></p>
					<strong><?php echo $packages['price'] ?></strong>
				</div>
				<?php if(isset($_SESSION["user_details"]) && !$_SESSION["user_details"]["isAdmin"]): ?>
				<div class="card-footer">
					<div class="input-group">
						<input type="number" name="quantity" class="form-control" min="1">
						<button class="btn btn-outline-success add-to-cart" data-id="<?php echo $packages['package_id'] ?>">Add to Cart</button>
					</div>
				</div>
				<?php endif; ?>

				<?php if(isset($_SESSION["user_details"]) && $_SESSION["user_details"]["isAdmin"]): ?>
				<div class="card-footer">
					<button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>

					<div class="modal fade" id="editModal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Edit Item</h5>
								</div>
								<div class="modal-body">
									<form method="POST" action="/controllers/booking/update_product.php" enctype="multipart/form-data">
										<input type="hidden" name="package_id" value="<?php echo $packages['package_id'] ?>">
										<div class="mb-3">
											<label>Name</label>
											<input type="text" name="name" class="form-control" value="<?php echo $packages['name'] ?>">
										</div>
										<div class="mb-3">
											<label>Price</label>
											<input type="number" name="price" class="form-control" value="<?php echo $packages['price'] ?>">
										</div>
										<div class="mb-3">
											<label>Image</label>
											<input type="file" name="image" class="form-control" value="<?php echo $packages['img'] ?>">
										</div>
										<div class="mb-3">
											<label>Category</label>
											<select name="category" class="form-select">
												<?php foreach($categories as $category): ?>
													<?php if($category['category'] == $product['category']): ?>
														<option selected value="<?php echo $category['category'] ?>">
															<?php echo $category['name'] ?>
														</option>
													<?php else: ?>
														<option value="<?php echo $category['category'] ?>">
															<?php echo $category["name"]; ?>
														</option>
													<?php endif; ?>
												<?php endforeach; ?>
											</select>
										</div>
										<div class='mb-3'>
											<label>Description</label>
											<textarea class="form-control" name="description" rows="5"><?php echo $packages['description'] ?></textarea>
										</div>
										<button class="btn btn-success">Update Product</button>
									</form>
								</div>

							</div>
						</div>
					</div>

					<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>

					<div class="modal fade" id="deleteModal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Are you sure you want to delete <?php echo $packages['name'] ?> ?</h5>
								</div>
								<div class="modal-footer">
									<button data-bs-dismiss="modal" class="btn btn-secondary">Cancel</button>
									<a class="btn btn-danger" href="/controllers/booking/delete_product.php?id=<?php echo $packages['package_id'] ?>">Confirm</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php  
	}
	require_once 'partials/layout.php';
?>