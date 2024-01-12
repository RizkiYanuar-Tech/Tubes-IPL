<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php
        // Include file koneksi, untuk koneksikan ke database
        include "koneksi.php";

        // Fungsi untuk mencegah inputan karakter yang tidak sesuai
        function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Inisialisasi variabel
        $ID_Menu = '';
        $Nama_Menu = '';
        $Deskripsi = '';
        $Harga = '';
        $Kategori = '';

        // Cek apakah ada nilai yang dikirim menggunakan metode GET dengan nama ID_Menu
        if (isset($_GET['ID_Menu'])) {
            $ID_Menu = input($_GET["ID_Menu"]);

            // Query untuk mendapatkan data menu berdasarkan ID_Menu
            $sql = "SELECT * FROM menu WHERE ID_Menu = '$ID_Menu'";
            $hasil = mysqli_query($kon, $sql);

            if ($hasil) {
                $data = mysqli_fetch_assoc($hasil);

                // Memasukkan nilai ke variabel sesuai dengan data yang diambil
                $Nama_Menu = $data['Nama_Menu'];
                $Deskripsi = $data['Deskripsi'];
                $Harga = $data['Harga'];
                $Kategori = $data['Kategori'];
            } else {
                echo "<div class='alert alert-danger'> Data tidak ditemukan.</div>";
            }
        }

        // Cek apakah ada kiriman form dari metode post
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $ID_Menu = htmlspecialchars($_POST["ID_Menu"]);
            $Nama_Menu = input($_POST["Nama_Menu"]);
            $Deskripsi = input($_POST["Deskripsi"]);
            $Harga = input($_POST["Harga"]);
            $Kategori = input($_POST["Kategori"]);

            // Query update data pada tabel menu
            $sql = "UPDATE menu SET
                        Nama_Menu='$Nama_Menu',
                        Deskripsi='$Deskripsi',
                        Harga='$Harga',
                        Kategori='$Kategori'
                    WHERE ID_Menu=$ID_Menu";

            // Mengeksekusi atau menjalankan query di atas
            $hasil = mysqli_query($kon, $sql);

            // Kondisi apakah berhasil atau tidak dalam mengeksekusi query di atas
            if ($hasil) {
                header("Location: index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
        ?>
        <h2>Update Data</h2>

        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="form-group">
                <label>Nama_Menu:</label>
                <input type="text" name="Nama_Menu" class="form-control" value="<?php echo $Nama_Menu; ?>" placeholder="Masukan Menu" required />
            </div>
            <div class="form-group">
                <label>Deskripsi:</label>
                <input type="text" name="Deskripsi" class="form-control" value="<?php echo $Deskripsi; ?>" placeholder="Masukan Deskripsi" required />
            </div>
            <div class="form-group">
                <label>Harga :</label>
                <input type="text" name="Harga" class="form-control" value="<?php echo $Harga; ?>" placeholder="Masukan Harga" required />
            </div>
            <div class="form-group">
                <label>Kategori:</label>
                <select name="Kategori" class="form-control" required>
                    <option value="Makanan" <?php echo ($Kategori == 'Makanan') ? 'selected' : ''; ?>>Makanan</option>
                    <option value="Minuman" <?php echo ($Kategori == 'Minuman') ? 'selected' : ''; ?>>Minuman</option>
                    <option value="Dessert" <?php echo ($Kategori == 'Dessert') ? 'selected' : ''; ?>>Dessert</option>
                </select>
            </div>

            <!-- Menambahkan input hidden untuk ID_Menu -->
            <input type="hidden" name="ID_Menu" value="<?php echo $ID_Menu; ?>" />

            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
