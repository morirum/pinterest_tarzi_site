<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>

    <div class="container">

        <?php
        include('baglanti.php');

        $query = "SELECT * FROM resimler";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '
                    <div class="image">
                        <img src="' . $row['resim'] . '" alt="">
                    </div>
                ';
        }
        ?>


    </div>
    <script>
    let images = document.querySelectorAll('.image');
    
    images.forEach(function(img) {
        img.addEventListener('click', function() {
            img.classList.toggle('active');
            body.classList.toggle('blur');
        });
    });
</script>
</body>

</html>