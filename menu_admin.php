<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- logout font -->
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <!-- logout icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
    <title>あなたと百物語</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a href="home.php" class="m-3 mr-5"><h1>あなたと百物語</h1></a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="mystory.php" class="nav-link m-4">私の「語り」</a>
                </li>
                <li class="nav-item">
                    <a href="user_post.php" class="nav-link m-4">新しく「語る」</a>
                </li>
                <li class="nav-item">
                    <a href="users.php" class="nav-link m-4">語り手たち</a>
                </li>
                <li class="nav-item">
                    <a href="ayakas.php" class="nav-link m-4">妖たち</a>
                </li>
            </ul>
        </div>

        <div id="name">
            <p>こんばんは、<?php echo $_SESSION["user_name"];?>さん</p>
            <a href="logout.php" class="text-secondary">去る<i class="fas fa-door-open fa-lg"></i></a>
        </div>
        
    </nav>



    <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>