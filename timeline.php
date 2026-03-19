<?php 
include 'db.php'; 
include 'includes/header.php'; 
?>

<div class="container">

<h2>Timeline</h2>

<!-- POST FORM -->
<form method="POST">
    <textarea name="content" placeholder="What's on your mind?" required></textarea>
    <button name="post">Post</button>
</form>

<?php
// SAVE POST
if(isset($_POST['post'])){
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO posts (user_id, content)
            VALUES ('$user_id','$content')";
    $conn->query($sql);
}
?>

<hr>

<?php
// SHOW POSTS
$sql = "SELECT posts.*, users.username 
        FROM posts 
        JOIN users ON posts.user_id = users.id
        ORDER BY created_at DESC";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo "<div>";
    echo "<b>".$row['username']."</b><br>";
    echo $row['content'];
    echo "</div><hr>";
}
?>

</div>

<?php include 'includes/footer.php'; ?>