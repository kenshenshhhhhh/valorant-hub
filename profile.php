<?php 
include 'db.php'; 
include 'includes/header.php'; 
?>

<div class="container">
<h2>My Profile</h2>

<?php
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

echo "<h4>".$user['username']."</h4>";
echo "<p>".$user['email']."</p>";
?>

<hr>

<h3>My Posts</h3>

<?php
$sql = "SELECT * FROM posts WHERE user_id='$user_id'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo "<div>".$row['content']."</div><hr>";
}
?>

</div>

<?php include 'includes/footer.php'; ?>