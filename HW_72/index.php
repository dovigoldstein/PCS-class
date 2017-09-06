<?php
require_once 'db.php';
$db = database::getInstance();
if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(!empty($_POST['user_signup']) && !empty($_POST['password_signup'])){
        $user_name = $_POST['user_signup'];
        $password = $_POST['password_signup'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        try {
            $insert = "INSERT INTO `passwords`(`user_name`, `password`) VALUES (:user_name,:password)";
            $statement = $db->getDB()->prepare($insert);
            $statement->bindValue('user_name',$user_name);
            $statement->bindValue('password',$hash);
            $statement->execute();
            $submitted = "Welcome " . $user_name;
        } catch (PDOException $e) {
            $systemError = "ERROR: " . $e->getMessage();
        }
    }
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
        <h1>Welcome</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class ="col-md-5 card">
                <h3 class="text-center">Create Account</h3>
                <form method="post">
                    <div class="form-group">
                        <label for="user_signup">User Name</label>
                        <input type="text" class="form-control" id="user_signup" name="user_signup" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <label for="password_signup">Password</label>
                        <input type="password" class="form-control" id="password_signup" name="password_signup" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            <div class ="col-md-5 ml-auto card">
                <h3 class="text-center">Log In</h3>
                <form action="mySecurePage.php" method="post">
                    <div class="form-group">
                        <label for="user_login">User Name</label>
                        <input type="text" class="form-control" id="user_login" name="user_login" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password_login" name="password_login" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
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