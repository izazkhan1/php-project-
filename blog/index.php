<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>My Blog</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Public Blog</h1>
  <?php
  $result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
  while ($row = $result->fetch_assoc()):
  ?>
    <div class="post">
      <h2><a href="post.php?id=<?=$row['id']?>"><?=$row['title']?></a></h2>
      <p><?=substr($row['content'],0,100)?>...</p>
      <small><?=$row['created_at']?></small>
    </div>
  <?php endwhile; ?>
</body>
</html>
