<?php
@include 'config.php';

session_start();

$error = [];

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email is provided
    if(empty($email)){
        $error[] = 'Please enter your email.';
    }

    // Check if password is provided
    if(empty($password)){
        $error[] = 'Please enter your password.';
    }

    if(empty($error)){
        // Prepare and execute the query
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        if($row){
            // Verify password
            if(password_verify($password, $row['password'])){
                // Set session variables based on user type
                if($row['role'] == 'instructor'){
                    $_SESSION['instructor_name'] = $row['name'];
                    header('location: instructor_page.php');
                    exit();
                } elseif($row['role'] == 'student'){
                    $_SESSION['student_name'] = $row['name'];
                    header('location: courses.php');
                    exit();
                }
            } else {
                $error[] = 'Incorrect email or password.';
            }
        } else {
            $error[] = 'User not found.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<div class="form-container">
    <form action="" method="post">
        <h3>Login Now</h3>
        <?php
        if(!empty($error)){
            foreach($error as $err){
                echo '<span class="error-msg">'.$err.'</span>';
            }
        }
        ?>
        <input type="email" name="email" required placeholder="Enter your email">
        <input type="password" name="password" required placeholder="Enter your password">
        <input type="submit" name="submit" value="Login Now" class="form-btn">
        <p>Forgot your password? <a href="reset_password.php">Reset it here</a></p>
        <p>Don't have an account? <a href="register.php">Register Now</a></p>
    </form>
</div>
</body>
</html>
