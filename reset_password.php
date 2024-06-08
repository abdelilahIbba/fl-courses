<?php
@include 'config.php';

session_start();

$error = '';

if(isset($_POST['submit'])){
    $email = $_POST['email'];

    // Check if email is provided
    if(empty($email)){
        $error = 'Please enter your email.';
    } else {
        // Prepare and execute the query
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if($user){
            // Generate a unique token for password reset
            $reset_token = bin2hex(random_bytes(32));

            // Update the user's record with the reset token
            $stmt = $pdo->prepare("UPDATE users SET reset_token = ? WHERE email = ?");
            $stmt->execute([$reset_token, $email]);

            // Send a reset link to the user's email (You need to implement this part)

            // Redirect to a page indicating that the reset link has been sent
            header('location: reset_link_sent.php');
            exit();
        } else {
            $error = 'User not found.';
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
    <title>Reset Password</title>
    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
<div class="form-container">
    <form action="" method="post">
        <h3>Reset Password</h3>
        <?php if(!empty($error)): ?>
            <span class="error-msg"><?php echo $error; ?></span>
        <?php endif; ?>
        <input type="email" name="email" required placeholder="Enter your email">
        <input type="submit" name="submit" value="Reset Password" class="form-btn">
    </form>
</div>
</body>
</html>
