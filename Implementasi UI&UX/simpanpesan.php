<?php
session_start();

$ID_Pemesan = $_POST['ID_Pemesan'];
$ID_Pelanggan = $_POST['ID_Pelanggan'];
$ID_Menu = $_POST['ID_Menu'];
$Tanggal_Pemesanan = date("Y-m-d");
$Total_Harga = floatval($_POST['Total_Harga']);
$conn = mysqli_connect("localhost", "root", "", "cafe");

// Pastikan koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Convert the array $ID_Menu to a comma-separated string
$ID_MenuString = implode(',', $ID_Menu);

$query = "INSERT INTO pemesan (ID_Pemesan, ID_Menu, ID_Pelanggan, Tanggal_Pemesanan, Total_Harga) 
          VALUES ('$ID_Pemesan', '$ID_MenuString', '$ID_Pelanggan', '$Tanggal_Pemesanan', '$Total_Harga')";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "Pesan berhasil ditambahkan";
} else {
    echo "Pesan gagal ditambahkan: " . mysqli_error($conn);
}

// Tutup koneksi setelah selesai menggunakan
mysqli_close($conn);
?>
