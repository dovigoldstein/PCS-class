<?php
include 'Cart.php';
if(!empty($_GET['cart_empty'])){
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <div class="jumbotron text-center alert-success">
        <h1>Amazon</h1>
        <h2>Cart</h2>
    </div>
    <div class="container">
        <?php if(!empty($_SESSION['cart'])) : ?>
            <table class="table">
                <thead>
                    <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cart->getItems() as $item => $quantity): ?>
                    <tr>
                        <td><?= $item ?></td>
                        <td><?= $quantity ?></td>
                    <tr>
                    <?php endforeach?>
                </tbody>
            </table>
            <a class="btn btn-danger" href="view_cart.php?cart_empty=true">Empty Cart</a>
        <?php else:?>
            <h2 class="text-center">Your Cart Is Empty</h2>
        <?php endif ?>      
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>