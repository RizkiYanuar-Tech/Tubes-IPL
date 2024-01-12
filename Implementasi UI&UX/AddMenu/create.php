<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $Nama_Menu=input($_POST["Nama_Menu"]);
        $Deskripsi=input($_POST["Deskripsi"]);
        $Harga=input($_POST["Harga"]);
        $Kategori=input($_POST["Kategori"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into menu (Nama_Menu,Deskripsi,Harga,Kategori) values
		('$Nama_Menu','$Deskripsi','$Harga','$Kategori')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama_Menu:</label>
            <input type="text" name="Nama_Menu" class="form-control" placeholder="Masukan Menu" required />

        </div>
        <div class="form-group">
            <label>Deskripsi:</label>
            <input type="text" name="Deskripsi" class="form-control" placeholder="Masukan Deskripsi" required/>
        </div>
       <div class="form-group">
            <label>Harga :</label>
            <input type="text" name="Harga" class="form-control" placeholder="Masukan Harga" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Kategori:</label>
            <select name="Kategori" class="form-control" required>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Dessert">Dessert</option>
            </select>
        </div>     

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>