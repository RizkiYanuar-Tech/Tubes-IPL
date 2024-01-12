<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!--Ny Style-->
    <link rel="stylesheet" href="css/tambahpesan.css" />
    <title>Pesanan</title>
  </head>

  <body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <!-- Navbar Start-->
    <nav class="navbar">
      
      <a class="navbar-logo">Kopi <span>Saya.</span></a>

      <div class="navbar-nav-mid">
        <a href="index.php">Home</a>
        <a href="#about">About</a>
        <a href="menu.php">Menu</a>
        <a href="#contact">Kontak</a>
      </div>
    </nav>
    <!-- Navbar End-->
    <h1>Tambah Pesanan</h1>

    <?php
    $koneksi = mysqli_connect("localhost","root","","cafe") or die(mysqli_connect_error());
    ?>

    <form action ="simpanpesan.php" method="POST">
      <div class="input-group mb-2">
        <span class ="input-group-text">ID Pemesan</span>
        <input type="text" name="ID_Pemesan" aria-label="First name" class="form-control">
      </div>

      <select name="ID_Menu[]" class="form-select mb-3" multiple onchange="HitungTotal()">
        <option value="">Select Menu</option>
        <?php
        $qry = $koneksi->query("SELECT * FROM menu");
        while ($data = $qry->fetch_assoc()) {
        ?>
            <option value="<?= $data['ID_Menu'] . ',' . $data['Harga']; ?>"><?= $data['Nama_Menu']; ?></option>
        <?php } ?>
    </select>

      <?php

      $query = "SELECT MAX(ID_Pelanggan) AS max_id FROM pelanggan";
      $result = mysqli_query($koneksi, $query);
      $data = mysqli_fetch_assoc($result);

      // Ambil nilai ID Pelanggan terakhir dan tambahkan 1
      $ID_Pelanggan = $data['max_id'] ;
      
      ?>
          <div class="input-group mb-3  ">
              <span class="input-group-text">ID Pelanggan</span>
              <input type="text" name="ID_Pelanggan" value="<?php echo $ID_Pelanggan; ?>" aria-label="ID_Pelanggan" class="form-control" readonly>
          </div>

       <div class="input-group mb-3">
            <span class ="input-group-text">Tanggal</span>
            <input type="date" name="date" aria-label="Tanggal" class="form-control">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text">Total Harga</span>
        <input type="text" name="Total_Harga" id="Total_Harga" readonly aria-label="Total_Harga" class="form-control">
      </div>


      <button type="submit" name="submit" value="submit" class="btn btn-outline-danger">PESAN</button>

    </form>
    <script src="./file js/script.js"></script>
  </body>
</html>
