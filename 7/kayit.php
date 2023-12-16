<?php

include("baglanti.php");
if(isset($_POST["kaydet"]))
{
    $name=$_POST["kullanici_adi"];
    $email=$_POST["email"];
    $password=$_POST["paralo"];
    $ekle="INSERT INTO kullanicilar (kullanici_adi, email, paralo) VALUES ('$name','$email','$password')";
    $calistirekle = mysqli_query($conn, $ekle);
    if($calistirekle)
    {
        echo '<div class="alert alert-success" role="alert">
        Kayıt işlemi başarılı bir şekile gerçekleşti.
      </div>';

    }
    else
    {
        echo '<div class="alert alert-danger" role="alert">
        Kayıt işlemi sırasında bir sorun ile karşılaştıl 
      </div>';
    }
    mysqli_close($conn);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <!-- Bootstrap CSS bağlantısı -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4">Kayıt Ol</h2>
            <form action="kayit.php" method="POST">
                <div class="form-group">
                    <label for="firstName">Kullanıcı Adı</label>
                    <input type="text" class="form-control" id="firstName" name="kullanici_adi" placeholder="Kullanıcı adınızı giriniz..." required>
                </div>
                <div class="form-group">
                    <label for="email">E-posta</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-posta adresinizi giriniz..." required>
                </div>
                <div class="form-group">
                    <label for="password">Şifre</label>
                    <input type="password" class="form-control" id="password" name="paralo" placeholder="Şifrenizi giriniz..." required>
                </div>
                <button type="submit" class="btn btn-primary" name="kaydet">Kayıt Ol</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap ve jQuery JS bağlantıları -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
