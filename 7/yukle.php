<?php 
$maxBoyut = 51200;
$dosyaAdi = $_FILES["dosya"]["name"];
$dosyaBilgisi = pathinfo($dosyaAdi);
$dosyaUzantisi = $dosyaBilgisi["extension"];
$dosyaAdi =uniqid().$dosyaUzantisi;
$dosyaYolu ="dosya/".$dosyaAdi;
if(isset($_FILES["dosya"]))
{
    $dosyaAdi = $_FILES["dosya"]["name"];

    if (!empty($dosyaAdi))
    {
        $dosyaBilgisi = pathinfo($dosyaAdi);
        $dosyaUzantisi = $dosyaBilgisi["extension"];
        $dosyaAdi = uniqid() . "." . $dosyaUzantisi;
        $dosyaYolu = "dosya/" . $dosyaAdi;

        if ($_FILES["dosya"]["size"] > $maxBoyut)
        {
            echo "Dosya boyutu en fazla <b>50 mb</b> olmalıdır.";
        }
        else
        {
            $dosyaTuru = $_FILES["dosya"]["type"];
            if ($dosyaTuru == "image/jpeg" || $dosyaTuru == "image/png" || $dosyaTuru == "image/gif" || $dosyaTuru == "image/jpg" || $dosyaTuru == "image/HEIC")
            {
                if (is_uploaded_file($_FILES["dosya"]["tmp_name"]))
                {
                    $tasi = move_uploaded_file($_FILES["dosya"]["tmp_name"], $dosyaYolu);
                    if ($tasi)
                    {
                        echo "<b>{$dosyaAdi}</b> adlı dosya başarı ile yüklendi.
                        <img src ='http://localhost/{$dosyaYolu}'>";
                    }
                    else
                    {
                        echo "Dosya taşınırken bir sorun ile karşılaştı.";
                    }
                }
            }
            else
            {
                echo "Dosya boyutu uygun fakat format uygun değil 'GIF, PNG ya da JPEG' formatında olmalıdır.";
            }
        }
    }
    else
    {
        echo "Dosya adı boş.";
    }
}
else
{
    echo "Dosya yüklenemedi.";
}
?>