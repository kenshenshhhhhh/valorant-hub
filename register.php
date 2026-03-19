<?php 
include 'db.php'; 
include 'includes/header.php'; 
?>

<div class="container">
  <h2>Register</h2>

  <form method="POST">
    <input name="username" placeholder="Username" required>
    <input name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button name="register">Register</button>
  </form>

<?php
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username,email,password)
            VALUES ('$username','$email','$password')";

    if($conn->query($sql)){
        echo "Registered successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
</div>

<?php include 'includes/footer.php'; ?>