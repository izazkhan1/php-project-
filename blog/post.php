<?php include 'db.php'; 
$id = intval($_GET['id']);
$post = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title><?=$post['title']?></title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1><?=$post['title']?></h1>
  <p><?=$post['content']?></p>
  <small><?=$post['created_at']?></small>
  <br><a href="index.php">Back</a>
</body>
</html>
