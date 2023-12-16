<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sayfa</title>
    <!-- Bootstrap - CSS bağlantısı -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Özel CSS dosyası bağlantısı -->
    <link rel="stylesheet" type="text/css" href="still.css">
    <link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>

    <!-- Bootstrap navbar kullanarak üst yatay menü oluşturma -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="bilgilendime.html" target="ic">Ana Sayfa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#" target="ic">Tasarım hakkında</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" target="ic">Karakter Tasarımı</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" target="ic">Takı Tasarımı</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" target="_self">Kıyafet Tasarımı</a>
                </li>
            </ul>
        </div>
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="giris_yap.php" target="_self">Giriş Yap</a>
            <a class="nav-item nav-link" href="kayit.php" target="_self">Kayıt Ol</a>
        </div>
    </nav>
    <div class="kapsayici">

        <p class="metin"> İyi bir tasarımın gücü basitliğindedir. </p>

    </div>

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