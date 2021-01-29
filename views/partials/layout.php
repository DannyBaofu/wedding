<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Wedding Website |<?php echo $title; ?></title>
</head>
<body>
    <?php session_start(); ?>
    <?php require_once 'nav.php' ?>

<main>
    <?php get_content(); ?>
</main>

    <?php require_once 'footer.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script type="text/javascript">
    //synchronous line per line will be executed
    //asynchronous (it will only happen if there is condition met)
    // fetch("https://jsonplaceholder.typicode.com/posts")
    // .then(response =>response.json())
    // .then(data =>console.log(data))
    let addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach((indiv_button,i )=> {
        indiv_button.addEventListener('click',()=> {
            let id = indiv_button.getAttribute("data-id")
            let quantity = indiv_button.previousElementSibling.value

            // alert("Item id: " + id + "quantity added: " + quantity);
            let formBody = new FormData; // creating a form here <form></form>
            formBody.append('id',id);
            formBody.append('quantity',quantity);

            //{} stands for object
            //fetch("url",options)
            fetch("controllers/cart/add_to_cart.php", {
                method:"POST" ,
                body:formBody
            })
            .then(res => rex.text())
            .then(data => {
                let cartCount = document.getElementById('cart_count')
                if(parseInt(cartCount.innerHTML)==0) {
                    cartCount.innerHTML = parseInt(quantity);
                } else {
                    cartCount.innerHTML = parseInt(cartCount.innerHTML) + parseInt(quantity);
                }
            })
        })
    })
</script>
</body>
</html>