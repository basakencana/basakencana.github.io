<?php

// Ambil IP pengunjung
$ip = $_SERVER['REMOTE_ADDR'];

// Ambil data lokasi dari API
$url = "http://ip-api.com/json/$ip";
$response = file_get_contents($url);
$data = json_decode($response);

// Ambil negara & kota
$country = $data->country ?? "Unknown";
$city = $data->city ?? "Unknown";

// Waktu akses
$date = date("Y-m-d H:i:s");

// Simpan ke log
$log = "IP: $ip | $country, $city | $date\n";
file_put_contents("log.txt", $log, FILE_APPEND);

?>

<!DOCTYPE html>
<html>
<head>
<title>Visitor Info</title>
</head>

<body style="font-family:Arial;text-align:center;margin-top:50px;">

<h2>Selamat Datang 👋</h2>

<p><b>IP Anda:</b> <?php echo $ip; ?></p>
<p><b>Negara:</b> <?php echo $country; ?></p>
<p><b>Kota:</b> <?php echo $city; ?></p>
<p><b>Waktu:</b> <?php echo $date; ?></p>

</body>
</html>
