<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First Step Model</title>
</head>
<body>


<h1>Posts</h1>

<?php foreach ($posts as $post): ?>
    <h2><?= $post['title'] ?></h2>
    <p><?= $post['body'] ?></p>
<?php endforeach; ?>

</body>
</html>
