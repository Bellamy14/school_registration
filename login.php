<?php 
    $title='User Login';
    require_once 'includes/header.php';
    require_once 'includes/db/conn.php';

    // If data was submitted via a form post request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password . $username);

        $result = $user->getUser($username, $new_password);

        if (!$result) {

            echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again.</div>';
        
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['id'];
            header("Location: viewrecords.php");
        }
    }
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center"><?php echo $title ?></h1>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-group">
                    <label for="username">User name: *</label>
                    <input type="text" name="username" class="form-control" id="username" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
                </div>

                <div class="form-group">
                    <label for="password">Password: *</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <input type="submit" value="Login" class="btn btn-warning btn-block mb-3">
                <p class="text-center"><a href="#">Forgot Password</a></p>
            </form>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php'?>
