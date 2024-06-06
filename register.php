<?php
@include 'config.php';

$error = [];

if(isset($_POST['submit'])){
    // Validate and sanitize inputs
    $username = trim($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = ($_POST['role'] === 'admin') ? 'admin' : ($_POST['role'] === 'instructor' ? 'instructor' : 'student');

    // Check if email is valid
    if (!$email) {
        $error[] = 'Please enter a valid email address.';
    }

    // Check if password and confirm password match
    if ($password !== $cpassword) {
        $error[] = 'Passwords do not match.';
    }

    if(empty($error)){
        // Hash the password securely
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if user already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if($user){
            $error[] = 'User already exists.';
        }else{
            // Insert new user into the database
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $email, $hashed_password, $role]);
            header('Location: login.php');
            exit();
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
    <title>Register Form</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<div class="form-container">
    <form action="" method="post">
        <h3>Register Now</h3>
        <?php
        if(!empty($error)){
            foreach($error as $err){
                echo '<span class="error-msg">'.$err.'</span>';
            }
        }
        ?>
        <input type="text" name="name" required placeholder="Enter your name">
        <input type="email" name="email" required placeholder="Enter your email">
        <input type="password" name="password" required placeholder="Enter your password">
        <input type="password" name="cpassword" required placeholder="Confirm your password">
        <select name="role">
            <option value="student">Student</option>
            <option value="instructor">Instructor</option>
            <option value="admin">Admin</option>
        </select>
        <input type="submit" name="submit" value="Register Now" class="form-btn">

        <p>Already have an account? <a href="login.php">Login Now</a></p>
    </form>
</div>
</body>
</html>
