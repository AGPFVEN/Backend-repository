<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Discussion Web</title>

    <!-- BOOSTRAP 4 -->
    <!-- CSS only -->
    
    <link rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
        crossorigin="anonymous"
    >

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/cbb28de2e8.js" crossorigin="anonymous"></script>

</head>
<body>
    <nav class = "navbar navbar-dark bg-dark">
        <div class = "container">
            <a href = "index.php" class="navbar-brand">My Discussion Web</a>

            <?php

                session_destroy();

            ?>
        </div>
    </nav>
</body>