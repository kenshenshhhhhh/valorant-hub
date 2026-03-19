<?php 
include 'db.php'; 
include 'includes/header.php'; 
?>

<form method="POST">
    <input name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button name="login">Login</button>
</form>

<?php
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if($user && password_verify($password,$user['password'])){
        $_SESSION['user_id'] = $user['id'];
        header("Location: timeline.php");
    } else {
        echo "Invalid login";
    }
}
?>

<?php include 'includes/footer.php'; ?>