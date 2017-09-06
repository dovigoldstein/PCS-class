<?php
include 'Cart.php';
if(!empty($_GET['cart_empty'])){
    session_unset();
}
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $cart->setQuantity($_POST['item'], $_POST['quantity']);
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
            <table class="table thead-inverse">
                <thead>
                    <tr>
                    <th class="col-sm-3">Item</th>
                    <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <form method="post">
                        <?php foreach($cart->getItems() as $item => $quantity): ?>
                        <tr>
                            <td><?= $item ?><input type="hidden" name="item" id="item"value="<?= $item ?>"></td>
                            <td><input class="form-control"type="number" name="quantity" id="quantity" min=0 max=10 value=<?= $quantity ?>></td>
                        <tr>
                        <?php endforeach?>
                </tbody>
            </table>    
                        <a class="btn btn-danger" href="view_cart.php?cart_empty=true">Empty Cart</a>
                        <button type="submit" class="btn btn-success">Save Changes</a>
                    </form>
            
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