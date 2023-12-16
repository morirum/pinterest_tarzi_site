<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="still.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="bilgilendime.html" target ="ic">Ana Sayfa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="tasarimHakkinda.html" >Tasarım hakkında</a>
            </li>
            <div>
                <div class="search-box">
                    <input type="text" placeholder ="Ara...">
                    <button type ="button">Ara</button>
                </div>
            </div>    

            <div class ="upload-button" >
            <button><a href="yukleme.php">Resim Yükle</a> </button>
            </div>
    </div>

    <div class="navbar-nav ml-auto">
        <h3>
            <?php 
            echo
            $_SESSION['username'];
            ?>
            
        </h3>
    </div>
    
    <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link" href="exit.php" >Çıkış yap</a>
    </div>
</nav>

</body>
</html>