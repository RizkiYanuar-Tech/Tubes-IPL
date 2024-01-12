<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    
    <div class="my-3">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr >           
                    <th style="color: white;" >ID_Menu</th>
                    <th style="color: white;" >Nama</th>
                    <th style="color: white;">Deskripsi</th>
                    <th style="color: white;">Harga</th>
                    <th style="color: white;">Kategori</th>
                    <th colspan='2' style="color: white;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $sql = "SELECT * FROM menu ORDER BY ID_Menu DESC";
                $hasil = mysqli_query($kon, $sql);
                $no = 0;

                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data["Nama_Menu"]; ?></td>
                    <td><?php echo $data["Deskripsi"]; ?></td>
                    <td><?php echo $data["Harga"]; ?></td>
                    <td><?php echo $data["Kategori"]; ?></td>
                    <td>
                        <a href="update.php?ID_Menu=<?php echo htmlspecialchars($data['ID_Menu']); ?>" class="btn btn-warning" role="button">
                            <button style="color: white;">Update</button>
                        </a>
                        <a href="delete.php?ID_Menu=<?php echo htmlspecialchars($data['ID_Menu']); ?>" class="btn btn-warning" role="button">
                            <button style="color: white;">Delete</button>
                        </a>
                    </td>

                </tr>
                <?php
                }
                ?>
            </tbody>
           
        </table>
        <a href="create.php"class="btn btn-warning" role="button">
                            <button style="color: white;">Tambah Menu</button>
        </a>
    </div>
</body>
</html>
