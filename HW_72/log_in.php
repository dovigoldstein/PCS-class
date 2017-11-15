<?php
require "httpsonly.php";
require_once 'db.php';
// require_once 'Identifier.php';
// if($_SERVER['REQUEST_METHOD'] === "POST"){

// }
if(!empty($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
    header("Location: mySecurePage.php");
    exit;
}
if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(!empty($_POST['user_signup']) && !empty($_POST['password_signup'])){
        $user_name = $_POST['user_signup'];
        $password = $_POST['password_signup'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        try {
            $insert = "INSERT INTO `passwords`(`user_name`, `password`) VALUES (:user_name,:password)";
            $statement = database::getInstance()->getDB()->prepare($insert);
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

<?php include 'top.php' ?>
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
                    <?php if(isset($submitted)) {echo "<span class='text-primary'>$submitted</p>";} ?>
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
<?php include 'bottom.php' ?>