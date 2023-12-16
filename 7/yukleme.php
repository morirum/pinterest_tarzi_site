<?php
include('baglanti.php');
$maxFileSize = 1024 * 1024 * 5;
function compress_image($source_url, $destination_url, $quality)
{
    $info = getimagesize($source_url);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source_url);
    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source_url);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source_url);
    elseif ($info['mime'] == 'image/jpg')
        $image = imagecreatefromjpeg($source_url);

    imagejpeg($image, $destination_url, $quality);

    return $destination_url;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_FILES["dosya"]["size"] > $maxFileSize) {
        echo "Hata: Dosya boyutu 5 MB'den büyük olamaz.";
    } else {

        $imname = $_FILES["dosya"]["tmp_name"];
        $source_photo = $imname;
        $namecreate = "codeconia_" . time();
        $namecreatenumber = rand(1000, 10000);
        $picname = $namecreate . $namecreatenumber;
        $finalname = $picname . ".jpeg";
        $dest_photo = 'dosya/' . $finalname;
        $compressimage = compress_image($source_photo, $dest_photo, 80);
        if ($compressimage != '') {
            $query = "INSERT INTO resimler (resim) VALUES ('$compressimage')";
            $execute = mysqli_query($conn, $query);

            if ($execute) {
                echo "Resim başarıyla eklendi.";
            } else {
                echo "Veritabanına resim eklenirken bir hata oluştu: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dosyaYukle</title>
</head>

<body>
    <form action="yukleme.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="dosya" />
        <input type="submit" value="Yükle">
    </form>
</body>

</html>