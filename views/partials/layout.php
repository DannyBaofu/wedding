<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/> -->
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