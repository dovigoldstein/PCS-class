<?php
include 'Cart.php';
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $cart->addItem($_POST['item'], $_POST['quantity']);
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
    <div class="jumbotron text-center">
        <h1>Amazon</h1>
    </div>
    <div class="container">
        <form method="post">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="item">Select Item</label>
                    <select class="form-control" name="item"id="item">
                    <option>apple</option>
                    <option>orange</option>
                    <option>banana</option>
                    <option>lemon</option>
                    <option>pear</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="quantity">Quantity</label>
                    <input class="form-control"type="number" name="quantity" id="quantity" min=1 max=10 value=1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-6 col-sm-3">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
                    <a class="btn btn-success" href="view_cart.php">View Cart</a>
                </div>
            </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>